# 📄 DAFTAR FITUR DAN STATUS IMPLEMENTASI SISTEM
## SISTEM INFORMASI MONITORING DOKUMEN DAN OPERASIONAL ARMADA KAPAL (SIMOP-KAPAL)
### PT RIMAU BAHTERA SHIPPING

Dokumen ini mencatat seluruh modul, fitur, dan fungsionalitas yang **telah selesai dikembangkan** dan berjalan secara fungsional pada sistem SIMOP-KAPAL saat ini. Informasi ini dapat digunakan sebagai referensi utama untuk penulisan **Bab IV (Implementasi dan Pembahasan)** pada Laporan Skripsi.

---

## 🧭 RINGKASAN STATUS PROYEK
*   **Framework Utama**: Laravel 11 / Laravel 12 (PHP 8.2+)
*   **Frontend**: Blade Templates, Tailwind CSS, FontAwesome 6 Icons
*   **Database**: MySQL (Eloquent ORM)
*   **Library Tambahan**: Chart.js (Grafik Analitik)
*   **Status Keseluruhan**: **100% Selesai (Feature Complete untuk MVP Skripsi)**

---

## 🛠️ DAFTAR MODUL & FITUR YANG TELAH DIKERJAKAN

### 1. Modul Autentikasi & Manajemen Pengguna (Security, Auth & User Management)
Modul ini menangani keamanan sistem, pembatasan hak akses pengguna, serta pengelolaan akun pengguna.
*   **Fitur Login & Logout**: Sesi terenkripsi menggunakan sistem autentikasi bawaan Laravel.
*   **Pendaftaran Pengguna Tertutup (Closed Registration)**: Registrasi publik mandiri dinonaktifkan demi keamanan data internal. Akun pengguna hanya dapat dibuat secara eksklusif oleh Admin.
*   **Manajemen Pengguna (User CRUD)**:
    *   Halaman khusus bagi Admin untuk melihat daftar pengguna, mencari akun berdasarkan nama/email, membuat pengguna baru, memperbarui data pengguna (nama, email, role), dan menghapus pengguna.
    *   Dilengkapi proteksi keamanan agar Admin yang aktif tidak dapat menghapus akunnya sendiri secara tidak sengaja.
*   **Pembatasan Hak Akses (Middleware & Multi-role)**:
    *   `Admin`: Memiliki akses penuh terhadap modul Master Data, Manajemen Pengguna, Input Dokumen, Input Docking, Dashboard, dan Cetak Laporan.
    *   `Manajemen`: Memiliki akses eksklusif hanya terhadap Dashboard, Unduh Dokumen, dan Cetak Laporan (seluruh menu input master, operasional, dan pengelolaan user disembunyikan dari sidebar).
*   **Pengaturan Profil & Keamanan**:
    *   Pembaruan nama dan alamat email.
    *   Fitur ubah kata sandi dengan validasi keamanan.
    *   Penghapusan akun (jika diperlukan).
*   **Preferensi Tampilan (Appearance)**:
    *   Fitur penggantian tema tampilan (**Tema Gelap / Dark Mode** dan **Tema Terang / Light Mode**) yang disimpan di profil database masing-masing pengguna.

### 2. Modul Master Data (CRUD & Relasi Database)
Modul ini merupakan modul fondasi sistem. Seluruh data master dikelola secara dinamis dari database (bukan hardcoded).
*   **Master Kapal**:
    *   CRUD lengkap (Tambah, Lihat, Edit, Hapus data kapal).
    *   Kolom: Nama Kapal, Call Sign, IMO Number.
    *   Relasi dinamis ke: Tipe Kapal, Operator, Pelabuhan, Area Pelayaran, Klasifikasi.
*   **Master Tipe Kapal**: Mengelompokkan jenis armada (misal: Tugboat, Barge, Self Propelled Barge).
*   **Master Operator**: Pengelolaan data operator/agen pelayaran yang mengoperasikan kapal.
*   **Master Pelabuhan**: Pengelolaan pelabuhan pangkalan (*Home Port*) beserta kode unik pelabuhan.
*   **Master Area Pelayaran**: Kategori wilayah jangkauan kapal (misal: Domestik, A1, A2, A3).
*   **Master Klasifikasi**: Pengelolaan badan klasifikasi registrasi kapal (misal: BKI - Biro Klasifikasi Indonesia, Nippon Kaiji Kyokai, dll).
*   **Master Jenis Dokumen**: Kategori dokumen hukum kapal (misal: Sertifikat Garis Muat, Surat Laut, Keselamatan Konstruksi).

