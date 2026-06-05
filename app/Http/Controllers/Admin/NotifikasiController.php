<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    public function index()
    {
        // 1. Ambil data dari database, urutkan dari yang terbaru
        $dataDariDB = Notifikasi::orderBy('created_at', 'desc')->get();

        // 2. Format ulang data agar nama variabelnya cocok dengan frontend (Javascript)
        $formattedNotifikasi = $dataDariDB->map(function($item) {
            // Default values
            $iconClass  = 'fa-star';
            $iconBg     = '#f5f3ff';
            $iconColor  = '#7c3aed';
            $modulClass = 'mod-review';

            // Mapping berdasarkan modul
            $modul = strtolower($item->modul);
            if (str_contains($modul, 'review') || str_contains($modul, 'rating')) {
                $iconClass  = 'fa-star';
                $iconBg     = '#f5f3ff';
                $iconColor  = '#7c3aed';
                $modulClass = 'mod-review';
            } elseif (str_contains($modul, 'verifikasi') || str_contains($modul, 'mitra')) {
                $iconClass  = 'fa-user-check';
                $iconBg     = '#fffbeb';
                $iconColor  = '#92400e';
                $modulClass = 'mod-verifikasi';
            } elseif (str_contains($modul, 'komplain')) {
                $iconClass  = 'fa-circle-exclamation';
                $iconBg     = '#fef2f2';
                $iconColor  = '#dc2626';
                $modulClass = 'mod-komplain';
            } elseif (str_contains($modul, 'pesanan')) {
                $iconClass  = 'fa-shopping-basket';
                $iconBg     = '#eff6ff';
                $iconColor  = '#2563eb';
                $modulClass = 'mod-pesanan';
            }

            return [
                'id_raw'     => $item->id,
                'id'         => 'NTF-' . str_pad($item->id, 4, '0', STR_PAD_LEFT),
                'judul'      => $item->judul,
                'sub'        => $item->pesan,
                'modul'      => $item->modul,
                'tipe'       => ['Push'],
                'penerima'   => $item->penerima,
                'status'     => $item->is_read ? 'Terbaca' : 'Terkirim',
                'waktu'      => $item->created_at->format('d M Y\nH:i') . ' WIB',
                
                'iconClass'  => $iconClass,
                'iconBg'     => $iconBg,
                'iconColor'  => $iconColor,
                'modulClass' => $modulClass,
                'konten'     => $item->pesan,
                'statTotal'  => 1, 
                'statTerkirim'=> 1, 
                'statTerbaca'=> $item->is_read ? 1 : 0, 
                'statGagal'  => 0,
                'bahasa'     => 'Bahasa Indonesia',
                'dibuat'     => 'Sistem',
                'dibuatPada' => $item->created_at->format('d M Y, H:i') . ' WIB',
            ];
        });

        // 3. Kirim datanya ke Blade
        return view('admin.pengaturan.notifikasi', [
            'notificationsData' => $formattedNotifikasi
        ]);
    }

    public function destroy($id)
    {
        $notif = Notifikasi::findOrFail($id);
        $notif->delete();

        return response()->json([
            'success' => true,
            'message' => 'Notifikasi berhasil dihapus permanen.'
        ]);
    }
}