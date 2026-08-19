<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Per Kapal - {{ $kapalDipilih?->nama_kapal }}</title>

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
                    LAPORAN DOKUMEN PER KAPAL
                </h2>
            </div>
        </div>
    </div>

    {{-- INFORMASI LAPORAN --}}
    <div class="mb-6 grid grid-cols-2 gap-4 text-sm">
        <div>
            <table>
                <tr>
                    <td class="pr-2 font-semibold" width="120">Nama Kapal</td>
                    <td>:</td>
                    <td class="font-bold text-lg">{{ $kapalDipilih?->nama_kapal }}</td>
                </tr>
                <tr>
                    <td class="pr-2 font-semibold">Tipe Kapal</td>
                    <td>:</td>
                    <td>{{ $kapalDipilih?->tipeKapal->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="pr-2 font-semibold">Operator</td>
                    <td>:</td>
                    <td>{{ $kapalDipilih?->operator->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="pr-2 font-semibold">Tanggal Cetak</td>
                    <td>:</td>
                    <td>{{ now()->translatedFormat('d F Y H:i') }}</td>
                </tr>
            </table>
        </div>
        <div class="text-right">
            <table class="ml-auto">
                <tr>
                    <td class="pr-2 font-semibold text-right" width="150">Total Dokumen</td>
                    <td>:</td>
                    <td class="text-left pl-2">{{ $dokumens->count() }}</td>
                </tr>
                <tr>
                    <td class="pr-2 font-semibold text-right">Aktif</td>
                    <td>:</td>
                    <td class="text-left pl-2 text-green-600 font-bold">{{ $dokumens->where('status', 'aktif')->count() }}</td>
                </tr>
                <tr>
                    <td class="pr-2 font-semibold text-right">Warning</td>
                    <td>:</td>
                    <td class="text-left pl-2 text-yellow-600 font-bold">{{ $dokumens->where('status', 'warning')->count() }}</td>
                </tr>
                <tr>
                    <td class="pr-2 font-semibold text-right">Expired</td>
                    <td>:</td>
                    <td class="text-left pl-2 text-red-600 font-bold">{{ $dokumens->where('status', 'expired')->count() }}</td>
                </tr>
            </table>
        </div>
    </div>

    {{-- TABEL --}}
    <table class="w-full border border-collapse">
        <thead>
            <tr class="bg-gray-100">
                <th class="border p-2" width="50">No</th>
                <th class="border p-2">Jenis Dokumen</th>
                <th class="border p-2">Nomor Dokumen</th>
                <th class="border p-2" width="180">Tanggal Expired</th>
                <th class="border p-2" width="120">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dokumens as $d)
                <tr>
                    <td class="border p-2 text-center">{{ $loop->iteration }}</td>
                    <td class="border p-2 font-semibold">{{ $d->jenisDokumen->nama }}</td>
                    <td class="border p-2">{{ $d->nomor_dokumen }}</td>
                    <td class="border p-2 text-center">
                        {{ \Carbon\Carbon::parse($d->tanggal_expired)->translatedFormat('d F Y') }}
                    </td>
                    <td class="border p-2 text-center font-bold">
                        {{ ucfirst($d->status) }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="border p-4 text-center">
                        Tidak ada data dokumen kapal.
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
