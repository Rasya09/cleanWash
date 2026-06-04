<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MitraLaundry;
use App\Models\User;
use App\Models\Notifikasi;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\View\View;

class VerifikasiMitraController extends Controller
{
    public function index(Request $request): View
    {
        $this->ensureAdmin();

        $stats = $this->buildStats();

        $pendingQuery = MitraLaundry::query()
            ->with(['storePhotos', 'user'])
            ->where('status', 'pending')
            ->orderByDesc('created_at');

        if ($search = trim((string) $request->query('q', ''))) {
            $pendingQuery->where(function ($q) use ($search) {
                $q->where('store_name', 'like', "%{$search}%")
                    ->orWhere('owner_name', 'like', "%{$search}%")
                    ->orWhere('city', 'like', "%{$search}%");
            });
        }

        if ($city = $request->query('city')) {
            $pendingQuery->where('city', $city);
        }

        $pendingList = $pendingQuery->paginate(10)->withQueryString();

        $cities = MitraLaundry::query()
            ->where('status', 'pending')
            ->whereNotNull('city')
            ->where('city', '!=', '')
            ->distinct()
            ->orderBy('city')
            ->pluck('city');

        $selected = $this->resolveSelectedMitra($request, $pendingList);

        return view('admin.manajemen.verifikasi_mitra', [
            'stats' => $stats,
            'pendingList' => $pendingList,
            'cities' => $cities,
            'selected' => $selected,
            'filters' => [
                'q' => $search ?? '',
                'city' => $city ?? '',
            ],
        ]);
    }

    public function approve(Request $request, MitraLaundry $mitra): RedirectResponse
    {
        $this->ensureAdmin();

        if ($mitra->status !== 'pending') {
            return back()->with('error', 'Pendaftaran ini tidak dalam status menunggu verifikasi.');
        }

        DB::transaction(function () use ($mitra) {
            $mitra->update($this->verificationUpdatePayload([
                'status' => 'approved',
                'rejection_reason' => null,
            ]));

            if ($mitra->user_id) {
                User::where('id', $mitra->user_id)->update(['role' => 'mitra']);
            }
        });

        return redirect()
            ->route('admin.verifikasi', $request->only(['q', 'city']))
            ->with('success', "Mitra \"{$mitra->store_name}\" berhasil disetujui.");
    }

    public function reject(Request $request, MitraLaundry $mitra): RedirectResponse
    {
        $this->ensureAdmin();

        if ($mitra->status !== 'pending') {
            return back()->with('error', 'Pendaftaran ini tidak dalam status menunggu verifikasi.');
        }

        $validated = $request->validate([
            'reason' => 'nullable|string|max:1000',
        ]);

        $mitra->update($this->verificationUpdatePayload([
            'status' => 'rejected',
            'rejection_reason' => $validated['reason'] ?? null,
        ]));

        return redirect()
            ->route('admin.verifikasi', $request->only(['q', 'city']))
            ->with('success', "Pendaftaran \"{$mitra->store_name}\" ditolak.");
    }

    private function ensureAdmin(): void
    {
        abort_unless(
            auth()->check() && auth()->user()->role === 'admin',
            403,
            'Akses khusus admin.'
        );
    }

    private function resolveSelectedMitra(Request $request, $pendingList): ?MitraLaundry
    {
        $with = ['storePhotos', 'businessPhotos', 'user'];

        if ($request->filled('mitra')) {
            return MitraLaundry::query()
                ->with($with)
                ->where('status', 'pending')
                ->find($request->integer('mitra'));
        }

        $first = $pendingList->first();

        return $first
            ? MitraLaundry::query()->with($with)->find($first->id)
            : null;
    }

    /**
     * @return array{total: int, pending: int, approved: int, rejected: int, total_change: ?float, pending_change: ?float, approved_change: ?float, rejected_change: ?float}
     */
    private function buildStats(): array
    {
        $now = Carbon::now();
        $weekStart = $now->copy()->startOfWeek();
        $lastWeekStart = $weekStart->copy()->subWeek();
        $lastWeekEnd = $weekStart->copy()->subSecond();

        $percentChange = function (int $current, int $previous): ?float {
            if ($previous === 0) {
                return $current > 0 ? 100.0 : null;
            }

            return round((($current - $previous) / $previous) * 100, 1);
        };

        $createdBetween = fn (Carbon $from, Carbon $to) => MitraLaundry::query()
            ->whereBetween('created_at', [$from, $to]);

        $totalNewWeek = $createdBetween($weekStart, $now)->count();
        $totalNewPrev = $createdBetween($lastWeekStart, $lastWeekEnd)->count();

        $pendingNewWeek = $createdBetween($weekStart, $now)->where('status', 'pending')->count();
        $pendingNewPrev = $createdBetween($lastWeekStart, $lastWeekEnd)->where('status', 'pending')->count();

        $reviewedAtColumn = Schema::hasColumn('mitra_laundries', 'verified_at')
            ? 'verified_at'
            : 'updated_at';

        $countReviewedBetween = function (string $status, Carbon $from, Carbon $to) use ($reviewedAtColumn) {
            return MitraLaundry::query()
                ->where('status', $status)
                ->whereBetween($reviewedAtColumn, [$from, $to])
                ->count();
        };

        $approvedNewWeek = MitraLaundry::where('status', 'approved')
            ->where($reviewedAtColumn, '>=', $weekStart)
            ->count();
        $approvedNewPrev = $countReviewedBetween('approved', $lastWeekStart, $lastWeekEnd);

        $rejectedNewWeek = MitraLaundry::where('status', 'rejected')
            ->where($reviewedAtColumn, '>=', $weekStart)
            ->count();
        $rejectedNewPrev = $countReviewedBetween('rejected', $lastWeekStart, $lastWeekEnd);

        return [
            'total' => MitraLaundry::count(),
            'pending' => MitraLaundry::where('status', 'pending')->count(),
            'approved' => MitraLaundry::where('status', 'approved')->count(),
            'rejected' => MitraLaundry::where('status', 'rejected')->count(),
            'total_change' => $percentChange($totalNewWeek, $totalNewPrev),
            'pending_change' => $percentChange($pendingNewWeek, $pendingNewPrev),
            'approved_change' => $percentChange($approvedNewWeek, $approvedNewPrev),
            'rejected_change' => $percentChange($rejectedNewWeek, $rejectedNewPrev),
        ];
    }

    /**
     * @param  array<string, mixed>  $data
     * @return array<string, mixed>
     */
    private function verificationUpdatePayload(array $data): array
    {
        if (! Schema::hasColumn('mitra_laundries', 'rejection_reason')) {
            unset($data['rejection_reason']);
        }

        if (Schema::hasColumn('mitra_laundries', 'verified_at')) {
            $data['verified_at'] = now();
        }

        if (Schema::hasColumn('mitra_laundries', 'verified_by')) {
            $data['verified_by'] = auth()->id();
        }

        return $data;
    }
}
) {
            unset($data['rejection_reason']);
        }

        if (Schema::hasColumn('mitra_laundries', 'verified_at')) {
            $data['verified_at'] = now();
        }

        if (Schema::hasColumn('mitra_laundries', 'verified_by')) {
            $data['verified_by'] = auth()->id();
        }

        return $data;
    }
}
