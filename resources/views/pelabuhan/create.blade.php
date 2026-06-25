<x-layouts.app>
    <div class="p-6">

        <x-form.card title="Tambah Pelabuhan" subtitle="Tambahkan data pelabuhan">

            <form action="{{ route('pelabuhan.store') }}" method="POST" class="space-y-6">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <x-form.input label="Nama Pelabuhan" name="nama" required />

                    <x-form.input label="Kode Pelabuhan" name="kode" placeholder="Contoh: BJM" />

                    <x-form.input label="Lokasi" name="lokasi" placeholder="Contoh: Banjarmasin" />

                    <div class="md:col-span-2">
                        <x-form.textarea label="Keterangan" name="keterangan" placeholder="Tambahkan keterangan..." />
                    </div>

                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">

                    <a href="{{ route('pelabuhan.index') }}"
                        class="px-4 py-2 rounded-lg bg-gray-500 hover:bg-gray-600 text-white">
                        Batal
                    </a>

                    <button type="submit" class="px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white">
                        Simpan
                    </button>

                </div>

            </form>

        </x-form.card>

    </div>
</x-layouts.app>

