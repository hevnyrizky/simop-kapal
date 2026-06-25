<x-layouts.app>
    <div class="p-6">

        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <x-data-table :data="$dokumens" paginated>

            {{-- HEADER --}}
            <x-slot name="header">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                        Data Dokumen Kapal
                    </h2>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Monitoring dokumen kapal dan masa berlaku
                    </p>
                </div>
            </x-slot>

            {{-- SEARCH --}}
            <x-slot name="search">
                <form method="GET" action="{{ route('dokumen-kapal.index') }}" class="flex gap-2">

                    <input type="hidden" name="status" value="{{ request('status') }}">

                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari kapal / nomor dokumen..."
                        class="w-full border border-gray-300 dark:border-gray-600 rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white">

                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                        Cari
                    </button>

                    @if (request('search'))
                        <a href="{{ route('dokumen-kapal.index', ['status' => request('status')]) }}"
                            class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition">
                            Reset
                        </a>
                    @endif
                </form>
            </x-slot>

            {{-- FILTER --}}
            <x-slot name="filters">
                <div class="flex gap-2 flex-wrap">

                    <a href="{{ route('dokumen-kapal.index', [
                        'search' => request('search'),
                    ]) }}"
                        class="px-3 py-2 rounded-lg text-sm transition
                        {{ request('status') == null ? 'bg-gray-500 text-white' : 'bg-gray-200 dark:bg-gray-700 dark:text-white' }}">
                        Semua
                    </a>

                    <a href="{{ route('dokumen-kapal.index', [
                        'status' => 'expired',
                        'search' => request('search'),
                    ]) }}"
                        class="px-3 py-2 rounded-lg text-sm text-white transition
                        {{ request('status') == 'expired' ? 'bg-red-700' : 'bg-red-500 hover:bg-red-600' }}">
                        Expired
                    </a>

                    <a href="{{ route('dokumen-kapal.index', [
                        'status' => 'warning',
                        'search' => request('search'),
                    ]) }}"
                        class="px-3 py-2 rounded-lg text-sm transition
                        {{ request('status') == 'warning' ? 'bg-yellow-700 text-white' : 'bg-yellow-400 text-black hover:bg-yellow-500' }}">
                        Warning
                    </a>

                    <a href="{{ route('dokumen-kapal.index', [
                        'status' => 'aktif',
                        'search' => request('search'),
                    ]) }}"
                        class="px-3 py-2 rounded-lg text-sm text-white transition
                        {{ request('status') == 'aktif' ? 'bg-green-700' : 'bg-green-500 hover:bg-green-600' }}">
                        Aktif
                    </a>

                </div>
            </x-slot>

            {{-- ACTION --}}
            <x-slot name="actions">
                <a href="{{ route('dokumen-kapal.create') }}"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                    + Tambah Dokumen
                </a>
            </x-slot>

            {{-- TABLE HEADER --}}
            <x-slot name="columns">
                <x-table-column>Kapal</x-table-column>
                <x-table-column>Jenis Dokumen</x-table-column>
                <x-table-column>Nomor</x-table-column>
                <x-table-column>Expired</x-table-column>
                <x-table-column>File</x-table-column>
                <x-table-column>Status</x-table-column>
                <x-table-column>Sisa Hari</x-table-column>
                <x-table-column class="text-center w-28">Aksi</x-table-column>
            </x-slot>

            {{-- TABLE ROWS --}}
            <x-slot name="rows">
                @forelse ($dokumens as $d)
                    <x-table-row>

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
                            {{ \Carbon\Carbon::parse($d->tanggal_expired)->format('d M Y') }}
                        </x-table-cell>

                        <x-table-cell>
                            @if ($d->file)
                                <a href="{{ asset('storage/' . $d->file) }}" target="_blank"
                                    class="text-blue-500 hover:underline">
                                    Lihat
                                </a>
                            @else
                                -
                            @endif
                        </x-table-cell>

                        <x-table-cell>
                            <x-status-badge :status="$d->status">
                                {{ ucfirst($d->status) }}
                            </x-status-badge>
                        </x-table-cell>

                        <x-table-cell>
                            {{ $d->sisa_hari }} hari
                        </x-table-cell>

                        <x-table-cell class="text-center">
                            <div class="flex justify-center items-center gap-1.5">
                                <a href="{{ route('dokumen-kapal.edit', $d->id) }}"
                                    class="text-amber-500 hover:text-amber-700 dark:text-amber-400 dark:hover:text-amber-300 p-1.5 rounded transition"
                                    title="Edit">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </a>

                                <form action="{{ route('dokumen-kapal.destroy', $d->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus dokumen ini?')" class="inline-flex">
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
                        <td colspan="7" class="px-6 py-6 text-center text-gray-500">
                            Tidak ada data dokumen.
                        </td>
                    </x-table-row>
                @endforelse
            </x-slot>

        </x-data-table>

    </div>
</x-layouts.app>

