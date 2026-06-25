<x-layouts.app>
    <div class="mb-6">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
                    Dashboard Monitoring Kapal
                </h1>
                <p class="text-gray-600 dark:text-gray-400 mt-1">
                    Sistem Informasi Monitoring Dokumen & Operasional Armada Kapal
                </p>
            </div>
            <div class="mt-4 md:mt-0 text-sm text-gray-500 bg-white dark:bg-gray-800 px-4 py-2 rounded-lg shadow-sm border dark:border-gray-700">
                <i class="fa-solid fa-calendar mr-2 text-blue-500"></i>
                Hari ini: <span class="font-semibold">{{ now()->translatedFormat('l, d F Y') }}</span>
            </div>
        </div>
    </div>

    <!-- QUICK ACTIONS PANEL -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 border border-gray-200 dark:border-gray-700 mb-6">
        <h2 class="text-xs font-bold uppercase tracking-wider text-gray-400 dark:text-gray-500 mb-3">
            Akses Cepat (Quick Actions)
        </h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('kapal.create') }}" class="flex items-center gap-3 p-3 rounded-lg border border-blue-100 dark:border-blue-900 bg-blue-50/50 dark:bg-blue-950/20 hover:bg-blue-50 dark:hover:bg-blue-950/40 transition">
                <div class="bg-blue-500 text-white p-2 rounded-lg">
                    <i class="fa-solid fa-ship"></i>
                </div>
                <div>
                    <div class="font-semibold text-sm text-gray-800 dark:text-white">Tambah Kapal</div>
                    <div class="text-[10px] text-gray-500">Registrasi armada baru</div>
                </div>
            </a>

            <a href="{{ route('dokumen-kapal.create') }}" class="flex items-center gap-3 p-3 rounded-lg border border-purple-100 dark:border-purple-900 bg-purple-50/50 dark:bg-purple-950/20 hover:bg-purple-50 dark:hover:bg-purple-950/40 transition">
                <div class="bg-purple-500 text-white p-2 rounded-lg">
                    <i class="fa-solid fa-file-circle-plus"></i>
                </div>
                <div>
                    <div class="font-semibold text-sm text-gray-800 dark:text-white">Input Dokumen</div>
                    <div class="text-[10px] text-gray-500">Unggah dokumen kapal</div>
                </div>
            </a>

            <a href="{{ route('docking.create') }}" class="flex items-center gap-3 p-3 rounded-lg border border-cyan-100 dark:border-cyan-900 bg-cyan-50/50 dark:bg-cyan-950/20 hover:bg-cyan-50 dark:hover:bg-cyan-950/40 transition">
                <div class="bg-cyan-500 text-white p-2 rounded-lg">
                    <i class="fa-solid fa-anchor"></i>
                </div>
                <div>
                    <div class="font-semibold text-sm text-gray-800 dark:text-white">Jadwal Docking</div>
                    <div class="text-[10px] text-gray-500">Input rencana docking</div>
                </div>
            </a>

            <a href="{{ route('report.statistik') }}" class="flex items-center gap-3 p-3 rounded-lg border border-emerald-100 dark:border-emerald-900 bg-emerald-50/50 dark:bg-emerald-950/20 hover:bg-emerald-50 dark:hover:bg-emerald-950/40 transition">
                <div class="bg-emerald-500 text-white p-2 rounded-lg">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <div>
                    <div class="font-semibold text-sm text-gray-800 dark:text-white">Laporan Cetak</div>
                    <div class="text-[10px] text-gray-500">Cetak laporan statistik</div>
                </div>
            </a>
        </div>
    </div>

    <!-- STATS GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- TOTAL KAPAL -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-5 border border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">Total Kapal</p>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">{{ $totalKapal }}</h3>
                <a href="{{ route('report.kapal') }}" class="text-xs text-blue-500 hover:underline mt-2 inline-block">Lihat Detail &rarr;</a>
            </div>
            <div class="bg-blue-50 dark:bg-blue-900/50 p-4 rounded-xl text-blue-500 dark:text-blue-400">
                <i class="fa-solid fa-ship text-2xl"></i>
            </div>
        </div>

        <!-- TOTAL DOKUMEN -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-5 border border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">Total Dokumen</p>
                <h3 class="text-2xl font-bold text-gray-800 dark:text-gray-100 mt-1">{{ $totalDokumen }}</h3>
                <a href="{{ route('report.dokumen') }}" class="text-xs text-blue-500 hover:underline mt-2 inline-block">Lihat Detail &rarr;</a>
            </div>
            <div class="bg-indigo-50 dark:bg-indigo-900/50 p-4 rounded-xl text-indigo-500 dark:text-indigo-400">
                <i class="fa-solid fa-file-invoice text-2xl"></i>
            </div>
        </div>

        <!-- ACTIVE DOCKINGS -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-5 border border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">Docking Aktif</p>
                <h3 class="text-2xl font-bold text-cyan-600 dark:text-cyan-400 mt-1">{{ $totalActiveDocking }}</h3>
                <a href="{{ route('report.docking') }}" class="text-xs text-cyan-500 hover:underline mt-2 inline-block">Lihat Jadwal &rarr;</a>
            </div>
            <div class="bg-cyan-50 dark:bg-cyan-900/50 p-4 rounded-xl text-cyan-500 dark:text-cyan-400">
                <i class="fa-solid fa-wrench text-2xl"></i>
            </div>
        </div>

        <!-- EXPIRED DOCUMENTS -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-5 border border-gray-200 dark:border-gray-700 flex items-center justify-between">
            <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-gray-400 dark:text-gray-500">Dokumen Expired</p>
                <h3 class="text-2xl font-bold text-red-500 mt-1">{{ $expired }}</h3>
                <a href="{{ route('report.expired') }}" class="text-xs text-red-500 hover:underline mt-2 inline-block">Segera Perbarui &rarr;</a>
            </div>
            <div class="bg-red-50 dark:bg-red-900/50 p-4 rounded-xl text-red-500 dark:text-red-400">
                <i class="fa-solid fa-triangle-exclamation text-2xl"></i>
            </div>
        </div>
    </div>

    <!-- SECONDARY STATS (Warning, Operator, Pelabuhan) -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 border border-gray-200 dark:border-gray-700 flex items-center gap-4">
            <div class="bg-yellow-50 dark:bg-yellow-900/30 text-yellow-500 p-3 rounded-lg">
                <i class="fa-solid fa-hourglass-half text-lg"></i>
            </div>
            <div>
                <p class="text-[11px] font-semibold uppercase text-gray-400">Dokumen Warning (&le; 30 Hari)</p>
                <p class="text-lg font-bold text-gray-800 dark:text-white">{{ $warning }}</p>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 border border-gray-200 dark:border-gray-700 flex items-center gap-4">
            <div class="bg-orange-50 dark:bg-orange-900/30 text-orange-500 p-3 rounded-lg">
                <i class="fa-solid fa-users text-lg"></i>
            </div>
            <div>
                <p class="text-[11px] font-semibold uppercase text-gray-400">Data Operator</p>
                <p class="text-lg font-bold text-gray-800 dark:text-white">{{ $totalOperator }}</p>
            </div>
        </div>

        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 border border-gray-200 dark:border-gray-700 flex items-center gap-4">
            <div class="bg-emerald-50 dark:bg-emerald-900/30 text-emerald-500 p-3 rounded-lg">
                <i class="fa-solid fa-anchor text-lg"></i>
            </div>
            <div>
                <p class="text-[11px] font-semibold uppercase text-gray-400">Data Pelabuhan</p>
                <p class="text-lg font-bold text-gray-800 dark:text-white">{{ $totalPelabuhan }}</p>
            </div>
        </div>
    </div>

    <!-- CHARTS SECTION -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <!-- Chart 1: Document Status -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700 lg:col-span-1">
            <h3 class="text-base font-bold text-gray-800 dark:text-gray-100 mb-4 flex items-center gap-2">
                <i class="fa-solid fa-chart-pie text-indigo-500"></i>
                Status Dokumen Kapal
            </h3>
            <div class="relative flex items-center justify-center" style="height: 240px;">
                <canvas id="docStatusChart"></canvas>
            </div>
        </div>

        <!-- Chart 2: Ship Types Distribution -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700 lg:col-span-2">
            <h3 class="text-base font-bold text-gray-800 dark:text-gray-100 mb-4 flex items-center gap-2">
                <i class="fa-solid fa-chart-simple text-blue-500"></i>
                Distribusi Tipe Kapal
            </h3>
            <div class="relative" style="height: 240px;">
                <canvas id="shipTypesChart"></canvas>
            </div>
        </div>
    </div>

    <!-- DUAL TABLES (DOKUMEN EXPIRED & DOCKING TERDEKAT) -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- TABLE DOKUMEN AKAN EXPIRED -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700 flex flex-col h-full">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-base font-bold text-gray-800 dark:text-gray-100 flex items-center gap-2">
                    <i class="fa-solid fa-clock-rotate-left text-yellow-500"></i>
                    Dokumen Mendekati Kadaluarsa
                </h2>
                <a href="{{ route('report.dokumen') }}" class="text-xs text-blue-500 hover:underline flex items-center gap-1">
                    Lihat Semua
                    <i class="fa-solid fa-chevron-right text-[9px]"></i>
                </a>
            </div>

            <div class="overflow-x-auto flex-1">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 text-left text-xs uppercase tracking-wider">
                            <th class="p-3 font-semibold">Kapal</th>
                            <th class="p-3 font-semibold">Jenis Dokumen</th>
                            <th class="p-3 font-semibold">Expired</th>
                            <th class="p-3 font-semibold">Sisa Hari</th>
                            <th class="p-3 font-semibold text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-sm">
                        @forelse($dokumenTerdekat as $d)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/20">
                                <td class="p-3 font-medium text-gray-800 dark:text-white">
                                    {{ $d->kapal->nama_kapal }}
                                </td>
                                <td class="p-3 text-gray-600 dark:text-gray-300">
                                    {{ $d->jenisDokumen->nama }}
                                </td>
                                <td class="p-3 text-gray-500 dark:text-gray-400">
                                    {{ \Carbon\Carbon::parse($d->tanggal_expired)->translatedFormat('d F Y') }}
                                </td>
                                <td class="p-3">
                                    @if ($d->sisa_hari < 0)
                                        <span class="text-red-500 font-bold">
                                            {{ abs($d->sisa_hari) }} hari lewat
                                        </span>
                                    @else
                                        <span class="font-semibold {{ $d->sisa_hari <= 30 ? 'text-yellow-500' : 'text-green-500' }}">
                                            {{ $d->sisa_hari }} hari
                                        </span>
                                    @endif
                                </td>
                                <td class="p-3 text-center">
                                    <x-status-badge :status="$d->status">
                                        {{ ucfirst($d->status) }}
                                    </x-status-badge>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500">
                                    Tidak ada data dokumen terdekat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- TABLE SCHEDULE DOCKING TERDEKAT -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 border border-gray-200 dark:border-gray-700 flex flex-col h-full">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-base font-bold text-gray-800 dark:text-gray-100 flex items-center gap-2">
                    <i class="fa-solid fa-wrench text-cyan-500"></i>
                    Jadwal & Riwayat Docking Terdekat
                </h2>
                <a href="{{ route('report.docking') }}" class="text-xs text-blue-500 hover:underline flex items-center gap-1">
                    Lihat Semua
                    <i class="fa-solid fa-chevron-right text-[9px]"></i>
                </a>
            </div>

            <div class="overflow-x-auto flex-1">
                <table class="w-full border-collapse">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-gray-700/50 text-gray-500 dark:text-gray-400 text-left text-xs uppercase tracking-wider">
                            <th class="p-3 font-semibold">Kapal</th>
                            <th class="p-3 font-semibold">Tanggal Docking</th>
                            <th class="p-3 font-semibold">Lokasi</th>
                            <th class="p-3 font-semibold">Jenis</th>
                            <th class="p-3 font-semibold text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700 text-sm">
                        @forelse($upcomingDockings as $ud)
                            <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/20">
                                <td class="p-3 font-medium text-gray-800 dark:text-white">
                                    {{ $ud->kapal->nama_kapal }}
                                </td>
                                <td class="p-3 text-gray-600 dark:text-gray-300">
                                    {{ \Carbon\Carbon::parse($ud->tanggal_docking)->translatedFormat('d F Y') }}
                                </td>
                                <td class="p-3 text-gray-500 dark:text-gray-400">
                                    {{ $ud->lokasi }}
                                </td>
                                <td class="p-3 text-gray-500 dark:text-gray-400">
                                    {{ $ud->jenis_docking }}
                                </td>
                                <td class="p-3 text-center">
                                    <x-status-badge :status="$ud->status">
                                        {{ ucfirst($ud->status) }}
                                    </x-status-badge>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="p-8 text-center text-gray-500">
                                    Tidak ada jadwal docking aktif terdekat.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- CHART SCRIPT INTEGRATION -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chart 1: Document Status (Doughnut)
            const docCtx = document.getElementById('docStatusChart').getContext('2d');
            new Chart(docCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Aktif', 'Warning', 'Expired'],
                    datasets: [{
                        data: [{{ $aktif }}, {{ $warning }}, {{ $expired }}],
                        backgroundColor: [
                            '#10B981', // Green
                            '#F59E0B', // Yellow
                            '#EF4444'  // Red
                        ],
                        borderWidth: 2,
                        borderColor: document.documentElement.classList.contains('dark') ? '#1f2937' : '#ffffff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: document.documentElement.classList.contains('dark') ? '#d1d5db' : '#374151',
                                font: {
                                    size: 11
                                }
                            }
                        }
                    },
                    cutout: '65%'
                }
            });

            // Chart 2: Ship Types Distribution (Bar Chart)
            const shipCtx = document.getElementById('shipTypesChart').getContext('2d');
            
            const tipeLabels = [];
            const tipeCounts = [];
            
            @foreach($tipeKapals as $tk)
                tipeLabels.push('{{ $tk->nama }}');
                tipeCounts.push({{ $tk->kapals_count }});
            @endforeach

            new Chart(shipCtx, {
                type: 'bar',
                data: {
                    labels: tipeLabels,
                    datasets: [{
                        label: 'Jumlah Kapal',
                        data: tipeCounts,
                        backgroundColor: '#3B82F6', // Blue
                        borderRadius: 6,
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                color: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280'
                            },
                            grid: {
                                color: document.documentElement.classList.contains('dark') ? '#374151' : '#e5e7eb'
                            }
                        },
                        x: {
                            ticks: {
                                color: document.documentElement.classList.contains('dark') ? '#9ca3af' : '#6b7280'
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        });
    </script>
</x-layouts.app>
