<x-layouts.app>
    <div class="p-6">

        <x-form.card title="Edit Klasifikasi" subtitle="Perbarui data badan klasifikasi kapal">

            <form action="{{ route('klasifikasi.update', $klasifikasi->id) }}" method="POST" class="space-y-6">

                @csrf
                @method('PUT')

                <x-form.input label="Nama Klasifikasi" name="nama" :value="$klasifikasi->nama" required />

                <x-form.input label="Negara" name="negara" :value="$klasifikasi->negara" />

                <x-form.textarea label="Keterangan"
                    name="keterangan">{{ old('keterangan', $klasifikasi->keterangan) }}</x-form.textarea>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">

                    <a href="{{ route('klasifikasi.index') }}"
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

