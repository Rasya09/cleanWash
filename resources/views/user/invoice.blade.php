<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - {{ $pesanan->order_code }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4f46e5;
            --text-color: #333;
            --border-color: #e5e7eb;
            --bg-color: #f9fafb;
        }
        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text-color);
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: var(--bg-color);
        }
        .invoice-container {
            max-width: 800px;
            margin: 40px auto;
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
        }
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .invoice-logo h1 {
            color: var(--primary-color);
            margin: 0;
            font-size: 28px;
        }
        .invoice-details {
            text-align: right;
        }
        .invoice-details p {
            margin: 5px 0;
            color: #6b7280;
        }
        .invoice-details strong {
            color: var(--text-color);
        }
        .badge-lunas {
            display: inline-block;
            background-color: #10b981;
            color: white;
            padding: 4px 12px;
            border-radius: 999px;
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        .customer-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 40px;
        }
        .info-block {
            width: 45%;
        }
        .info-block h3 {
            font-size: 16px;
            color: #9ca3af;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }
        .info-block p {
            margin: 5px 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid var(--border-color);
        }
        th {
            background-color: var(--bg-color);
            color: #6b7280;
            font-weight: 500;
        }
        .text-right {
            text-align: right;
        }
        .total-row {
            font-weight: bold;
            font-size: 18px;
        }
        .total-row td {
            border-bottom: none;
            border-top: 2px solid var(--border-color);
        }
        .print-btn {
            display: block;
            width: 100%;
            max-width: 200px;
            margin: 40px auto 0;
            padding: 12px;
            background-color: var(--primary-color);
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            border: none;
        }
        .print-btn:hover {
            background-color: #4338ca;
        }
        @media print {
            body {
                background-color: #fff;
            }
            .invoice-container {
                box-shadow: none;
                margin: 0;
                padding: 20px;
                max-width: 100%;
            }
            .print-btn {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="invoice-container">
        <div class="invoice-header">
            <div>
                <div class="invoice-logo" style="display: flex; align-items: center; gap: 10px;">
                    <img src="{{ asset('assets/images/CW.png') }}" alt="Clean Wash Logo" style="height: 100px;">
                </div>
            </div>
            <div class="invoice-details">
                <span class="badge-lunas">LUNAS</span>
                <p><strong>INVOICE NO:</strong> {{ $pesanan->order_code }}</p>
                <p><strong>TANGGAL:</strong> {{ $pesanan->created_at->format('d M Y') }}</p>
            </div>
        </div>

        <div class="customer-info">
            <div class="info-block">
                <h3>Penagihan Kepada:</h3>
                <p><strong>{{ Auth::user()->name }}</strong></p>
                <p>{{ Auth::user()->phone ?? '-' }}</p>
                <p>{{ $pesanan->alamat_pengantaran ?? $pesanan->alamat_pickup ?? 'Alamat tidak tersedia' }}</p>
            </div>
            <div class="info-block">
                <h3>Layanan Laundry:</h3>
                <p><strong>{{ $pesanan->mitraLaundry->store_name ?? '-' }}</strong></p>
                <p>{{ $pesanan->mitraLaundry->user->phone ?? '-' }}</p>
                <p>{{ $pesanan->mitraLaundry->address ?? '-' }}</p>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Deskripsi Layanan</th>
                    <th class="text-right">Harga</th>
                    <th class="text-right">Jumlah</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pesanan->items as $item)
                @php
                    $namaLayananLower = strtolower($item->nama_layanan);
                    $isKiloan = str_contains($namaLayananLower, 'cuci kering') || str_contains($namaLayananLower, 'setrika');
                    $satuan = $isKiloan ? 'kg' : (str_contains($namaLayananLower, 'sepatu') ? 'pasang' : (str_contains($namaLayananLower, 'karpet') ? 'meter' : 'pcs'));
                    
                    $harga = $isKiloan ? $item->harga_per_kg : $item->harga_satuan;
                    if (is_null($harga) || $harga == 0) {
                        $laundryService = \App\Models\LaundryService::find($item->jenis_layanan);
                        $harga = $laundryService ? $laundryService->base_price : $item->subtotal;
                    }
                    
                    $jumlah = floatval($isKiloan ? ($item->berat_aktual ?? $item->estimasi_berat ?? 0) : ($item->qty ?? 0));
                @endphp
                <tr>
                    <td>{{ $item->nama_layanan ?? 'Layanan Laundry' }}</td>
                    <td class="text-right">Rp {{ number_format((float) $harga, 0, ',', '.') }}</td>
                    <td class="text-right">{{ $jumlah }} {{ $satuan }}</td>
                    <td class="text-right">Rp {{ number_format((float) $item->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach

                @if($pesanan->ongkir > 0)
                <tr>
                    <td colspan="3" class="text-right">Biaya Ongkir</td>
                    <td class="text-right">Rp {{ number_format((float) $pesanan->ongkir, 0, ',', '.') }}</td>
                </tr>
                @endif

                @if($pesanan->diskon > 0)
                <tr>
                    <td colspan="3" class="text-right">Diskon</td>
                    <td class="text-right">-Rp {{ number_format((float) $pesanan->diskon, 0, ',', '.') }}</td>
                </tr>
                @endif

                <tr class="total-row">
                    <td colspan="3" class="text-right">TOTAL KESELURUHAN</td>
                    <td class="text-right" style="color: var(--primary-color);">Rp {{ number_format($pesanan->total_bayar, 0, ',', '.') }}</td>
                </tr>
            </tbody>
        </table>

        <button class="print-btn" onclick="window.print()">
            Cetak Invoice
        </button>
    </div>

</body>
</html>
