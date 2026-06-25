<x-layouts.app>
    <div class="p-6">

        <x-form.card title="Tambah Operator" subtitle="Tambahkan data operator kapal">

            <form action="{{ route('operator.store') }}" method="POST" class="space-y-6">

                @csrf

                <x-form.input label="Nama Operator" name="nama" required />

                <x-form.textarea label="Alamat" name="alamat" placeholder="Masukkan alamat operator" />

                <x-form.input label="Telepon" name="telepon" placeholder="Contoh: 08123456789" />

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">

                    <a href="{{ route('operator.index') }}"
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

