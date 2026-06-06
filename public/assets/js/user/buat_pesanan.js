/**
 * Clean Wash — Buat Pesanan
 * JS untuk: tambah/hapus layanan, preview foto, modal ringkasan, konfirmasi
 */

(function () {
    'use strict';

    /* ─── State ─────────────────────────────────── */
    let layananCount = 1; // sudah ada 1 item dari blade

    let LAYANAN_OPTIONS = '';
    
    // Check if dynamic services are passed from blade
    if (window.laundryServices && window.laundryServices.length > 0) {
        LAYANAN_OPTIONS = window.laundryServices.map(service => `<label class="bp-radio-label">
            <input type="radio" name="layanan[__IDX__]" value="${service.id}" class="bp-radio-input" data-name="${service.service_name}" data-price="${service.base_price}">
            <span class="bp-radio-custom"></span>${service.label}
        </label>`).join('');
    } else {
        // Fallback or empty if no services (shouldn't happen because of backend validation)
        LAYANAN_OPTIONS = '<p style="color:red; font-size:14px;">Tidak ada layanan tersedia.</p>';
    }

    /* ─── Tambah Layanan ─────────────────────────── */
    window.tambahLayanan = function () {
        const idx     = layananCount;
        const wrapper = document.createElement('div');
        wrapper.className   = 'bp-layanan-item';
        wrapper.dataset.index = idx;
        wrapper.innerHTML = `
            <div class="bp-layanan-header">
                <h3 class="bp-section-title">Pilih Layanan</h3>
                <button type="button" class="bp-btn-hapus-layanan" onclick="hapusLayanan(this)">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M18 6L6 18M6 6l12 12"/>
                    </svg>
                    Hapus
                </button>
            </div>
            <div class="bp-radio-group">
                ${LAYANAN_OPTIONS.replaceAll('__IDX__', idx)}
            </div>
            <div class="bp-divider"></div>
        `;
        document.getElementById('daftarLayanan').appendChild(wrapper);
        layananCount++;

        // update tombol hapus pada item pertama jika sudah ada ≥2
        updateHapusBtn();
        updateDisabledServices();
    };

    /* ─── Hapus Layanan ─────────────────────────── */
    window.hapusLayanan = function (btn) {
        const item = btn.closest('.bp-layanan-item');
        item.style.animation = 'none';
        item.style.transition = 'opacity .2s, transform .2s';
        item.style.opacity = '0';
        item.style.transform = 'translateY(-8px)';
        setTimeout(() => {
            item.remove();
            updateHapusBtn();
            updateDisabledServices();
        }, 200);
    };

    function updateHapusBtn() {
        const items = document.querySelectorAll('.bp-layanan-item');
        items.forEach((item) => {
            const btn = item.querySelector('.bp-btn-hapus-layanan');
            if (btn) btn.style.display = items.length > 1 ? 'inline-flex' : 'none';
        });
    }

    function updateDisabledServices() {
        const items = document.querySelectorAll('.bp-layanan-item');
        const selectedValues = new Set();
        
        // Kumpulkan semua layanan yang dipilih
        items.forEach(item => {
            const checked = item.querySelector('.bp-radio-input:checked');
            if (checked) selectedValues.add(checked.value);
        });

        // Disable input yang sudah dipilih di grup lain
        items.forEach(item => {
            const inputs = item.querySelectorAll('.bp-radio-input');
            const checkedValue = item.querySelector('.bp-radio-input:checked')?.value;
            
            inputs.forEach(input => {
                if (selectedValues.has(input.value) && input.value !== checkedValue) {
                    input.disabled = true;
                    input.parentElement.style.opacity = '0.5';
                    input.parentElement.style.cursor = 'not-allowed';
                } else {
                    input.disabled = false;
                    input.parentElement.style.opacity = '1';
                    input.parentElement.style.cursor = 'pointer';
                }
            });
        });

        // Sembunyikan tombol "Tambah Layanan" jika semua layanan sudah ditambahkan
        const btnTambah = document.getElementById('btnTambahLayanan');
        if (btnTambah) {
            const maxLayanan = window.laundryServices ? window.laundryServices.length : 0;
            if (items.length >= maxLayanan) {
                btnTambah.style.display = 'none';
            } else {
                btnTambah.style.display = 'inline-flex';
            }
        }
    }

    /* ─── Preview Foto ───────────────────────────── */
    window.previewFoto = function (input) {
        const file = input.files[0];
        if (!file) return;

        if (file.size > 5 * 1024 * 1024) {
            alert('Ukuran file melebihi 5MB. Silakan pilih foto yang lebih kecil.');
            input.value = '';
            return;
        }

        const reader   = new FileReader();
        const preview  = document.getElementById('fotoPreview');
        const placeholder = document.getElementById('uploadPlaceholder');

        reader.onload = (e) => {
            preview.src   = e.target.result;
            preview.style.display = 'block';
            placeholder.style.display = 'none';
        };
        reader.readAsDataURL(file);
    };

    /* ─── Validasi Form ──────────────────────────── */
    function validasiForm() {
        const items = document.querySelectorAll('.bp-layanan-item');
        const selectedServices = new Set();
        for (const item of items) {
            const selected = item.querySelector('.bp-radio-input:checked');
            if (!selected) {
                item.scrollIntoView({ behavior: 'smooth', block: 'center' });
                item.style.boxShadow = '0 0 0 2px #EF4444';
                setTimeout(() => item.style.boxShadow = '', 2000);
                showToast('Pilih layanan untuk setiap pesanan yang ditambahkan.');
                return false;
            }
            
            if (selectedServices.has(selected.value)) {
                item.scrollIntoView({ behavior: 'smooth', block: 'center' });
                item.style.boxShadow = '0 0 0 2px #EF4444';
                setTimeout(() => item.style.boxShadow = '', 2000);
                showToast('Layanan yang sama tidak boleh dipilih lebih dari satu kali.');
                return false;
            }
            selectedServices.add(selected.value);
        }

        const tanggal = document.getElementById('pilihTanggal').value;
        const waktu = document.getElementById('pilihWaktu').value;

        if (!tanggal) {
            document.getElementById('pilihTanggal').focus();
            showToast('Pilih tanggal pickup terlebih dahulu.');
            return false;
        }

        const selectedDate = new Date(tanggal + 'T00:00:00');
        const today = new Date();

        selectedDate.setHours(0, 0, 0, 0);
        today.setHours(0, 0, 0, 0);

        if (selectedDate < today) {
            showToast('Tanggal tidak valid');
            return false;
        }

        if (!waktu) {
            document.getElementById('pilihWaktu').focus();
            showToast('Pilih waktu pickup terlebih dahulu.');
            return false;
        }

        return true;
    }

    /* ─── Modal Ringkasan ────────────────────────── */
    window.tampilkanRingkasan = function () {
        if (!validasiForm()) return;

        // Kumpulkan layanan yang dipilih
        const items   = document.querySelectorAll('.bp-layanan-item');
        const layanan = [];
        items.forEach((item, i) => {
            const checked = item.querySelector('.bp-radio-input:checked');
            if (checked) {
                // Try to get dynamic name from data-name, or fallback to value
                const serviceName = checked.getAttribute('data-name') || checked.value;
                layanan.push(serviceName);
            }
        });

        // Format jadwal
        const tanggal = document.getElementById('pilihTanggal').value;
        const waktu   = document.getElementById('pilihWaktu').value;
        const jadwalText = formatJadwal(tanggal, waktu);

        // Isi modal
        const list = document.getElementById('modalLayananList');
        list.innerHTML = layanan.map((l, i) => `
            <div class="bp-modal-row">
                <span class="bp-modal-label">Layanan ${layanan.length > 1 ? (i + 1) : ''}</span>
                <span class="bp-modal-value">${l}</span>
            </div>
        `).join('');

        document.getElementById('modalJadwal').textContent = jadwalText;

        // Tampilkan modal
        document.getElementById('modalRingkasan').classList.add('active');
        document.body.style.overflow = 'hidden';
    };

    window.tutupModal = function (e) {
        if (e.target === document.getElementById('modalRingkasan')) tutupModalBtn();
    };

    window.tutupModalBtn = function () {
        document.getElementById('modalRingkasan').classList.remove('active');
        document.body.style.overflow = '';
    };

    // ESC untuk tutup modal
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') tutupModalBtn();
    });

    /* ─── Konfirmasi & Submit ────────────────────── */
    window.konfirmasiPesanan = function () {
        // Pindahkan nilai catatan ke field tersembunyi dalam form
        const catatan    = document.getElementById('modalCatatanInput').value;
        let hiddenCatatan = document.getElementById('hiddenCatatan');
        if (!hiddenCatatan) {
            hiddenCatatan = document.createElement('input');
            hiddenCatatan.type = 'hidden';
            hiddenCatatan.name = 'catatan';
            hiddenCatatan.id   = 'hiddenCatatan';
            document.getElementById('formBuatPesanan').appendChild(hiddenCatatan);
        }
        hiddenCatatan.value = catatan;

        // Submit form
        document.getElementById('formBuatPesanan').submit();
    };

    /* ─── Helpers ────────────────────────────────── */
    function formatJadwal(tanggal, waktu) {

        if (!tanggal) return '—';

        const date = new Date(tanggal + 'T00:00:00');

        const hari = date.toLocaleDateString('id-ID', {
            weekday: 'long'
        });

        const tanggalLengkap = date.toLocaleDateString('id-ID', {
            day: 'numeric',
            month: 'long',
            year: 'numeric'
    });

    return `${hari}, ${tanggalLengkap} • ${waktu}`;
}

    function showToast(msg) {
        // Simple toast — bisa diganti dengan komponen toast project ini
        let toast = document.getElementById('bpToast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'bpToast';
            toast.style.cssText = `
                position:fixed; bottom:90px; left:50%; transform:translateX(-50%);
                background:#1A1D2E; color:#fff; padding:10px 20px;
                border-radius:8px; font-size:13px; z-index:9999;
                box-shadow:0 4px 16px rgba(0,0,0,.2);
                transition:opacity .3s;
            `;
            document.body.appendChild(toast);
        }
        toast.textContent = msg;
        toast.style.opacity = '1';
        clearTimeout(toast._timeout);
        toast._timeout = setTimeout(() => { toast.style.opacity = '0'; }, 3000);
    }

       document.addEventListener('DOMContentLoaded', () => {

        const daftarLayanan = document.getElementById('daftarLayanan');
        if (daftarLayanan) {
            daftarLayanan.addEventListener('change', (e) => {
                if (e.target.classList.contains('bp-radio-input')) {
                    updateDisabledServices();
                }
            });
            // Initial call
            updateDisabledServices();
        }

        const tanggalInput = document.getElementById('pilihTanggal');

        const now = new Date();

        // hari ini
        const today = new Date();
        today.setHours(0, 0, 0, 0);

        // 7 hari ke depan
        const maxDate = new Date();
        maxDate.setDate(today.getDate() + 7);

        // format YYYY-MM-DD
        function formatDate(d) {
            return d.getFullYear() + '-' +
                String(d.getMonth() + 1).padStart(2, '0') + '-' +
                String(d.getDate()).padStart(2, '0');
        }

        // set batas min & max
        tanggalInput.min = formatDate(today);
        tanggalInput.max = formatDate(maxDate);

        // kalau kosong → set default hari ini
        if (!tanggalInput.value) {
            tanggalInput.value = formatDate(today);
        }

        const waktuSelect = document.getElementById('pilihWaktu');

        generateSlotWaktu();

        tanggalInput.addEventListener('change', generateSlotWaktu);

        function generateSlotWaktu() {

            waktuSelect.innerHTML =
                '<option value="">Pilih Waktu Pickup</option>';

            const now = new Date();

        const currentDate = new Date();
        const today =
            currentDate.getFullYear() + '-' +
            String(currentDate.getMonth() + 1).padStart(2, '0') + '-' +
            String(currentDate.getDate()).padStart(2, '0');

        if (
            tanggalInput.value === today &&
            now.getHours() >= 21
        ) {
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);

            const tomorrowDate =
                tomorrow.getFullYear() + '-' +
                String(tomorrow.getMonth() + 1).padStart(2, '0') + '-' +
                String(tomorrow.getDate()).padStart(2, '0');

            tanggalInput.value = tomorrowDate;
            generateSlotWaktu();
            return;

        }

        const selectedDate = tanggalInput.value;

            const todayDate =
                now.getFullYear() + '-' +
                String(now.getMonth() + 1).padStart(2, '0') + '-' +
                String(now.getDate()).padStart(2, '0');

            const isToday = selectedDate === todayDate;

            // Jam operasional laundry
            const buka = 8;
            const tutup = 21;

            let jumlahSlot = 0;

        for (let jam = buka; jam < tutup; jam++) {

            // Jika hari ini, sembunyikan jam yang sudah lewat
            if (isToday && jam <= now.getHours()) {
                continue;
            }

            const mulai = String(jam).padStart(2, '0') + ':00';
            const selesai = String(jam + 1).padStart(2, '0') + ':00';

            const option = document.createElement('option');
            option.value = mulai;
            option.textContent = `${mulai} - ${selesai}`;

            waktuSelect.appendChild(option);
            jumlahSlot++;
        }

        if (jumlahSlot === 0) {
            waktuSelect.disabled = true;

            const option = document.createElement('option');
            option.textContent = 'Tidak ada slot tersedia';
            option.disabled = true;

            waktuSelect.appendChild(option);
        }
        else {
            waktuSelect.disabled = false;
        }
        }
    });

})();