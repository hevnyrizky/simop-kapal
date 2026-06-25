# 🚢 SIMOP-KAPAL ROADMAP

Sistem Monitoring dan Pengelolaan Operasional Kapal  
PT Rimau Bahtera Shipping

---

## 📌 TUJUAN PROJECT

Membangun sistem berbasis web untuk:

- Monitoring kapal [x]
- Pengelolaan dokumen [x]
- Tracking operasional & maintenance [x]
- Reporting terintegrasi [x]
- Manajemen Pengguna & Hak Akses [x]

---

# 🧭 PHASE 1 — SETUP ✅

- [x] Install LaravelDaily Starter Kit
- [x] Setup database MySQL
- [x] Login & dashboard berjalan
- [x] Struktur project dipahami

---

# 🟢 PHASE 2 — MASTER DATA ✅

## ✅ 1. Kapal
- [x] Migration
- [x] Model
- [x] Controller
- [x] CRUD lengkap
- [x] Relasi tipe kapal

## ✅ 2. Tipe Kapal
- [x] tabel tipe_kapals
- [x] relasi ke kapal

## ✅ 3. Operator
- [x] Migration
- [x] Relasi ke kapal
- [x] CRUD (index, create, edit, delete)
- [x] Integrasi ke form kapal

## ✅ 4. Pelabuhan
- [x] Migration
- [x] CRUD
- [x] Relasi ke kapal

## ✅ 5. Area Pelayaran
- [x] CRUD
- [x] Relasi ke kapal

## ✅ 6. Klasifikasi
- [x] CRUD
- [x] Relasi ke kapal

## ✅ 7. Jenis Dokumen
- [x] CRUD

---

# 🟡 PHASE 3 — FITUR UTAMA ✅

## 📄 1. Dokumen Kapal
- [x] Input dokumen
- [x] Upload file
- [x] Tanggal berlaku
- [x] Status otomatis (aktif, warning, expired)
- [x] Hapus dokumen & pembersihan file storage otomatis

## ⚓ 2. Docking
- [x] Riwayat docking
- [x] Lokasi shipyard
- [x] Catatan teknis
- [x] Status docking (planned, ongoing, completed)

---

# 🔴 PHASE 4 — MONITORING & SECURITY ✅

## 📊 Dashboard
- [x] Total kapal & indikator cepat
- [x] Dokumen aktif, warning, & expired
- [x] Grafik sebaran status & tipe kapal (Chart.js)
- [x] Alert list dokumen kritis & docking terdekat

## 🔑 Hak Akses & Manajemen Pengguna
- [x] Penutupan registrasi publik (Closed Registration)
- [x] Fitur CRUD Manajemen Pengguna oleh Admin
- [x] Otorisasi & pembatasan menu sidebar berdasarkan Role (Admin & Manajemen)

---

# 🟣 PHASE 5 — REPORT (WAJIB SKRIPSI) ✅

- [x] Laporan semua dokumen (Filter & Pagination)
- [x] Laporan dokumen expired
- [x] Laporan dokumen warning
- [x] Laporan kapal
- [x] Laporan operator
- [x] Laporan pelabuhan
- [x] Laporan per kapal (Detail riwayat dokumen & docking)
- [x] Laporan docking
- [x] Statistik armada
- [x] Optimasi media cetak CSS (@media print)

---

# ⚙️ PHASE 6 — FINISHING ✅

- [x] UI diperbaiki (Tailwind CSS & Dark/Light Mode)
- [x] Validasi lengkap di Controller
- [x] Testing sistem
- [x] Screenshot untuk skripsi
- [x] Dokumentasi BAB 3 & BAB 4 (Selesai di `laporan_skripsi.md`)

---

# 📍 STATUS SAAT INI

👉 Phase: **COMPLETED** ✅  
👉 Fokus: **Siap untuk Sidang Skripsi**  

---

# 🎯 TARGET SAAT INI

- [x] Seluruh modul & bug minor telah berhasil diselesaikan.
- [x] Dokumen laporan skripsi telah diperbarui dengan Use Case & ERD terbaru.
