<x-layouts.app>
    <div class="p-6">

        <h1 class="text-2xl font-bold mb-6">Dashboard Monitoring Kapal</h1>

        <!-- CARD -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">

            <!-- Total Kapal -->
            <div class="bg-white p-4 rounded shadow flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm">Total Kapal</p>
                    <p class="text-2xl font-bold">{{ $totalKapal }}</p>
                </div>
                <i class="fas fa-ship text-blue-500 text-2xl"></i>
            </div>

            <!-- Total Dokumen -->
            <div class="bg-white p-4 rounded shadow flex justify-between items-center">
                <div>
                    <p class="text-gray-500 text-sm">Total Dokumen</p>
                    <p class="text-2xl font-bold">{{ $totalDokumen }}</p>
                </div>
                <i class="fas fa-file text-gray-500 text-2xl"></i>
            </div>

            <!-- Expired -->
            <div class="bg-red-500 text-white p-4 rounded shadow flex justify-between items-center">
                <div>
                    <p class="text-sm">Expired</p>
                    <p class="text-2xl font-bold">{{ $expired }}</p>
                </div>
                <i class="fas fa-times-circle text-2xl"></i>
            </div>

            <!-- Warning -->
            <div class="bg-yellow-400 p-4 rounded shadow flex justify-between items-center">
                <div>
                    <p class="text-sm">Warning</p>
                    <p class="text-2xl font-bold">{{ $warning }}</p>
                </div>
                <i class="fas fa-exclamation-triangle text-2xl"></i>
            </div>

            <!-- Aktif -->
            <div class="bg-green-500 text-white p-4 rounded shadow flex justify-between items-center">
                <div>
                    <p class="text-sm">Aktif</p>
                    <p class="text-2xl font-bold">{{ $aktif }}</p>
                </div>
                <i class="fas fa-check-circle text-2xl"></i>
            </div>

        </div>

        <!-- TABLE DOKUMEN TERDEKAT -->
        <div class="mt-6 bg-white p-4 rounded shadow">
            <h2 class="text-lg font-bold mb-3">Dokumen Akan Expired</h2>

            <table class="w-full border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="p-2">Kapal</th>
                        <th class="p-2">Tanggal Expired</th>
                        <th class="p-2">Sisa Hari</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dokumenTerdekat as $d)
                        <tr class="border-t">
                            <td class="p-2">{{ $d->kapal->nama_kapal }}</td>
                            <td class="p-2">{{ $d->tanggal_expired }}</td>
                            <td class="p-2">
                                {{ $d->sisa_hari }} hari
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-layouts.app>

