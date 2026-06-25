<x-layouts.app>
    <div class="p-6">

        <x-form.card title="Tambah Pengguna" subtitle="Daftarkan akun pengguna baru ke dalam sistem">

            <form action="{{ route('user.store') }}" method="POST" class="space-y-6">
                @csrf

                <x-form.input label="Nama Lengkap" name="name" placeholder="Masukkan nama lengkap..." required value="{{ old('name') }}" />

                <x-form.input label="Alamat Email" name="email" type="email" placeholder="Masukkan alamat email..." required value="{{ old('email') }}" />

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <x-form.input label="Kata Sandi" name="password" type="password" placeholder="Masukkan kata sandi..." required />
                    <x-form.input label="Konfirmasi Kata Sandi" name="password_confirmation" type="password" placeholder="Ulangi kata sandi..." required />
                </div>

                <x-form.select label="Peran / Role" name="role" required>
                    <option value="" disabled selected>-- Pilih Peran --</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="manajemen" {{ old('role') == 'manajemen' ? 'selected' : '' }}>Manajemen</option>
                </x-form.select>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('user.index') }}"
                        class="px-4 py-2 rounded-lg bg-gray-500 hover:bg-gray-600 text-white transition">
                        Batal
                    </a>

                    <button type="submit" class="px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition">
                        Simpan
                    </button>
                </div>

            </form>

        </x-form.card>

    </div>
</x-layouts.app>
