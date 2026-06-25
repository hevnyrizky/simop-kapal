<x-layouts.app>
    <div class="p-6">

        <x-form.card title="Edit Pelabuhan" subtitle="Perbarui data pelabuhan">

            <form action="{{ route('pelabuhan.update', $pelabuhan->id) }}" method="POST" class="space-y-6">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <x-form.input label="Nama Pelabuhan" name="nama" :value="$pelabuhan->nama" required />

                    <x-form.input label="Kode Pelabuhan" name="kode" :value="$pelabuhan->kode" />

                    <x-form.input label="Lokasi" name="lokasi" :value="$pelabuhan->lokasi" />

                    <div class="md:col-span-2">
                        <x-form.textarea label="Keterangan"
                            name="keterangan">{{ old('keterangan', $pelabuhan->keterangan) }}</x-form.textarea>
                    </div>

                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">

                    <a href="{{ route('pelabuhan.index') }}"
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

