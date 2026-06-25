<x-layouts.app>
    <div class="p-6">

        <x-form.card title="Tambah Klasifikasi" subtitle="Tambahkan data badan klasifikasi kapal">

            <form action="{{ route('klasifikasi.store') }}" method="POST" class="space-y-6">

                @csrf

                <x-form.input label="Nama Klasifikasi" name="nama" required />

                <x-form.input label="Negara" name="negara" />

                <x-form.textarea label="Keterangan" name="keterangan" placeholder="Tambahkan keterangan..." />

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">

                    <a href="{{ route('klasifikasi.index') }}"
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

