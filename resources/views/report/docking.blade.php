<x-layouts.app>
    <div class="p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    Laporan Docking Kapal
                </h1>
                <p class="text-sm text-gray-500">
                    Periode laporan: {{ now()->translatedFormat('d F Y') }}
                </p>
                <p class="text-gray-500">
                    Riwayat docking armada kapal
                </p>
            </div>

            <a href="{{ route('report.docking.print', request()->query()) }}" target="_blank"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                <i class="fa-solid fa-print mr-2"></i>
                Cetak Laporan
            </a>
        </div>

        <!-- FILTER -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-4">
            <form method="GET" action="{{ route('report.docking') }}">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 items-end">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            Pilih Kapal
                        </label>
                        <select name="kapal_id" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <option value="">Semua Kapal</option>
                            @foreach ($kapals as $kapal)
                                <option value="{{ $kapal->id }}" {{ request('kapal_id') == $kapal->id ? 'selected' : '' }}>
                                    {{ $kapal->nama_kapal }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            Status
                        </label>
                        <select name="status" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <option value="">Semua Status</option>
                            <option value="planned" {{ request('status') == 'planned' ? 'selected' : '' }}>Planned</option>
                            <option value="ongoing" {{ request('status') == 'ongoing' ? 'selected' : '' }}>Ongoing</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                        Filter
                    </button>

                    <a href="{{ route('report.docking') }}"
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
                    Total Docking
                </div>
                <div class="text-3xl font-bold text-blue-500 mt-2">
                    {{ $totalDocking }}
                </div>
            </div>
            
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="text-sm text-gray-500">
                    Planned
                </div>
                <div class="text-3xl font-bold text-yellow-500 mt-2">
                    {{ $dockings->where('status', 'planned')->count() }}
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="text-sm text-gray-500">
                    Ongoing
                </div>
                <div class="text-3xl font-bold text-indigo-500 mt-2">
                    {{ $dockings->where('status', 'ongoing')->count() }}
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                <div class="text-sm text-gray-500">
                    Completed
                </div>
                <div class="text-3xl font-bold text-green-500 mt-2">
                    {{ $dockings->where('status', 'completed')->count() }}
                </div>
            </div>
        </div>

        <!-- TABLE -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 overflow-x-auto">
            <x-data-table :data="$dockings" paginated>
                <x-slot name="columns">
                    <x-table-column>No</x-table-column>
                    <x-table-column>Nama Kapal</x-table-column>
                    <x-table-column>Tanggal Docking</x-table-column>
                    <x-table-column>Lokasi</x-table-column>
                    <x-table-column>Jenis Docking</x-table-column>
                    <x-table-column>Status</x-table-column>
                    <x-table-column>Catatan</x-table-column>
                </x-slot>

                <x-slot name="rows">
                    @forelse ($dockings as $d)
                        <x-table-row>
                            <x-table-cell>
                                {{ $dockings->firstItem() + $loop->index }}
                            </x-table-cell>
                            <x-table-cell class="font-semibold text-gray-800 dark:text-white">
                                {{ $d->kapal->nama_kapal }}
                            </x-table-cell>
                            <x-table-cell>
                                {{ \Carbon\Carbon::parse($d->tanggal_docking)->translatedFormat('d F Y') }}
                            </x-table-cell>
                            <x-table-cell>
                                {{ $d->lokasi }}
                            </x-table-cell>
                            <x-table-cell>
                                {{ $d->jenis_docking }}
                            </x-table-cell>
                            <x-table-cell>
                                <x-status-badge :status="$d->status">
                                    {{ ucfirst($d->status) }}
                                </x-status-badge>
                            </x-table-cell>
                            <x-table-cell>
                                {{ $d->catatan ?? '-' }}
                            </x-table-cell>
                        </x-table-row>
                    @empty
                        <x-table-row>
                            <td colspan="7" class="px-6 py-6 text-center text-gray-500">
                                Tidak ada data docking.
                            </td>
                        </x-table-row>
                    @endforelse
                </x-slot>
            </x-data-table>
        </div>

    </div>
</x-layouts.app>
