<x-layouts.app>
    <div class="p-6">

        <x-form.card title="Tambah Docking" subtitle="Tambahkan data aktivitas docking kapal">

            <form action="{{ route('docking.store') }}" method="POST" class="space-y-6">

                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- KAPAL --}}
                    <x-form.select label="Kapal" name="kapal_id" required>
                        <option value="">-- Pilih Kapal --</option>

                        @foreach ($kapals as $k)
                            <option value="{{ $k->id }}" {{ old('kapal_id') == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kapal }}
                            </option>
                        @endforeach
                    </x-form.select>

                    {{-- TANGGAL --}}
                    <x-form.input label="Tanggal Docking" name="tanggal_docking" type="date" required />

                    {{-- LOKASI --}}
                    <x-form.input label="Lokasi Docking" name="lokasi" placeholder="Contoh: PT Dok Kodja Bahari"
                        required />

                    {{-- JENIS --}}
                    <x-form.select label="Jenis Docking" name="jenis_docking" required>
                        <option value="">-- Pilih Jenis Docking --</option>
                        <option value="Routine" {{ old('jenis_docking') == 'Routine' ? 'selected' : '' }}>
                            Routine
                        </option>
                        <option value="Emergency" {{ old('jenis_docking') == 'Emergency' ? 'selected' : '' }}>
                            Emergency
                        </option>
                        <option value="Inspection" {{ old('jenis_docking') == 'Inspection' ? 'selected' : '' }}>
                            Inspection
                        </option>
                    </x-form.select>

                    {{-- STATUS --}}
                    <x-form.select label="Status" name="status" required>
                        <option value="planned" {{ old('status') == 'planned' ? 'selected' : '' }}>
                            Planned
                        </option>
                        <option value="ongoing" {{ old('status') == 'ongoing' ? 'selected' : '' }}>
                            Ongoing
                        </option>
                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>
                            Completed
                        </option>
                    </x-form.select>

                    {{-- CATATAN --}}
                    <div class="md:col-span-2">
                        <x-form.textarea label="Catatan" name="catatan" placeholder="Tambahkan catatan docking..." />
                    </div>

                </div>

                {{-- BUTTON --}}
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">

                    <a href="{{ route('docking.index') }}"
                        class="px-4 py-2 rounded-lg bg-gray-500 hover:bg-gray-600 text-white transition">
                        Batal
                    </a>

                    <button type="submit"
                        class="px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition">
                        Simpan
                    </button>

                </div>

            </form>

        </x-form.card>

    </div>
</x-layouts.app>

