<x-layouts.app>
    <div class="p-6">

        <x-form.card title="Edit Area Pelayaran" subtitle="Perbarui data area operasional">

            <form action="{{ route('area-pelayaran.update', $areaPelayaran->id) }}" method="POST" class="space-y-6">

                @csrf
                @method('PUT')

                <x-form.input label="Nama Area" name="nama" :value="$areaPelayaran->nama" required />

                <x-form.textarea label="Keterangan"
                    name="keterangan">{{ old('keterangan', $areaPelayaran->keterangan) }}</x-form.textarea>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">

                    <a href="{{ route('area-pelayaran.index') }}"
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

