<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Semua Dokumen</title>

    @vite(['resources/css/app.css'])
</head>

<body class="bg-white p-8 text-sm">

    {{-- HEADER --}}
    <div class="text-center mb-6 border-b-2 border-black pb-4">

        <div class="flex items-center justify-center gap-4">

            <div>
                {{-- Logo  --}}
                <img src="{{ asset('images/logo_rimaushipping.png') }}" class="h-16">

                <h1 class="text-2xl font-bold">
                    PT RIMAU SHIPPING
                </h1>

                <p class="text-sm">
                    Sistem Informasi Monitoring Dokumen Kapal
                </p>

            </div>

        </div>

        <h2 class="text-xl font-semibold mt-4">
            LAPORAN SEMUA DOKUMEN
        </h2>

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
                <td>{{ $dokumens->count() }}</td>
            </tr>

            <tr>
                <td>Dokumen Aktif</td>
                <td>:</td>
                <td>{{ $aktif }}</td>
            </tr>

            <tr>
                <td>Dokumen Warning</td>
                <td>:</td>
                <td>{{ $warning }}</td>
            </tr>

            <tr>
                <td>Dokumen Expired</td>
                <td>:</td>
                <td>{{ $expired }}</td>
            </tr>

        </table>

    </div>

    {{-- FILTER LAPORAN --}}
    <div class="mb-6">

        <h3 class="font-semibold mb-2">
            Filter Laporan
        </h3>

        <table class="mb-6 text-sm">

            <tr>
                <td width="180">Kapal</td>
                <td width="10">:</td>
                <td>{{ $kapalDipilih?->nama_kapal ?? 'Semua Kapal' }}</td>
            </tr>

            <tr>
                <td>Jenis Dokumen</td>
                <td>:</td>
                <td>{{ $jenisDipilih?->nama ?? 'Semua Jenis Dokumen' }}</td>
            </tr>

            <tr>
                <td>Status</td>
                <td>:</td>
                <td>{{ request('status') ?: 'Semua Status' }}</td>
            </tr>

        </table>

    </div>

    {{-- TABEL --}}
    <table class="w-full border border-collapse">

        <thead>

            <tr class="bg-gray-100">

                <th class="border p-2">No</th>
                <th class="border p-2">Kapal</th>
                <th class="border p-2">Jenis Dokumen</th>
                <th class="border p-2">Nomor Dokumen</th>
                <th class="border p-2">Tanggal Expired</th>
                <th class="border p-2">Status</th>

            </tr>

        </thead>

        <tbody>

            @forelse ($dokumens as $d)
                <tr>

                    <td class="border p-2 text-center">
                        {{ $loop->iteration }}
                    </td>

                    <td class="border p-2">
                        {{ $d->kapal->nama_kapal }}
                    </td>

                    <td class="border p-2">
                        {{ $d->jenisDokumen->nama }}
                    </td>

                    <td class="border p-2">
                        {{ $d->nomor_dokumen }}
                    </td>

                    <td class="border p-2">
                        {{ \Carbon\Carbon::parse($d->tanggal_expired)->translatedFormat('d F Y') }}
                    </td>

                    <td class="border p-2 text-center">
                        {{ ucfirst($d->status) }}
                    </td>

                </tr>

            @empty

                <tr>
                    <td colspan="6" class="border p-4 text-center">
                        Tidak ada data dokumen
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

