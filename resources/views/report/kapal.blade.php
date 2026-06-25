<x-layouts.app>

    <div class="p-6 print-area">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">

            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    Laporan Data Kapal
                </h1>

                <p class="text-gray-500">
                    Data seluruh armada kapal
                </p>
            </div>

            <a href="{{ route('report.kapal.print', request()->query()) }}" target="_blank"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">

                <i class="fa-solid fa-print mr-2"></i>
                Cetak Laporan

            </a>

        </div>

        <!-- FILTER -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-4">

            <form method="GET">

                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">

                    <select name="operator_id" class="border rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white">

                        <option value="">
                            Semua Operator
                        </option>

                        @foreach ($operators as $operator)
                            <option value="{{ $operator->id }}" @selected(request('operator_id') == $operator->id)>

                                {{ $operator->nama }}

                            </option>
                        @endforeach

                    </select>

                    <select name="pelabuhan_id" class="border rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white">

                        <option value="">
                            Semua Pelabuhan
                        </option>

                        @foreach ($pelabuhans as $pelabuhan)
                            <option value="{{ $pelabuhan->id }}" @selected(request('pelabuhan_id') == $pelabuhan->id)>

                                {{ $pelabuhan->nama }}

                            </option>
                        @endforeach

                    </select>

                    <select name="tipe_kapal_id" class="border rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white">

                        <option value="">
                            Semua Tipe Kapal
                        </option>

                        @foreach ($tipeKapals as $tipe)
                            <option value="{{ $tipe->id }}" @selected(request('tipe_kapal_id') == $tipe->id)>

                                {{ $tipe->nama }}

                            </option>
                        @endforeach

                    </select>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg px-4 py-2">

                        Filter

                    </button>

                    <a href="{{ route('report.kapal') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white rounded-lg px-4 py-2 text-center">

                        Reset

                    </a>

                </div>

            </form>

        </div>

        <!-- SUMMARY -->
        <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mb-4">

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">

                <div class="text-sm text-gray-500">
                    Total Kapal
                </div>

                <div class="text-3xl font-bold text-blue-500 mt-2">
                    {{ $totalKapal }}
                </div>

            </div>

        </div>

        <!-- TABLE -->
        <!-- TABLE -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 overflow-x-auto">

            <x-data-table :data="$kapals" paginated>

                <x-slot name="columns">

                    <x-table-column>No</x-table-column>
                    <x-table-column>Nama Kapal</x-table-column>
                    <x-table-column>Tipe Kapal</x-table-column>
                    <x-table-column>Operator</x-table-column>
                    <x-table-column>Pelabuhan</x-table-column>
                    <x-table-column>Call Sign</x-table-column>
                    <x-table-column>IMO</x-table-column>

                </x-slot>

                <x-slot name="rows">

                    @forelse ($kapals as $k)
                        <x-table-row>

                            <x-table-cell>
                                {{ $kapals->firstItem() + $loop->index }}
                            </x-table-cell>

                            <x-table-cell>
                                {{ $k->nama_kapal }}
                            </x-table-cell>

                            <x-table-cell>
                                {{ $k->tipeKapal->nama ?? '-' }}
                            </x-table-cell>

                            <x-table-cell>
                                {{ $k->operator->nama ?? '-' }}
                            </x-table-cell>

                            <x-table-cell>
                                {{ $k->pelabuhan->nama ?? '-' }}
                            </x-table-cell>

                            <x-table-cell>
                                {{ $k->call_sign ?? '-' }}
                            </x-table-cell>

                            <x-table-cell>
                                {{ $k->imo ?? '-' }}
                            </x-table-cell>

                        </x-table-row>

                    @empty

                        <x-table-row>

                            <td colspan="7" class="px-6 py-6 text-center text-gray-500">

                                Tidak ada data kapal.

                            </td>

                        </x-table-row>
                    @endforelse

                </x-slot>

            </x-data-table>

        </div>

    </div>

</x-layouts.app>

