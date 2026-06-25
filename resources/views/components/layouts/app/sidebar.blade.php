<aside :class="{ 'w-full md:w-64': sidebarOpen, 'w-0 md:w-16 hidden md:block': !sidebarOpen }"
    class="bg-sidebar text-sidebar-foreground border-r border-gray-200 dark:border-gray-700 sidebar-transition overflow-hidden">
    <!-- Sidebar Content -->
    <div class="h-full flex flex-col">
        <!-- Sidebar Menu -->
        <nav class="flex-1 overflow-y-auto custom-scrollbar py-4">
            <ul class="space-y-1 px-2">
                <!-- Dashboard -->
                <x-layouts.sidebar-link href="{{ route('dashboard') }}" icon='fas-house'
                    :active="request()->routeIs('dashboard*')">Dashboard</x-layouts.sidebar-link>

                @if (auth()->user()->isAdmin())
                    <!-- Label: DATA MASTER -->
                    <div x-show="sidebarOpen"
                        class="px-3 pt-5 pb-2 text-[10px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500">
                        Data Master
                    </div>
                    <div x-show="!sidebarOpen" class="border-t border-gray-200 dark:border-gray-700 my-4 mx-2"></div>

                    <x-layouts.sidebar-link href="{{ route('kapal.index') }}" icon='fas-ship' :active="request()->routeIs('kapal*')">Data
                        Kapal</x-layouts.sidebar-link>

                    <x-layouts.sidebar-link href="{{ route('tipe-kapal.index') }}" icon='fas-ferry'
                        :active="request()->routeIs('tipe-kapal*')">Tipe
                        Kapal</x-layouts.sidebar-link>

                    <x-layouts.sidebar-link href="{{ route('operator.index') }}" icon='fas-users' :active="request()->routeIs('operator*')">Data
                        Operator</x-layouts.sidebar-link>

                    <x-layouts.sidebar-link href="{{ route('pelabuhan.index') }}" icon='fas-anchor'
                        :active="request()->routeIs('pelabuhan*')">Data
                        Pelabuhan</x-layouts.sidebar-link>

                    <x-layouts.sidebar-link href="{{ route('area-pelayaran.index') }}" icon='fas-water'
                        :active="request()->routeIs('area-pelayaran*')">
                        Area Pelayaran
                    </x-layouts.sidebar-link>

                    <x-layouts.sidebar-link href="{{ route('jenis-dokumen.index') }}" icon='fas-list-check'
                        :active="request()->routeIs('jenis-dokumen*')">Data Jenis Dokumen</x-layouts.sidebar-link>

                    <x-layouts.sidebar-link href="{{ route('klasifikasi.index') }}" icon='fas-building'
                        :active="request()->routeIs('klasifikasi*')">
                        Klasifikasi
                    </x-layouts.sidebar-link>

                    <x-layouts.sidebar-link href="{{ route('user.index') }}" icon='fas-user-gear'
                        :active="request()->routeIs('user*')">
                        Manajemen Pengguna
                    </x-layouts.sidebar-link>

                    <!-- Label: OPERASIONAL -->
                    <div x-show="sidebarOpen"
                        class="px-3 pt-5 pb-2 text-[10px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500">
                        OPERASIONAL
                    </div>
                    <div x-show="!sidebarOpen" class="border-t border-gray-200 dark:border-gray-700 my-4 mx-2"></div>

                    <x-layouts.sidebar-link href="{{ route('dokumen-kapal.index') }}" icon='fas-file' :active="request()->routeIs('dokumen-kapal*')">
                        Dokumen Kapal</x-layouts.sidebar-link>

                    <x-layouts.sidebar-link href="{{ route('docking.index') }}" icon='fas-list-check' :active="request()->routeIs('docking*')">
                        Docking</x-layouts.sidebar-link>
                @endif

                <!-- Label: REPORT -->
                <div x-show="sidebarOpen"
                    class="px-3 pt-5 pb-2 text-[10px] font-bold uppercase tracking-widest text-gray-400 dark:text-gray-500">
                    REPORT
                </div>

                <div x-show="!sidebarOpen" class="border-t border-gray-200 dark:border-gray-700 my-4 mx-2">
                </div>

                <x-layouts.sidebar-two-level-link-parent title="Laporan" icon="fas-chart-line" :active="request()->routeIs('report.*')">

                    <x-layouts.sidebar-two-level-link href="{{ route('report.dokumen') }}" icon='fas-file'
                        :active="request()->routeIs('report.dokumen')">

                        Semua Dokumen

                    </x-layouts.sidebar-two-level-link>

                    <x-layouts.sidebar-two-level-link href="{{ route('report.expired') }}" icon='fas-times-circle'
                        :active="request()->routeIs('report.expired')">

                        Dokumen Expired

                    </x-layouts.sidebar-two-level-link>

                    <x-layouts.sidebar-two-level-link href="{{ route('report.warning') }}"
                        icon='fas-exclamation-triangle' :active="request()->routeIs('report.warning')">

                        Dokumen Warning

                    </x-layouts.sidebar-two-level-link>

                    <x-layouts.sidebar-two-level-link href="{{ route('report.kapal') }}" icon='fas-ship'
                        :active="request()->routeIs('report.kapal')">

                        Data Kapal

                    </x-layouts.sidebar-two-level-link>

                    <x-layouts.sidebar-two-level-link href="{{ route('report.operator') }}" icon='fas-users'
                        :active="request()->routeIs('report.operator')">

                        Data Operator

                    </x-layouts.sidebar-two-level-link>

                    <x-layouts.sidebar-two-level-link href="{{ route('report.pelabuhan') }}" icon='fas-anchor'
                        :active="request()->routeIs('report.pelabuhan')">

                        Data Pelabuhan

                    </x-layouts.sidebar-two-level-link>

                    <x-layouts.sidebar-two-level-link href="{{ route('report.statistik') }}" icon='fas-chart-pie'
                        :active="request()->routeIs('report.statistik')">

                        Statistik Armada

                    </x-layouts.sidebar-two-level-link>

                    <x-layouts.sidebar-two-level-link href="{{ route('report.per-kapal') }}" icon='fas-ship'
                        :active="request()->routeIs('report.per-kapal')">

                        Laporan Per Kapal

                    </x-layouts.sidebar-two-level-link>

                    <x-layouts.sidebar-two-level-link href="{{ route('report.docking') }}" icon='fas-ship'
                        :active="request()->routeIs('report.docking')">

                        Laporan Docking

                    </x-layouts.sidebar-two-level-link>

                </x-layouts.sidebar-two-level-link-parent>
            </ul>
        </nav>
    </div>
</aside>

