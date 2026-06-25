<x-layouts.app>
    <div class="p-6">

        <x-form.card title="Edit Pengguna" subtitle="Perbarui data akun pengguna dan hak aksesnya">

            <form action="{{ route('user.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <x-form.input label="Nama Lengkap" name="name" placeholder="Masukkan nama lengkap..." required value="{{ old('name', $user->name) }}" />

                <x-form.input label="Alamat Email" name="email" type="email" placeholder="Masukkan alamat email..." required value="{{ old('email', $user->email) }}" />

                <div class="bg-gray-50 dark:bg-gray-800/50 p-4 rounded-lg border border-gray-200 dark:border-gray-700">
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4">
                        <i class="fa-solid fa-circle-info mr-1"></i>
                        Isi kolom di bawah ini hanya jika Anda ingin mengubah kata sandi pengguna ini. Jika tidak, biarkan kosong.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <x-form.input label="Kata Sandi Baru" name="password" type="password" placeholder="Masukkan kata sandi baru..." />
                        <x-form.input label="Konfirmasi Kata Sandi Baru" name="password_confirmation" type="password" placeholder="Ulangi kata sandi baru..." />
                    </div>
                </div>

                <x-form.select label="Peran / Role" name="role" required>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="manajemen" {{ old('role', $user->role) == 'manajemen' ? 'selected' : '' }}>Manajemen</option>
                </x-form.select>

                <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('user.index') }}"
                        class="px-4 py-2 rounded-lg bg-gray-500 hover:bg-gray-600 text-white transition">
                        Batal
                    </a>

                    <button type="submit" class="px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 text-white transition">
                        Perbarui
                    </button>
                </div>

            </form>

        </x-form.card>

    </div>
</x-layouts.app>
