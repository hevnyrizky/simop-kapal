<x-layouts.app>
    <div class="p-6">

         <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    Laporan Data Pelabuhan
                </h1>
                <p class="text-sm text-gray-500">
                    Periode laporan: {{ now()->translatedFormat('d F Y') }}
                </p>
                <p class="text-gray-500">
                    Data seluruh pelabuhan kapal
                </p>
            </div>

            <a href="{{ route('report.pelabuhan.print', request()->query()) }}" target="_blank"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fa-solid fa-print mr-2"></i>
                Cetak Laporan
            </a>
        </div>

        <!-- FILTER -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-4">
            <form method="GET" action="{{ route('report.pelabuhan') }}">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nama Pelabuhan
                        </label>
                        <input type="text" name="nama" value="{{ request('nama') }}"
                            placeholder="Cari nama pelabuhan..."
                            class="w-full border rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                        Filter
                    </button>

                    <a href="{{ route('report.pelabuhan') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-center">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        <!-- SUMMARY CARD -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="text-sm text-gray-500">
                    Total Pelabuhan
                </div>
                <div class="text-3xl font-bold text-blue-500 mt-2">
                    {{ $totalPelabuhan }}
                </div>
            </div>
        </div>

        <!-- TABLE -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 overflow-x-auto">
            <x-data-table :data="$pelabuhans" paginated>
                <x-slot name="columns">
                    <x-table-column>No</x-table-column>
                    <x-table-column>Nama Pelabuhan</x-table-column>
                    <x-table-column>Lokasi</x-table-column>
                    <x-table-column>Kode</x-table-column>
                    <x-table-column>Keterangan</x-table-column>
                </x-slot>

                <x-slot name="rows">
                    @forelse ($pelabuhans as $p)
                        <x-table-row>
                            <x-table-cell>
                                {{ $pelabuhans->firstItem() + $loop->index }}
                            </x-table-cell>
                            <x-table-cell class="font-semibold text-gray-800 dark:text-white">
                                {{ $p->nama }}
                            </x-table-cell>
                            <x-table-cell>
                                {{ $p->lokasi ?? '-' }}
                            </x-table-cell>
                            <x-table-cell class="text-center font-mono">
                                {{ $p->kode ?? '-' }}
                            </x-table-cell>
                            <x-table-cell>
                                {{ $p->keterangan ?? '-' }}
                            </x-table-cell>
                        </x-table-row>
                    @empty
                        <x-table-row>
                            <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                                Tidak ada data pelabuhan.
                            </td>
                        </x-table-row>
                    @endforelse
                </x-slot>
            </x-data-table>
        </div>

    </div>
</x-layouts.app>
