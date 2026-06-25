<x-layouts.app>
    <div class="p-6">

        <x-form.card title="Edit Jenis Dokumen" subtitle="Perbarui master data jenis dokumen / sertifikat kapal">

            <form action="{{ route('jenis-dokumen.update', $jenisDokumen->id) }}" method="POST" class="space-y-6">

                @csrf
                @method('PUT')

                <x-form.input label="Nama Dokumen" name="nama" :value="$jenisDokumen->nama" required />

                <x-form.input label="Masa Berlaku (Bulan)" name="masa_berlaku" type="number" :value="$jenisDokumen->masa_berlaku"
                    required />

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">

                    <a href="{{ route('jenis-dokumen.index') }}"
                        class="px-4 py-2 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">
                        Batal
                    </a>

                    <button type="submit" class="px-4 py-2 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-white">
                        Update
                    </button>

                </div>

            </form>

        </x-form.card>

    </div>
</x-layouts.app>

