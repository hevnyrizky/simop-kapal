<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Statistik Armada</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-white p-8 text-sm text-black">

    {{-- HEADER --}}
    <div class="text-center mb-6 border-b-2 border-black pb-4">
        <div class="flex items-center justify-center gap-4">
            <div>
                <img src="{{ asset('images/logo_rimaushipping.png') }}" class="h-16 mx-auto mb-2">
                <h1 class="text-2xl font-bold">
                    PT RIMAU SHIPPING
                </h1>
                <p class="text-sm">
                    Sistem Informasi Monitoring Dokumen Kapal
                </p>
                <h2 class="text-lg font-semibold mt-2">
                    LAPORAN STATISTIK MONITORING ARMADA
                </h2>
            </div>
        </div>
    </div>

    {{-- INFORMASI LAPORAN --}}
    <div class="mb-6">
        <table class="text-sm">
            <tr>
                <td width="180">Tanggal Cetak</td>
                <td width="10">:</td>
                <td>{{ now()->translatedFormat('d F Y H:i') }}</td>
            </tr>
        </table>
    </div>

    {{-- TABEL STATISTIK RINGKASAN --}}
    <h3 class="font-bold text-base mb-2">I. Ringkasan Status Dokumen & Armada</h3>
    <table class="w-full border border-collapse mb-6">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2 text-left">Indikator Statistik</th>
                <th class="border p-2 text-center" width="200">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border p-2 font-semibold">Total Armada Kapal</td>
                <td class="border p-2 text-center font-bold text-blue-600">{{ $totalKapal }}</td>
            </tr>
            <tr>
                <td class="border p-2 font-semibold">Total Dokumen Terdaftar</td>
                <td class="border p-2 text-center font-bold text-indigo-600">{{ $totalDokumen }}</td>
            </tr>
            <tr>
                <td class="border p-2 font-semibold">Dokumen Aktif (Aman)</td>
                <td class="border p-2 text-center font-bold text-green-600">{{ $aktif }}</td>
            </tr>
            <tr>
                <td class="border p-2 font-semibold">Dokumen Warning (Akan Expired &le; 30 Hari)</td>
                <td class="border p-2 text-center font-bold text-yellow-600">{{ $warning }}</td>
            </tr>
            <tr>
                <td class="border p-2 font-semibold">Dokumen Expired (Kadaluarsa)</td>
                <td class="border p-2 text-center font-bold text-red-600">{{ $expired }}</td>
            </tr>
        </tbody>
    </table>

    {{-- TABEL DISTRIBUSI DOKUMEN --}}
    <h3 class="font-bold text-base mb-2 mt-6">II. Distribusi Jenis Dokumen</h3>
    <table class="w-full border border-collapse mb-6">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2 text-center" width="50">No</th>
                <th class="border p-2 text-left">Jenis Dokumen</th>
                <th class="border p-2 text-center" width="200">Masa Berlaku</th>
                <th class="border p-2 text-center" width="200">Jumlah Terdaftar</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jenisDokumens as $jd)
                <tr>
                    <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                    <td class="border p-2 font-semibold">{{ $jd->nama }}</td>
                    <td class="border p-2 text-center">{{ $jd->masa_berlaku }} Bulan</td>
                    <td class="border p-2 text-center font-bold">{{ $jd->dokumen_kapal_count }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="border p-4 text-center">Tidak ada data jenis dokumen</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- TABEL DISTRIBUSI TIPE KAPAL --}}
    <h3 class="font-bold text-base mb-2 mt-6">III. Distribusi Armada Berdasarkan Tipe Kapal</h3>
    <table class="w-full border border-collapse mb-6">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2 text-center" width="50">No</th>
                <th class="border p-2 text-left">Tipe Kapal</th>
                <th class="border p-2 text-center" width="200">Jumlah Armada</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tipeKapals as $tk)
                <tr>
                    <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                    <td class="border p-2 font-semibold">{{ $tk->nama }}</td>
                    <td class="border p-2 text-center font-bold">{{ $tk->kapals_count }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="border p-4 text-center">Tidak ada data tipe kapal</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- TANDA TANGAN --}}
    <div class="mt-16 flex justify-end">
        <div class="text-center">
            <p>
                Banjarbaru,
                {{ now()->translatedFormat('d F Y') }}
            </p>
            <p class="mb-20">
                Administrator
            </p>
            <p>
                _______________________
            </p>
        </div>
    </div>

    {{-- AUTO PRINT --}}
    <script>
        window.onload = function() {
            window.print();
        };
    </script>

</body>

</html>
