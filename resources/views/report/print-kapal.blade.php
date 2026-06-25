<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Data Kapal</title>

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
                    LAPORAN DATA KAPAL
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
            <tr>
                <td>Total Data</td>
                <td>:</td>
                <td>{{ $kapals->count() }}</td>
            </tr>
        </table>
    </div>

    {{-- FILTER LAPORAN --}}
    <div class="mb-6">
        <h3 class="font-semibold mb-2">Filter Laporan</h3>
        <table class="text-sm">
            <tr>
                <td width="180">Operator</td>
                <td width="10">:</td>
                <td>{{ $operatorDipilih?->nama ?? 'Semua Operator' }}</td>
            </tr>
            <tr>
                <td>Pelabuhan</td>
                <td width="10">:</td>
                <td>{{ $pelabuhanDipilih?->nama ?? 'Semua Pelabuhan' }}</td>
            </tr>
            <tr>
                <td>Tipe Kapal</td>
                <td width="10">:</td>
                <td>{{ $tipeKapalDipilih?->nama ?? 'Semua Tipe Kapal' }}</td>
            </tr>
        </table>
    </div>

    {{-- TABEL --}}
    <table class="w-full border border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2">No</th>
                <th class="border p-2">Nama Kapal</th>
                <th class="border p-2">Tipe Kapal</th>
                <th class="border p-2">Operator</th>
                <th class="border p-2">Pelabuhan</th>
                <th class="border p-2">Call Sign</th>
                <th class="border p-2">IMO</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kapals as $k)
                <tr>
                    <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                    <td class="border p-2 font-semibold">{{ $k->nama_kapal }}</td>
                    <td class="border p-2">{{ $k->tipeKapal->nama ?? '-' }}</td>
                    <td class="border p-2">{{ $k->operator->nama ?? '-' }}</td>
                    <td class="border p-2">{{ $k->pelabuhan->nama ?? '-' }}</td>
                    <td class="border p-2 text-center">{{ $k->call_sign ?? '-' }}</td>
                    <td class="border p-2 text-center">{{ $k->imo ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="border p-4 text-center">
                        Tidak ada data kapal
                    </td>
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
