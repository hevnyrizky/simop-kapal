<x-layouts.app>

    <div class="p-6 print-area">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">

            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    Laporan Dokumen Expired
                </h1>

                <p class="text-sm text-gray-500">
                    Periode laporan:
                    {{ now()->translatedFormat('d F Y') }}
                </p>

                <p class="text-gray-500">
                    Data dokumen kapal yang telah melewati masa berlaku
                </p>
            </div>

            <a href="{{ route('report.expired.print', request()->query()) }}" target="_blank"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

                <i class="fa-solid fa-print mr-2"></i>
                Cetak Laporan

            </a>

        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-4">

            <form method="GET" action="{{ route('report.expired') }}">

                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

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

                    <button type="submit" class="bg-blue-500 text-white rounded-lg px-4 py-2">

                        Filter

                    </button>

                    <a href="{{ route('report.expired') }}"
                        class="bg-gray-500 text-white rounded-lg px-4 py-2 text-center">

                        Reset

                    </a>

                </div>

            </form>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 md:col-span-4">

                <div class="text-sm text-gray-500">
                    Dokumen Expired
                </div>

                <div class="text-3xl font-bold text-red-500 mt-2">
                    {{ $totalExpired }}
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
                    <x-table-column>Tanggal Expired</x-table-column>
                    <x-table-column>Terlambat</x-table-column>
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
                                    <span class="text-red-500 font-semibold">

                                        {{ abs($d->sisa_hari) }} hari lewat

                                    </span>
                                @else
                                    {{ $d->sisa_hari }} hari
                                @endif

                            </x-table-cell>

                            <x-table-cell>

                                <x-status-badge status="inactive">
                                    Expired
                                </x-status-badge>

                            </x-table-cell>

                        </x-table-row>

                    @empty

                        <x-table-row>

                            <td colspan="7" class="px-6 py-6 text-center text-gray-500">

                                Tidak ada data dokumen expired.

                            </td>

                        </x-table-row>
                    @endforelse

                </x-slot>

            </x-data-table>

        </div>
    </div>
</x-layouts.app>

