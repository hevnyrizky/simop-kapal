<x-layouts.app>
    <div class="p-6">

        @if (session('success'))
            <div class="bg-green-100 dark:bg-green-900 border-l-4 border-green-500 text-green-700 dark:text-green-200 p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 dark:bg-red-900 border-l-4 border-red-500 text-red-700 dark:text-red-200 p-4 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif

        <x-data-table :data="$users" paginated>

            {{-- HEADER --}}
            <x-slot name="header">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                        Manajemen Pengguna
                    </h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Kelola data akun pengguna aplikasi dan hak aksesnya
                    </p>
                </div>
            </x-slot>

            {{-- SEARCH --}}
            <x-slot name="search">
                <form method="GET" action="{{ route('user.index') }}" class="flex gap-2">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama atau email..."
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white">

                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                        Cari
                    </button>

                    @if (request('search'))
                        <a href="{{ route('user.index') }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition">
                            Reset
                        </a>
                    @endif
                </form>
            </x-slot>

            {{-- ACTION --}}
            <x-slot name="actions">
                <a href="{{ route('user.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                    + Tambah Pengguna
                </a>
            </x-slot>

            {{-- TABLE HEADER --}}
            <x-slot name="columns">
                <x-table-column>No</x-table-column>
                <x-table-column>Nama</x-table-column>
                <x-table-column>Email</x-table-column>
                <x-table-column>Role</x-table-column>
                <x-table-column>Terdaftar</x-table-column>
                <x-table-column>Aksi</x-table-column>
            </x-slot>

            {{-- TABLE ROWS --}}
            <x-slot name="rows">
                @forelse ($users as $u)
                    <x-table-row>
                        <x-table-cell>
                            {{ $users->firstItem() + $loop->index }}
                        </x-table-cell>

                        <x-table-cell>
                            <span class="font-medium text-gray-900 dark:text-white">{{ $u->name }}</span>
                            @if ($u->id === auth()->id())
                                <span class="ml-2 text-xs bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200 px-2 py-0.5 rounded-full">
                                    Saya
                                </span>
                            @endif
                        </x-table-cell>

                        <x-table-cell>
                            {{ $u->email }}
                        </x-table-cell>

                        <x-table-cell>
                            <x-status-badge :status="$u->role === 'admin' ? 'aktif' : 'warning'">
                                {{ ucfirst($u->role) }}
                            </x-status-badge>
                        </x-table-cell>

                        <x-table-cell>
                            {{ $u->created_at->format('d M Y') }}
                        </x-table-cell>

                        <x-table-cell>
                            <div class="flex gap-1">
                                <a href="{{ route('user.edit', $u->id) }}"
                                    class="text-amber-500 hover:text-amber-700 dark:text-amber-400 dark:hover:text-amber-300 p-1.5 rounded transition"
                                    title="Edit">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </a>

                                @if ($u->id !== auth()->id())
                                    <form action="{{ route('user.destroy', $u->id) }}" method="POST"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-500 hover:text-red-700 dark:text-red-400 dark:hover:text-red-300 p-1.5 rounded transition"
                                            title="Hapus">
                                            <i class="fa-solid fa-trash text-lg"></i>
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </x-table-cell>
                    </x-table-row>
                @empty
                    <x-table-row>
                        <td colspan="6" class="px-6 py-6 text-center text-gray-500">
                            Tidak ada data pengguna.
                        </td>
                    </x-table-row>
                @endforelse
            </x-slot>

        </x-data-table>

    </div>
</x-layouts.app>
