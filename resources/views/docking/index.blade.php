<x-layouts.app>
    <div class="p-6">

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <x-data-table :data="$dockings" paginated>

            {{-- HEADER --}}
            <x-slot name="header">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                        Data Docking
                    </h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Monitoring aktivitas docking kapal
                    </p>
                </div>
            </x-slot>

            {{-- SEARCH --}}
            <x-slot name="search">
                <form method="GET" action="{{ route('docking.index') }}" class="flex gap-2">

                    <input type="hidden" name="status" value="{{ request('status') }}">

                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari kapal / lokasi / jenis..."
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white">

                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                        Cari
                    </button>

                    @if (request('search'))
                        <a href="{{ route('docking.index', ['status' => request('status')]) }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition">
                            Reset
                        </a>
                    @endif
                </form>
            </x-slot>

            {{-- FILTER --}}
            <x-slot name="filters">
                <div class="flex gap-2 flex-wrap">

                    <a href="{{ route('docking.index', [
                        'search' => request('search'),
                    ]) }}"
                        class="px-3 py-2 rounded-lg text-sm transition
                        {{ request('status') == null ? 'bg-gray-500 text-white' : 'bg-gray-200 dark:bg-gray-700 dark:text-white' }}">
                        Semua
                    </a>

                    <a href="{{ route('docking.index', [
                        'status' => 'planned',
                        'search' => request('search'),
                    ]) }}"
                        class="px-3 py-2 rounded-lg text-sm text-white transition
                        {{ request('status') == 'planned' ? 'bg-blue-700' : 'bg-blue-500 hover:bg-blue-600' }}">
                        Planned
                    </a>

                    <a href="{{ route('docking.index', [
                        'status' => 'ongoing',
                        'search' => request('search'),
                    ]) }}"
                        class="px-3 py-2 rounded-lg text-sm text-white transition
                        {{ request('status') == 'ongoing' ? 'bg-yellow-700' : 'bg-yellow-500 hover:bg-yellow-600' }}">
                        Ongoing
                    </a>

                    <a href="{{ route('docking.index', [
                        'status' => 'completed',
                        'search' => request('search'),
                    ]) }}"
                        class="px-3 py-2 rounded-lg text-sm text-white transition
                        {{ request('status') == 'completed' ? 'bg-green-700' : 'bg-green-500 hover:bg-green-600' }}">
                        Completed
                    </a>

                </div>
            </x-slot>

            {{-- ACTION --}}
            <x-slot name="actions">
                <a href="{{ route('docking.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                    + Tambah Docking
                </a>
            </x-slot>

            {{-- COLUMNS --}}
            <x-slot name="columns">
                <x-table-column>Kapal</x-table-column>
                <x-table-column>Tanggal</x-table-column>
                <x-table-column>Lokasi</x-table-column>
                <x-table-column>Jenis</x-table-column>
                <x-table-column>Status</x-table-column>
                <x-table-column class="text-center w-28">Aksi</x-table-column>
            </x-slot>

            {{-- ROWS --}}
            <x-slot name="rows">
                @forelse($dockings as $d)
                    <x-table-row>

                        <x-table-cell>
                            {{ $d->kapal->nama_kapal }}
                        </x-table-cell>

                        <x-table-cell>
                            {{ \Carbon\Carbon::parse($d->tanggal_docking)->format('d M Y') }}
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

                        <x-table-cell class="text-center">
                            <div class="flex justify-center items-center gap-1.5">
                                <a href="{{ route('docking.edit', $d->id) }}"
                                    class="text-amber-500 hover:text-amber-700 dark:text-amber-400 dark:hover:text-amber-300 p-1.5 rounded transition"
                                    title="Edit">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </a>

                                <form action="{{ route('docking.destroy', $d->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus data docking?')" class="inline-flex">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 p-1.5 rounded transition"
                                        title="Hapus">
                                        <i class="fa-solid fa-trash text-lg"></i>
                                    </button>
                                </form>
                            </div>
                        </x-table-cell>

                    </x-table-row>
                @empty
                    <x-table-row>
                        <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                            Tidak ada data docking.
                        </td>
                    </x-table-row>
                @endforelse
            </x-slot>

        </x-data-table>

    </div>
</x-layouts.app>

