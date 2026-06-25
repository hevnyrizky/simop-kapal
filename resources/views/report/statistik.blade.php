<x-layouts.app>
    <div class="p-6">

        <!-- HEADER -->
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-800 dark:text-white">
                    Statistik Armada
                </h1>
                <p class="text-sm text-gray-500">
                    Periode laporan: {{ now()->translatedFormat('d F Y') }}
                </p>
                <p class="text-gray-500 text-xs">
                    Ringkasan statistik monitoring armada kapal dan dokumen
                </p>
            </div>

            <a href="{{ route('report.statistik.print') }}" target="_blank"
                class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm">
                <i class="fa-solid fa-print mr-2"></i>
                Cetak Laporan
            </a>
        </div>

        <!-- STATS CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-5 gap-4 mb-6">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 border dark:border-gray-700 text-center">
                <h2 class="text-gray-400 text-xs font-semibold uppercase">Total Kapal</h2>
                <p class="text-3xl font-bold text-blue-500 mt-2">{{ $totalKapal }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 border dark:border-gray-700 text-center">
                <h2 class="text-gray-400 text-xs font-semibold uppercase">Total Dokumen</h2>
                <p class="text-3xl font-bold text-indigo-500 mt-2">{{ $totalDokumen }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 border dark:border-gray-700 text-center">
                <h2 class="text-gray-400 text-xs font-semibold uppercase">Dokumen Expired</h2>
                <p class="text-3xl font-bold text-red-500 mt-2">{{ $expired }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 border dark:border-gray-700 text-center">
                <h2 class="text-gray-400 text-xs font-semibold uppercase">Dokumen Warning</h2>
                <p class="text-3xl font-bold text-yellow-500 mt-2">{{ $warning }}</p>
            </div>

            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-5 border dark:border-gray-700 text-center">
                <h2 class="text-gray-400 text-xs font-semibold uppercase">Dokumen Aktif</h2>
                <p class="text-3xl font-bold text-green-500 mt-2">{{ $aktif }}</p>
            </div>
        </div>

        <!-- CHARTS SECTION -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
            <!-- Chart 1: Document Health (Pie) -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border dark:border-gray-700">
                <h3 class="text-sm font-bold text-gray-800 dark:text-gray-100 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-chart-pie text-indigo-500"></i>
                    Status Dokumen Kapal
                </h3>
                <div class="relative flex items-center justify-center" style="height: 240px;">
                    <canvas id="docStatusChart"></canvas>
                </div>
            </div>

            <!-- Chart 2: Ship Counts by Operator (Bar) -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border dark:border-gray-700">
                <h3 class="text-sm font-bold text-gray-800 dark:text-gray-100 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-users text-blue-500"></i>
                    Distribusi Armada per Operator
                </h3>
                <div class="relative" style="height: 240px;">
                    <canvas id="operatorChart"></canvas>
                </div>
            </div>
        </div>

        <!-- BREAKDOWNS TABLES -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Document Types Count -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border dark:border-gray-700">
                <h3 class="text-sm font-bold text-gray-800 dark:text-gray-100 mb-4 flex items-center gap-2">
                    <i class="fa-solid fa-file-lines text-teal-500"></i>
                    Distribusi Jenis Dokumen Terdaftar
                </h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400 text-xs uppercase">
                                <th class="p-3 border-b dark:border-gray-600">No</th>
                                <th class="p-3 border-b dark:border-gray-600">Jenis Dokumen</th>
                                <th class="p-3 border-b dark:border-gray-600 text-center">Masa Berlaku</th>
                                <th class="p-3 border-b dark:border-gray-600 text-center">Jumlah Dokumen</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                            @forelse($jenisDokumens as $jd)
                                <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/20">
                                    <td class="p-3">{{ $loop->iteration }}</td>
                                    <td class="p-3 font-semibold text-gray-800 dark:text-white">{{ $jd->nama }}</td>
                                    <td class="p-3 text-center">{{ $jd->masa_berlaku }} Bulan</td>
                                    <td class="p-3 text-center font-bold text-blue-500">{{ $jd->dokumen_kapal_count }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="p-4 text-center text-gray-400">Tidak ada data jenis dokumen</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Ports and Ship Types -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 border dark:border-gray-700 flex flex-col gap-6">
                <!-- Ports Count -->
                <div>
                    <h3 class="text-sm font-bold text-gray-800 dark:text-gray-100 mb-3 flex items-center gap-2">
                        <i class="fa-solid fa-anchor text-cyan-500"></i>
                        Distribusi Armada per Pelabuhan
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400 text-xs uppercase">
                                    <th class="p-2 border-b dark:border-gray-600">Nama Pelabuhan</th>
                                    <th class="p-2 border-b dark:border-gray-600">Lokasi</th>
                                    <th class="p-2 border-b dark:border-gray-600 text-center">Jumlah Kapal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                @forelse($pelabuhans as $p)
                                    <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/20">
                                        <td class="p-2 font-semibold text-gray-800 dark:text-white">{{ $p->nama }}</td>
                                        <td class="p-2">{{ $p->lokasi ?? '-' }}</td>
                                        <td class="p-2 text-center font-bold text-blue-500">{{ $p->kapals_count }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="p-2 text-center text-gray-400">Tidak ada data pelabuhan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Ship Types Count -->
                <div>
                    <h3 class="text-sm font-bold text-gray-800 dark:text-gray-100 mb-3 flex items-center gap-2">
                        <i class="fa-solid fa-ferry text-orange-500"></i>
                        Distribusi Armada per Tipe Kapal
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50 dark:bg-gray-700 text-gray-500 dark:text-gray-400 text-xs uppercase">
                                    <th class="p-2 border-b dark:border-gray-600">Tipe Kapal</th>
                                    <th class="p-2 border-b dark:border-gray-600 text-center">Jumlah Kapal</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                                @forelse($tipeKapals as $tk)
                                    <tr class="hover:bg-gray-50/50 dark:hover:bg-gray-700/20">
                                        <td class="p-2 font-semibold text-gray-800 dark:text-white">{{ $tk->nama }}</td>
                                        <td class="p-2 text-center font-bold text-blue-500">{{ $tk->kapals_count }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="p-2 text-center text-gray-400">Tidak ada data tipe kapal</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- CHART SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Chart 1: Document Status (Doughnut)
            const docCtx = document.getElementById('docStatusChart').getContext('2d');
            new Chart(docCtx, {
                type: 'pie',
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
                                color: document.documentElement.classList.contains('dark') ? '#d1d5db' : '#374151'
                            }
                        }
                    }
                }
            });

            // Chart 2: Ship Counts by Operator (Bar)
            const operatorCtx = document.getElementById('operatorChart').getContext('2d');
            const opLabels = [];
            const opCounts = [];
            
            @foreach($operators as $op)
                opLabels.push('{{ $op->nama }}');
                opCounts.push({{ $op->kapals_count }});
            @endforeach

            new Chart(operatorCtx, {
                type: 'bar',
                data: {
                    labels: opLabels,
                    datasets: [{
                        label: 'Jumlah Kapal',
                        data: opCounts,
                        backgroundColor: '#6366F1', // Indigo
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
