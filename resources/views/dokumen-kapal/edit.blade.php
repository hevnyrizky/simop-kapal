<x-layouts.app>
    <div class="p-6">

        <x-form.card title="Edit Dokumen Kapal" subtitle="Perbarui data dokumen kapal">

            <form action="{{ route('dokumen-kapal.update', $dokumenKapal->id) }}" method="POST"
                enctype="multipart/form-data" class="space-y-6">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <x-form.select label="Kapal" name="kapal_id" required>
                        <option value="">-- Pilih Kapal --</option>

                        @foreach ($kapals as $k)
                            <option value="{{ $k->id }}"
                                {{ old('kapal_id', $dokumenKapal->kapal_id) == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kapal }}
                            </option>
                        @endforeach
                    </x-form.select>

                    <x-form.select label="Jenis Dokumen" name="jenis_dokumen_id" required>
                        <option value="">-- Pilih Jenis Dokumen --</option>

                        @foreach ($jenisDokumens as $d)
                            <option value="{{ $d->id }}"
                                {{ old('jenis_dokumen_id', $dokumenKapal->jenis_dokumen_id) == $d->id ? 'selected' : '' }}>
                                {{ $d->nama }}
                            </option>
                        @endforeach
                    </x-form.select>

                    <x-form.input label="Nomor Dokumen" name="nomor_dokumen" :value="$dokumenKapal->nomor_dokumen" required />

                    <x-form.input label="Tanggal Terbit" name="tanggal_terbit" type="date" :value="$dokumenKapal->tanggal_terbit"
                        required />

                    <x-form.input label="Tanggal Expired" name="tanggal_expired" type="date" :value="$dokumenKapal->tanggal_expired"
                        required />

                    <div>
                        <x-form.file label="Upload Dokumen Baru" name="file" />

                        @if ($dokumenKapal->file)
                            <p class="mt-2 text-sm text-gray-500">
                                File saat ini:
                                <a href="{{ asset('storage/' . $dokumenKapal->file) }}" target="_blank"
                                    class="text-blue-500 hover:underline">
                                    Lihat File
                                </a>
                            </p>
                        @endif
                    </div>

                </div>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">

                    <a href="{{ route('dokumen-kapal.index') }}"
                        class="px-4 py-2 rounded-lg bg-gray-500 hover:bg-gray-600 text-white transition">
                        Batal
                    </a>

                    <button type="submit"
                        class="px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition">
                        Update
                    </button>

                </div>

            </form>

        </x-form.card>

    </div>
</x-layouts.app>

