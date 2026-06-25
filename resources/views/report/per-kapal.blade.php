<x-layouts.app>
    <div class="p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    Laporan Per Kapal
                    @if ($kapalDipilih)
                        - {{ $kapalDipilih->nama_kapal }}
                    @endif
                </h1>
                <p class="text-sm text-gray-500">
                    Periode laporan: {{ now()->translatedFormat('d F Y') }}
                </p>
                <p class="text-gray-500">
                    @if ($kapalDipilih)
                        Monitoring dokumen kapal {{ $kapalDipilih->nama_kapal }}
                    @else
                        Pilih kapal untuk melihat laporan
                    @endif
                </p>
            </div>

            @if ($kapalDipilih)
                <a href="{{ route('report.per-kapal.print', request()->query()) }}" target="_blank"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                    <i class="fa-solid fa-print mr-2"></i>
                    Cetak Laporan
                </a>
            @endif
        </div>

        <!-- FILTER -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 mb-4">
            <form method="GET" action="{{ route('report.per-kapal') }}">
                <div class="flex flex-col md:flex-row gap-4 items-end">
                    <div class="w-full md:w-1/3">
                        <label class="block mb-2 text-sm font-medium text-gray-700 dark:text-gray-300">
                            Pilih Kapal
                        </label>
                        <select name="kapal_id" class="w-full border rounded-lg px-3 py-2 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                            <option value="">-- Pilih Kapal --</option>
                            @foreach ($kapals as $k)
                                <option value="{{ $k->id }}" {{ request('kapal_id') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kapal }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
                        Tampilkan
                    </button>

                    <a href="{{ route('report.per-kapal') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-center">
                        Reset
                    </a>
                </div>
            </form>
        </div>

        @if ($kapalDipilih)
            <!-- SUMMARY STATS FOR SHIP -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-4">
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="text-sm text-gray-500">Total Dokumen</div>
                    <div class="text-3xl font-bold text-blue-500 mt-2">
                        {{ $dokumens->count() }}
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="text-sm text-gray-500">Aktif</div>
                    <div class="text-3xl font-bold text-green-500 mt-2">
                        {{ $dokumens->where('status', 'aktif')->count() }}
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="text-sm text-gray-500">Warning</div>
                    <div class="text-3xl font-bold text-yellow-500 mt-2">
                        {{ $dokumens->where('status', 'warning')->count() }}
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4">
                    <div class="text-sm text-gray-500">Expired</div>
                    <div class="text-3xl font-bold text-red-500 mt-2">
                        {{ $dokumens->where('status', 'expired')->count() }}
                    </div>
                </div>
            </div>

            <!-- TABLE -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-4 overflow-x-auto">
                <x-data-table :data="$dokumens">
                    <x-slot name="columns">
                        <x-table-column>No</x-table-column>
                        <x-table-column>Jenis Dokumen</x-table-column>
                        <x-table-column>Nomor Dokumen</x-table-column>
                        <x-table-column>Expired</x-table-column>
                        <x-table-column>Sisa Hari</x-table-column>
                        <x-table-column>Status</x-table-column>
                    </x-slot>

                    <x-slot name="rows">
                        @forelse ($dokumens as $d)
                            <x-table-row>
                                <x-table-cell>{{ $loop->iteration }}</x-table-cell>
                                <x-table-cell class="font-semibold text-gray-800 dark:text-white">
                                    {{ $d->jenisDokumen->nama }}
                                </x-table-cell>
                                <x-table-cell>{{ $d->nomor_dokumen }}</x-table-cell>
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
                                    Tidak ada data dokumen untuk kapal ini.
                                </td>
                            </x-table-row>
                        @endforelse
                    </x-slot>
                </x-data-table>
            </div>
        @else
            <!-- EMPTY STATE -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-8 text-center text-gray-500">
                <i class="fa-solid fa-ship text-4xl mb-3 text-gray-400"></i>
                <p class="font-semibold">Silakan pilih kapal terlebih dahulu untuk melihat laporan dokumen.</p>
            </div>
        @endif

    </div>
</x-layouts.app>
