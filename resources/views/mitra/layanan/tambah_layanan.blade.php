@extends('mitra.layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/css/mitra/tambah_layanan.css') }}">
@endsection

@section('content')
{{-- Content: Tambah Layanan --}}

@if(
    !$mitra->operational_hours ||
    !$mitra->service_radius ||
    !$mitra->pickup_fee
)
    <div class="alert-profile">
        Lengkapi profil toko Anda untuk mulai menerima pesanan.
    </div>
@endif

<div class="tl-page">
    {{-- Main Content --}}
    <div class="tl-layout">
        {{-- Form Area --}}
        <div class="tl-form-area">
            <div class="tl-form-header">
                <h2 class="tl-form-title" id="formTitle">Informasi Dasar</h2>
                <p class="tl-form-desc" id="formDesc">Lengkapi informasi dasar layanan Anda.</p>
            </div>

            <form id="multiStepForm" action="#" method="POST" enctype="multipart/form-data">
                @csrf

                {{-- Step 1: Informasi Dasar --}}
                <div class="tl-step-content" id="stepContent1">
                    {{-- Nama Layanan --}}
                    <div class="tl-field">
                        <label class="tl-label">Nama Layanan <span class="tl-required">*</span></label>
                        <div class="tl-input-wrap">
                            <input
                                type="text"
                                name="nama_layanan"
                                class="tl-input"
                                placeholder="Contoh: Cuci Kiloan Regular"
                                maxlength="50"
                                id="namaLayanan"
                                oninput="updateCounter('namaLayanan','namaCounter',50)"
                                required
                            >
                            <span class="tl-counter" id="namaCounter">0/50</span>
                        </div>
                    </div>

                    {{-- Hari Operasional --}}
                    <div class="tl-field">
                        <label class="tl-label">Hari Operasional <span class="tl-required">*</span></label>
                        <div class="tl-days" id="dayOptions">
                            <label class="tl-day-chip"><input type="checkbox" name="hari[]" value="Sen"><span>Sen</span></label>
                            <label class="tl-day-chip"><input type="checkbox" name="hari[]" value="Sel"><span>Sel</span></label>
                            <label class="tl-day-chip"><input type="checkbox" name="hari[]" value="Rab"><span>Rab</span></label>
                            <label class="tl-day-chip"><input type="checkbox" name="hari[]" value="Kam"><span>Kam</span></label>
                            <label class="tl-day-chip"><input type="checkbox" name="hari[]" value="Jum"><span>Jum</span></label>
                            <label class="tl-day-chip"><input type="checkbox" name="hari[]" value="Sab"><span>Sab</span></label>
                            <label class="tl-day-chip"><input type="checkbox" name="hari[]" value="Min"><span>Min</span></label>
                        </div>
                    </div>

                    <div class="tl-grid-2">
                        <div class="tl-field">
                            <label class="tl-label">Harga Dasar <span class="tl-required">*</span></label>
                            <div class="tl-input-group">
                                <span class="tl-addon">Rp</span>
                                <input type="number" name="harga_dasar" class="tl-input" placeholder="7000" min="0" step="500" id="basePrice" required>
                                <span class="tl-addon">kg</span>
                            </div>
                        </div>
                        <div class="tl-field">
                            <label class="tl-label">Estimasi Pengerjaan (Hari) <span class="tl-required">*</span></label>
                            <div class="tl-input-group">
                                <input type="number" name="estimasi" class="tl-input" placeholder="3" min="1" id="duration" required>
                                <span class="tl-addon">Hari</span>
                            </div>
                        </div>
                    </div>

                    <div class="tl-grid-2">
                        <div class="tl-field">
                            <label class="tl-label">Minimal Order</label>
                            <div class="tl-input-group">
                                <input type="number" name="minimal_order" class="tl-input" placeholder="3" min="3" id="minimumOrder">
                                <span class="tl-addon" id="minimumUnit">kg</span>
                            </div>
                        </div>
                        <div class="tl-field">
                            <label class="tl-label">Maksimal Order</label>
                            <div class="tl-input-group">
                                <input type="number" name="maksimal_order" class="tl-input" placeholder="10" max="10" id="maximumOrder">
                                <span class="tl-addon" id="maximumUnit">kg</span>
                            </div>
                        </div>
                        
                    </div>

                    {{-- ini aktif ketika di page detail/mau update --}}
                    {{-- <div class="tl-field">
                        <label class="tl-toggle-row">
                            <span class="tl-toggle-copy">
                                <strong>Status Aktif</strong>
                                <span>Layanan tampil di aplikasi pelanggan setelah dipublikasikan.</span>
                            </span>
                            <span class="tl-switch">
                                <input type="checkbox" name="status_aktif" id="serviceActive" checked>
                                <span aria-hidden="true"></span>
                            </span>
                        </label>
                    </div> --}}

                    {{-- Tips Box --}}
                    <div class="tl-tips-box">
                        <div class="tl-tips-icon">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#3b82f6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                        </div>
                        <div>
                            <p class="tl-tips-title">Tips</p>
                            <p class="tl-tips-text">Gunakan nama layanan yang jelas dan mudah dipahami pelanggan agar lebih mudah ditemukan.</p>
                        </div>
                    </div>
                </div>
                
                {{-- Step 2: Tinjau & Publikasikan --}}
                <div class="tl-step-content" id="stepContent5" style="display: none;">
                    {{-- Review Summary --}}
                    <div class="tl-review-summary" style="margin-top: 20px; padding: 20px; background: #f8fafc; border: 1px solid #e5e7eb; border-radius: 12px;">
                        <h4 style="margin: 0 0 14px 0; font-size: 15px; font-weight: 700; color: #1f2937; border-bottom: 1px dashed #e5e7eb; padding-bottom: 8px;">Ringkasan Informasi</h4>
                        <ul style="list-style: none; padding: 0; margin: 0; display: grid; gap: 10px; font-size: 13px; color: #4b5563;">
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Nama Layanan:</span> <strong id="summaryName" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Hari Aktif:</span> <strong id="summaryDays" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Harga Dasar:</span> <strong id="summaryPrice" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Minimal Order:</span> <strong id="summaryMinOrder" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Estimasi:</span> <strong id="summaryDuration" style="color: #1f2937;">-</strong></li>
                            <li style="display: flex; justify-content: space-between;"><span style="color: #6b7280;">Jangkauan Pickup:</span> <strong id="summaryRange" style="color: #1f2937;">-</strong></li>
                        </ul>
                    </div>
                </div>
            </form>
            {{-- Bottom Actions --}}
            <div class="tl-actions">
                <button type="button" class="tl-btn-next" id="btnNext">
                    Selanjutnya
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
                <button type="submit" form="multiStepForm" class="tl-btn-next" id="btnSubmit" style="display: none; background: #16a34a;">
                    Publikasikan Layanan
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 10 12"/></svg>
                </button>
            </div>
        </div>
    </div>{{-- end layout --}}
</div>{{-- end tl-page --}}

<script>

</script>
@endsection

