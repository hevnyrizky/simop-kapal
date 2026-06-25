<x-layouts.app>
    <div class="p-6">

        <x-form.card title="Edit Kapal" subtitle="Perbarui data armada kapal">

            <form action="{{ route('kapal.update', $kapal->id) }}" method="POST" class="space-y-6">

                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- NAMA --}}
                    <x-form.input label="Nama Kapal" name="nama_kapal" :value="$kapal->nama_kapal" required />

                    {{-- TIPE --}}
                    <x-form.select label="Tipe Kapal" name="tipe_kapal_id" required>
                        <option value="">-- Pilih Tipe Kapal --</option>

                        @foreach ($tipeKapal as $t)
                            <option value="{{ $t->id }}"
                                {{ old('tipe_kapal_id', $kapal->tipe_kapal_id) == $t->id ? 'selected' : '' }}>
                                {{ $t->nama }}
                            </option>
                        @endforeach
                    </x-form.select>

                    {{-- OPERATOR --}}
                    <x-form.select label="Operator" name="operator_id">
                        <option value="">-- Pilih Operator --</option>

                        @foreach ($operators as $op)
                            <option value="{{ $op->id }}"
                                {{ old('operator_id', $kapal->operator_id) == $op->id ? 'selected' : '' }}>
                                {{ $op->nama }}
                            </option>
                        @endforeach
                    </x-form.select>

                    {{-- PELABUHAN --}}
                    <x-form.select label="Pelabuhan" name="pelabuhan_id">
                        <option value="">-- Pilih Pelabuhan --</option>

                        @foreach ($pelabuhans as $p)
                            <option value="{{ $p->id }}"
                                {{ old('pelabuhan_id', $kapal->pelabuhan_id) == $p->id ? 'selected' : '' }}>
                                {{ $p->nama }}
                            </option>
                        @endforeach
                    </x-form.select>

                    {{-- AREA --}}
                    <x-form.select label="Area Pelayaran" name="area_pelayaran_id">
                        <option value="">-- Pilih Area Pelayaran --</option>

                        @foreach ($areas as $a)
                            <option value="{{ $a->id }}"
                                {{ old('area_pelayaran_id', $kapal->area_pelayaran_id) == $a->id ? 'selected' : '' }}>
                                {{ $a->nama }}
                            </option>
                        @endforeach
                    </x-form.select>

                    {{-- KLASIFIKASI --}}
                    <x-form.select label="Klasifikasi" name="klasifikasi_id">
                        <option value="">-- Pilih Klasifikasi --</option>

                        @foreach ($klasifikasis as $k)
                            <option value="{{ $k->id }}"
                                {{ old('klasifikasi_id', $kapal->klasifikasi_id) == $k->id ? 'selected' : '' }}>
                                {{ $k->nama }}
                            </option>
                        @endforeach
                    </x-form.select>

                    {{-- CALL SIGN --}}
                    <x-form.input label="Call Sign" name="call_sign" :value="$kapal->call_sign" />

                    {{-- IMO --}}
                    <x-form.input label="Nomor IMO" name="no_imo" :value="$kapal->no_imo" />

                </div>

                {{-- BUTTON --}}
                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">

                    <a href="{{ route('kapal.index') }}"
                        class="px-4 py-2 rounded-lg bg-gray-500 hover:bg-gray-600 text-white transition">
                        Batal
                    </a>

                    <button type="submit"
                        class="px-4 py-2 rounded-lg bg-yellow-500 hover:bg-yellow-600 text-white transition">
                        Update
                    </button>

                </div>

            </form>

        </x-form.card>

    </div>
</x-layouts.app>

