<x-layouts.app>
    <div class="p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    Laporan Data Operator
                </h1>
                <p class="text-sm text-gray-500">
                    Periode laporan: {{ now()->translatedFormat('d F Y') }}
                </p>
                <p class="text-gray-500">
                    Data seluruh operator kapal
                </p>
            </div>

            <a href="{{ route('report.operator.print', request()->query()) }}" target="_blank"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fa-solid fa-print mr-2"></i>
                Cetak Laporan
            </a>
        </div>

        <!-- FILTER -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-4">
            <form method="GET" action="{{ route('report.operator') }}">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nama Operator
                        </label>
                        <input type="text" name="nama" value="{{ request('nama') }}"
                            placeholder="Cari nama operator..."
                            class="w-full border rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                        Filter
                    </button>

                    <a href="{{ route('report.operator') }}"
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
                    Total Operator
                </div>
                <div class="text-3xl font-bold text-blue-500 mt-2">
                    {{ $totalOperator }}
                </div>
            </div>
        </div>

        <!-- TABLE -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 overflow-x-auto">
            <x-data-table :data="$operators" paginated>
                <x-slot name="columns">
                    <x-table-column>No</x-table-column>
                    <x-table-column>Nama Operator</x-table-column>
                    <x-table-column>Alamat</x-table-column>
                    <x-table-column>Telepon</x-table-column>
                </x-slot>

                <x-slot name="rows">
                    @forelse ($operators as $o)
                        <x-table-row>
                            <x-table-cell>
                                {{ $operators->firstItem() + $loop->index }}
                            </x-table-cell>
                            <x-table-cell class="font-semibold text-gray-800 dark:text-white">
                                {{ $o->nama }}
                            </x-table-cell>
                            <x-table-cell>
                                {{ $o->alamat ?? '-' }}
                            </x-table-cell>
                            <x-table-cell>
                                {{ $o->telepon ?? '-' }}
                            </x-table-cell>
                        </x-table-row>
                    @empty
                        <x-table-row>
                            <td colspan="4" class="px-6 py-6 text-center text-gray-500">
                                Tidak ada data operator.
                            </td>
                        </x-table-row>
                    @endforelse
                </x-slot>
            </x-data-table>
        </div>

    </div>
</x-layouts.app>
