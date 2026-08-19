<x-layouts.app>
    @if (request('print'))

        <div class="max-w-7xl mx-auto p-8 bg-white text-black">

            {{-- HEADER --}}
            <div class="text-center border-b-2 border-black pb-4 mb-6">

                <h1 class="text-3xl font-bold">
                    SIMOP-KAPAL
                </h1>

                <p class="text-sm">
                    Sistem Informasi Monitoring Dokumen Kapal
                </p>

                <h2 class="text-xl font-semibold mt-4">
                    LAPORAN SEMUA DOKUMEN
                </h2>

            </div>

            {{-- INFORMASI LAPORAN --}}
            <div class="grid grid-cols-2 gap-4 mb-6 text-sm">

                <div>
                    <table>
                        <tr>
                            <td class="pr-2 font-semibold">Tanggal Cetak</td>
                            <td>:</td>
                            <td>{{ now()->translatedFormat('d F Y H:i') }}</td>
                        </tr>

                        <tr>
                            <td class="pr-2 font-semibold">Total Data</td>
                            <td>:</td>
                            <td>{{ $dokumens->count() }}</td>
                        </tr>
                    </table>
                </div>

                <div class="text-right">
                    <table class="ml-auto">

                        <tr>
                            <td class="pr-2">Aktif</td>
                            <td>:</td>
                            <td>{{ $aktif }}</td>
                        </tr>

                        <tr>
                            <td class="pr-2">Warning</td>
                            <td>:</td>
                            <td>{{ $warning }}</td>
                        </tr>

                        <tr>
                            <td class="pr-2">Expired</td>
                            <td>:</td>
                            <td>{{ $expired }}</td>
                        </tr>

                    </table>
                </div>

            </div>

            {{-- TABEL --}}
            <table class="w-full border border-collapse text-sm">

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

                                @if ($d->status == 'aktif')
                                    Aktif
                                @elseif($d->status == 'warning')
                                    Warning
                                @else
                                    Expired
                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="border p-4 text-center">
                                Tidak ada data dokumen.
                            </td>
                        </tr>
                    @endforelse

                </tbody>

            </table>

            {{-- TANDA TANGAN --}}
            <div class="mt-16 flex justify-end">

                <div class="text-center">

                    <p>
                        Banjarmasin, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
                    </p>

                    <p class="mb-20">
                        Administrator
                    </p>

                    <p class="font-semibold">
                        _______________________
                    </p>

                </div>

            </div>

        </div>

        <script>
            window.onload = function() {
                window.print();
            };
        </script>
    @else
        {{-- MODE MONITORING --}}

        <div class="p-6 print-area">

            <!-- HEADER -->
            <div class="flex justify-between items-center mb-6">

                <div>
                    <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Laporan Semua Dokumen
                    </h1>

                    <p class="text-sm text-gray-500">
                        Periode laporan:
                        {{ now()->translatedFormat('d F Y') }}
                    </p>

                    <p class="text-gray-500">
                        Data seluruh dokumen kapal
                    </p>
                </div>

                <a href="{{ route('report.dokumen.print', request()->query()) }}" target="_blank"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

                    <i class="fa-solid fa-print mr-2"></i>
                    Cetak Laporan

                </a>

            </div>

            {{-- FILTER --}}
            <div class="no-print bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-4">

                <form method="GET" action="{{ route('report.dokumen') }}">

                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                        <select name="kapal_id" class="border rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white">

                            <option value="">
                                Semua Kapal
                            </option>

                            @foreach ($kapals as $kapal)
                                <option value="{{ $kapal->id }}"
                                    {{ request('kapal_id') == $kapal->id ? 'selected' : '' }}>

                                    {{ $kapal->nama_kapal }}

                                </option>
                            @endforeach

                        </select>

                        <select name="status" class="border rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white">

                            <option value="">Semua Status</option>

                            <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>
                                Aktif
                            </option>

                            <option value="warning" {{ request('status') == 'warning' ? 'selected' : '' }}>
                                Warning
                            </option>

                            <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>
                                Expired
                            </option>

                        </select>

                        <select name="jenis_dokumen_id"
                            class="border rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white">

                            <option value="">
                                Semua Jenis Dokumen
                            </option>

                            @foreach ($jenisDokumens as $jenis)
                                <option value="{{ $jenis->id }}"
                                    {{ request('jenis_dokumen_id') == $jenis->id ? 'selected' : '' }}>

                                    {{ $jenis->nama }}

                                </option>
                            @endforeach

                        </select>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

                            Filter

                        </button>

                        <a href="{{ route('report.dokumen') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-center">

                            Reset

                        </a>

                    </div>

                </form>

            </div>

            {{-- SUMMARY CARD --}}
            <div class="no-print grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="text-sm text-gray-500">
                        Total Dokumen
                    </div>

                    <div class="text-3xl font-bold text-blue-500 mt-2">
                        {{ $totalDokumen }}
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="text-sm text-gray-500">
                        Dokumen Aktif
                    </div>

                    <div class="text-3xl font-bold text-green-500 mt-2">
                        {{ $aktif }}
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="text-sm text-gray-500">
                        Warning
                    </div>

                    <div class="text-3xl font-bold text-yellow-500 mt-2">
                        {{ $warning }}
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="text-sm text-gray-500">
                        Expired
                    </div>

                    <div class="text-3xl font-bold text-red-500 mt-2">
                        {{ $expired }}
                    </div>
                </div>

            </div>

            <!-- TABLE -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 overflow-x-auto">

                <x-data-table :data="$dokumens" paginated>

                    <x-slot name="columns">

                        <x-table-column>No</x-table-column>
                        <x-table-column>Kapal</x-table-column>
                        <x-table-column>Jenis Dokumen</x-table-column>
                        <x-table-column>Nomor Dokumen</x-table-column>
                        <x-table-column>Expired</x-table-column>
                        <x-table-column>Sisa Hari</x-table-column>
                        <x-table-column>Status</x-table-column>

                    </x-slot>

                    <x-slot name="rows">

                        @forelse ($dokumens as $d)
                            <x-table-row>
                                <x-table-cell>
                                    {{ $dokumens->firstItem() + $loop->index }}
                                </x-table-cell>

                                <x-table-cell>
                                    {{ $d->kapal->nama_kapal }}
                                </x-table-cell>

                                <x-table-cell>
                                    {{ $d->jenisDokumen->nama }}
                                </x-table-cell>

                                <x-table-cell>
                                    {{ $d->nomor_dokumen }}
                                </x-table-cell>

                                <x-table-cell>
                                    {{ \Carbon\Carbon::parse($d->tanggal_expired)->translatedFormat('d F Y') }}
                                </x-table-cell>

                                <x-table-cell>

                                    @if ($d->sisa_hari < 0)
                                        <span class="text-red-500 font-bold">
                                            {{ abs($d->sisa_hari) }} hari lewat
                                        </span>
                                    @else
                                        {{ $d->sisa_hari }} hari
                                    @endif

                                </x-table-cell>

                                <x-table-cell>

                                    <x-status-badge :status="$d->status">
                                        {{ ucfirst($d->status) }}
                                    </x-status-badge>

                                </x-table-cell>

                            </x-table-row>

                        @empty

                            <x-table-row>
                                <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                                    Tidak ada data dokumen.
                                </td>
                            </x-table-row>
                        @endforelse

                    </x-slot>

                </x-data-table>

            </div>

        </div>

        <!-- PRINT ONLY -->

        <div class="print-only hidden">

            <table class="w-full border mb-4">
                <tr>
                    <td>Total Dokumen</td>
                    <td>{{ $totalDokumen }}</td>
                </tr>
                <tr>
                    <td>Aktif</td>
                    <td>{{ $aktif }}</td>
                </tr>
                <tr>
                    <td>Warning</td>
                    <td>{{ $warning }}</td>
                </tr>
                <tr>
                    <td>Expired</td>
                    <td>{{ $expired }}</td>
                </tr>
            </table>

        </div>
    @endif
</x-layouts.app>