### 3. Modul Manajemen Dokumen Kapal (Core Feature)
Fitur utama untuk memantau kelayakan dokumen hukum kapal secara legalitas.
*   **CRUD Dokumen Lengkap**: Tambah, Lihat, Edit, dan Hapus Dokumen Kapal. Sistem secara otomatis menghapus berkas scan PDF fisik dari server ketika record dokumen terkait dihapus dari database.
*   **Input Data Dokumen**: Kolom nomor dokumen, tanggal terbit, dan tanggal kadaluarsa (*expired date*).
*   **Unggah Berkas (File Upload)**: Mendukung pengunggahan berkas pindaian (*scan*) dokumen fisik dalam format PDF yang disimpan secara aman di direktori storage sistem.
*   **Logika Masa Berlaku Otomatis (Dynamic Status)**:
    *   Sistem secara otomatis menghitung selisih hari antara tanggal saat ini dengan tanggal kadaluarsa dokumen (`sisa_hari`).
    *   **Status Hijau (Active)**: Dokumen dengan sisa masa berlaku > 30 hari.
    *   **Status Kuning (Warning)**: Dokumen dengan sisa masa berlaku &le; 30 hari (membutuhkan perhatian).
    *   **Status Merah (Expired)**: Dokumen yang tanggal kadaluarsanya sudah terlewati (lewat jatuh tempo).

### 4. Modul Manajemen Docking Perawatan (Operational Feature)
Fitur pelacak jadwal docking armada untuk pemeliharaan fisik kapal.
*   **Pencatatan Rencana Docking**: Input tanggal rencana docking, lokasi galangan (*shipyard*), jenis docking (misal: Annual Survey, Special Survey), dan catatan teknis.
*   **Status Docking**: Pengelolaan status proses docking (Rencana, Berjalan, Selesai).
*   **Relasi ke Kapal**: Setiap jadwal docking terhubung langsung ke catatan histori kapal terkait.

### 5. Modul Dashboard & Monitoring Real-Time (Analytical Hub)
Pusat visualisasi data untuk pengambil keputusan.
*   **Kartu Indikator Cepat**: Menampilkan Total Kapal, Total Dokumen Aktif, Jumlah Docking Berjalan, dan Jumlah Dokumen yang Expired secara instan.
*   **Grafik Interaktif (Chart.js)**:
    *   *Doughnut Chart*: Visualisasi persentase status dokumen (Aktif vs Warning vs Expired).
    *   *Bar Chart*: Distribusi jumlah armada kapal berdasarkan jenis tipe kapalnya.
*   **Tabel Alert Dokumen Kritis**: Daftar dokumen kapal yang berstatus *Expired* atau *Warning* (sisa hari &le; 30) diurutkan berdasarkan sisa hari paling sedikit.
*   **Tabel Jadwal Docking Terdekat**: Menampilkan daftar kapal yang akan melakukan docking dalam waktu dekat untuk persiapan logistik operasional.

### 6. Sub-Sistem Pelaporan (Reporting & Print Engine)
SIMOP-KAPAL dilengkapi mesin laporan yang sangat lengkap untuk kebutuhan birokrasi dan cetak fisik. Terdiri atas **9 Jenis Laporan**:
1.  **Laporan Dokumen**: Rekapitulasi seluruh dokumen kapal terdaftar.
2.  **Laporan Expired**: Daftar dokumen yang telah kadaluarsa.
3.  **Laporan Warning**: Daftar dokumen yang memasuki masa kritis (&le; 30 hari).
4.  **Laporan Kapal**: Daftar armada kapal beserta spesifikasi teknisnya.
5.  **Laporan Operator**: Daftar sebaran kapal berdasarkan operator pelayaran.
6.  **Laporan Pelabuhan**: Daftar sebaran kapal berdasarkan pangkalan pelabuhan.
7.  **Laporan Statistik**: Laporan analitis berbentuk tabel ringkasan status.
8.  **Laporan per Kapal**: Halaman khusus yang menyajikan satu kapal lengkap dengan seluruh riwayat dokumen dan riwayat docking-nya.
9.  **Laporan Docking**: Jadwal dan riwayat docking seluruh armada.

*Catatan Optimasi Cetak: Semua halaman laporan ini memiliki tombol "Cetak" yang memicu cetak jendela browser. Sistem menggunakan CSS `@media print` untuk menyembunyikan sidebar navigasi, tombol cetak, dan elemen web lainnya, menyisakan kop surat formal dan tabel laporan bersih yang siap diajukan ke Direksi.*
