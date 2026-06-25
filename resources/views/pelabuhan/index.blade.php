<x-layouts.app>
    <div class="p-6">

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <x-data-table :data="$pelabuhans" paginated>

            {{-- HEADER --}}
            <x-slot name="header">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                        Data Pelabuhan
                    </h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Master data pelabuhan
                    </p>
                </div>
            </x-slot>

            {{-- SEARCH --}}
            <x-slot name="search">
                <form method="GET" action="{{ route('pelabuhan.index') }}" class="flex gap-2">

                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama / lokasi / kode..."
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white">

                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                        Cari
                    </button>

                    @if (request('search'))
                        <a href="{{ route('pelabuhan.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
                            Reset
                        </a>
                    @endif
                </form>
            </x-slot>

            {{-- ACTION --}}
            <x-slot name="actions">
                <a href="{{ route('pelabuhan.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                    + Tambah Pelabuhan
                </a>
            </x-slot>

            {{-- COLUMNS --}}
            <x-slot name="columns">
                <x-table-column>Nama</x-table-column>
                <x-table-column>Lokasi</x-table-column>
                <x-table-column>Kode</x-table-column>
                <x-table-column>Keterangan</x-table-column>
                <x-table-column>Aksi</x-table-column>
            </x-slot>

            {{-- ROWS --}}
            <x-slot name="rows">
                @forelse ($pelabuhans as $p)
                    <x-table-row>

                        <x-table-cell>{{ $p->nama }}</x-table-cell>
                        <x-table-cell>{{ $p->lokasi ?: '-' }}</x-table-cell>
                        <x-table-cell>{{ $p->kode ?: '-' }}</x-table-cell>
                        <x-table-cell>{{ $p->keterangan ?: '-' }}</x-table-cell>

                        <x-table-cell>
                            <div class="flex gap-1">
                                <a href="{{ route('pelabuhan.edit', $p->id) }}"
                                    class="text-amber-500 hover:text-amber-700 dark:text-amber-400 dark:hover:text-amber-300 p-1.5 rounded transition"
                                    title="Edit">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </a>

                                <form action="{{ route('pelabuhan.destroy', $p->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus data pelabuhan?')" class="inline">
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
                        <td colspan="5" class="px-6 py-6 text-center text-gray-500">
                            Tidak ada data pelabuhan.
                        </td>
                    </x-table-row>
                @endforelse
            </x-slot>

        </x-data-table>

    </div>
</x-layouts.app>

