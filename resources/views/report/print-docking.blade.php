<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Docking Kapal</title>

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
                    LAPORAN DOCKING ARMADA KAPAL
                </h2>
            </div>
        </div>
    </div>

    {{-- INFORMASI LAPORAN --}}
    <div class="mb-6 grid grid-cols-2 gap-4 text-sm">
        <div>
            <table>
                <tr>
                    <td class="pr-2 font-semibold" width="120">Tanggal Cetak</td>
                    <td>:</td>
                    <td>{{ now()->translatedFormat('d F Y H:i') }}</td>
                </tr>
                <tr>
                    <td class="pr-2 font-semibold">Total Data</td>
                    <td>:</td>
                    <td>{{ $dockings->count() }}</td>
                </tr>
            </table>
        </div>
        <div class="text-right">
            <table class="ml-auto">
                <tr>
                    <td class="pr-2 font-semibold text-right" width="120">Planned</td>
                    <td>:</td>
                    <td class="text-left pl-2">{{ $dockings->where('status', 'planned')->count() }}</td>
                </tr>
                <tr>
                    <td class="pr-2 font-semibold text-right">Ongoing</td>
                    <td>:</td>
                    <td class="text-left pl-2 text-indigo-600 font-bold">{{ $dockings->where('status', 'ongoing')->count() }}</td>
                </tr>
                <tr>
                    <td class="pr-2 font-semibold text-right">Completed</td>
                    <td>:</td>
                    <td class="text-left pl-2 text-green-600 font-bold">{{ $dockings->where('status', 'completed')->count() }}</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- FILTER LAPORAN --}}
    <div class="mb-6">
        <h3 class="font-semibold mb-2">Filter Laporan</h3>
        <table class="text-sm">
            <tr>
                <td width="180">Kapal</td>
                <td width="10">:</td>
                <td>{{ $kapalDipilih?->nama_kapal ?? 'Semua Kapal' }}</td>
            </tr>
            <tr>
                <td>Status Docking</td>
                <td width="10">:</td>
                <td>{{ request('status') ? ucfirst(request('status')) : 'Semua Status' }}</td>
            </tr>
        </table>
    </div>

    {{-- TABEL --}}
    <table class="w-full border border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2" width="50">No</th>
                <th class="border p-2">Nama Kapal</th>
                <th class="border p-2" width="150">Tanggal Docking</th>
                <th class="border p-2">Lokasi</th>
                <th class="border p-2">Jenis Docking</th>
                <th class="border p-2" width="100">Status</th>
                <th class="border p-2">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dockings as $d)
                <tr>
                    <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                    <td class="border p-2 font-semibold">{{ $d->kapal->nama_kapal }}</td>
                    <td class="border p-2 text-center">
                        {{ \Carbon\Carbon::parse($d->tanggal_docking)->translatedFormat('d F Y') }}
                    </td>
                    <td class="border p-2">{{ $d->lokasi }}</td>
                    <td class="border p-2">{{ $d->jenis_docking }}</td>
                    <td class="border p-2 text-center font-bold">
                        {{ ucfirst($d->status) }}
                    </td>
                    <td class="border p-2">{{ $d->catatan ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="border p-4 text-center">
                        Tidak ada data docking kapal.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- TANDA TANGAN --}}
    <div class="mt-16 flex justify-end">
        <div class="text-center">
            <p>
                Banjarmasin,
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
