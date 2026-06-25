<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\TipeKapal;
use App\Models\Operator;
use App\Models\Pelabuhan;
use App\Models\AreaPelayaran;
use App\Models\Klasifikasi;
use App\Models\JenisDokumen;
use App\Models\Kapal;
use App\Models\DokumenKapal;
use App\Models\Docking;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Disable foreign keys to safely truncate tables
        Schema::disableForeignKeyConstraints();
        User::truncate();
        TipeKapal::truncate();
        Operator::truncate();
        Pelabuhan::truncate();
        AreaPelayaran::truncate();
        Klasifikasi::truncate();
        JenisDokumen::truncate();
        Kapal::truncate();
        DokumenKapal::truncate();
        Docking::truncate();
        Schema::enableForeignKeyConstraints();

        // 1. SEED USERS
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@rimaushipping.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Manager Operasional',
            'email' => 'manajemen@rimaushipping.com',
            'password' => Hash::make('password'),
            'role' => 'manajemen',
        ]);

        // 2. SEED TIPE KAPAL
        $tipeTugBoat = TipeKapal::create(['nama' => 'Tug Boat']);
        $tipeTongkang = TipeKapal::create(['nama' => 'Tongkang']);
        $tipeSpob = TipeKapal::create(['nama' => 'SPOB']);
        $tipeCargo = TipeKapal::create(['nama' => 'Cargo']);

        // 3. SEED OPERATOR
        $opBahtera = Operator::create([
            'nama' => 'PT Rimau Bahtera Shipping',
            'alamat' => 'Jl. Sudirman No. 12, Jakarta',
            'telepon' => '021-5551234'
        ]);
        $opRimau = Operator::create([
            'nama' => 'PT Rimau Shipping',
            'alamat' => 'Jl. HR Rasuna Said, Jakarta',
            'telepon' => '021-5555678'
        ]);
        $opTrans = Operator::create([
            'nama' => 'PT Rimau Trans Logistic',
            'alamat' => 'Jl. Jend. A. Yani, Banjarmasin',
            'telepon' => '0511-3331122'
        ]);

        // 4. SEED PELABUHAN
        $pelTrisakti = Pelabuhan::create([
            'nama' => 'Trisakti',
            'lokasi' => 'Banjarmasin',
            'kode' => 'BDJ',
            'keterangan' => 'Pelabuhan utama Banjarmasin untuk bongkar muat batubara.'
        ]);
        $pelBatulicin = Pelabuhan::create([
            'nama' => 'Batulicin',
            'lokasi' => 'Tanah Bumbu',
            'kode' => 'BTW',
            'keterangan' => 'Pelabuhan logistik batubara pantai timur Kalimantan.'
        ]);
        $pelSamarinda = Pelabuhan::create([
            'nama' => 'Samarinda',
            'lokasi' => 'Samarinda',
            'kode' => 'SRD',
            'keterangan' => 'Pelabuhan sungai Mahakam untuk distribusi komoditas.'
        ]);
        $pelBalikpapan = Pelabuhan::create([
            'nama' => 'Balikpapan',
            'lokasi' => 'Balikpapan',
            'kode' => 'BPN',
            'keterangan' => 'Pelabuhan Semayang Balikpapan untuk peti kemas & migas.'
        ]);

        // 5. SEED AREA PELAYARAN
        $areaDomestik = AreaPelayaran::create([
            'nama' => 'Domestik',
            'keterangan' => 'Seluruh wilayah perairan kepulauan Indonesia.'
        ]);
        $areaA1 = AreaPelayaran::create([
            'nama' => 'A1',
            'keterangan' => 'Wilayah pelayaran terbatas dekat pantai.'
        ]);
        $areaA2 = AreaPelayaran::create([
            'nama' => 'A2',
            'keterangan' => 'Wilayah pelayaran lepas pantai / antar pulau.'
        ]);

        // 6. SEED KLASIFIKASI
        $klasBki = Klasifikasi::create([
            'nama' => 'BKI',
            'negara' => 'Indonesia',
            'keterangan' => 'Biro Klasifikasi Indonesia - Standard Nasional.'
        ]);
        $klasNk = Klasifikasi::create([
            'nama' => 'ClassNK',
            'negara' => 'Jepang',
            'keterangan' => 'Nippon Kaiji Kyokai - Klasifikasi Internasional.'
        ]);
        $klasAbs = Klasifikasi::create([
            'nama' => 'ABS',
            'negara' => 'Amerika Serikat',
            'keterangan' => 'American Bureau of Shipping - Migas & Offshore.'
        ]);

        // 7. SEED JENIS DOKUMEN
        $docSuratLaut = JenisDokumen::create(['nama' => 'Surat Laut', 'masa_berlaku' => 60]);
        $docSuratUkur = JenisDokumen::create(['nama' => 'Surat Ukur', 'masa_berlaku' => null]);
        $docGarisMuat = JenisDokumen::create(['nama' => 'Garis Muat', 'masa_berlaku' => 60]);
        $docSafetyConst = JenisDokumen::create(['nama' => 'Keselamatan Konstruksi', 'masa_berlaku' => 12]);
        $docSafetyRadio = JenisDokumen::create(['nama' => 'Keselamatan Radio', 'masa_berlaku' => 12]);

        // 8. SEED KAPAL
        $kapal1 = Kapal::create([
            'nama_kapal' => 'TB Rimau 11',
            'tipe_kapal_id' => $tipeTugBoat->id,
            'operator_id' => $opBahtera->id,
            'pelabuhan_id' => $pelTrisakti->id,
            'area_pelayaran_id' => $areaDomestik->id,
            'klasifikasi_id' => $klasBki->id,
            'call_sign' => 'YE3855',
            'no_imo' => '9100223'
        ]);

        $kapal2 = Kapal::create([
            'nama_kapal' => 'TB Rimau 18',
            'tipe_kapal_id' => $tipeTugBoat->id,
            'operator_id' => $opBahtera->id,
            'pelabuhan_id' => $pelBatulicin->id,
            'area_pelayaran_id' => $areaA1->id,
            'klasifikasi_id' => $klasBki->id,
            'call_sign' => 'YF4922',
            'no_imo' => '9241099'
        ]);

        $kapal3 = Kapal::create([
            'nama_kapal' => 'TB Rimau Gold',
            'tipe_kapal_id' => $tipeTugBoat->id,
            'operator_id' => $opRimau->id,
            'pelabuhan_id' => $pelBalikpapan->id,
            'area_pelayaran_id' => $areaDomestik->id,
            'klasifikasi_id' => $klasNk->id,
            'call_sign' => 'YG5011',
            'no_imo' => '9388277'
        ]);

        $kapal4 = Kapal::create([
            'nama_kapal' => 'BG Rimau 3001',
            'tipe_kapal_id' => $tipeTongkang->id,
            'operator_id' => $opRimau->id,
            'pelabuhan_id' => $pelTrisakti->id,
            'area_pelayaran_id' => $areaDomestik->id,
            'klasifikasi_id' => $klasBki->id,
            'call_sign' => null,
            'no_imo' => null
        ]);

        $kapal5 = Kapal::create([
            'nama_kapal' => 'BG Rimau 3302',
            'tipe_kapal_id' => $tipeTongkang->id,
            'operator_id' => $opTrans->id,
            'pelabuhan_id' => $pelSamarinda->id,
            'area_pelayaran_id' => $areaA2->id,
            'klasifikasi_id' => $klasNk->id,
            'call_sign' => null,
            'no_imo' => null
        ]);

        $kapal6 = Kapal::create([
            'nama_kapal' => 'SPOB Rimau Energi',
            'tipe_kapal_id' => $tipeSpob->id,
            'operator_id' => $opBahtera->id,
            'pelabuhan_id' => $pelBalikpapan->id,
            'area_pelayaran_id' => $areaDomestik->id,
            'klasifikasi_id' => $klasAbs->id,
            'call_sign' => 'YS6729',
            'no_imo' => '9455112'
        ]);

        // 9. SEED DOKUMEN KAPAL (18 Data - 3 per kapal untuk sebaran Aktif, Warning, Expired yang seimbang)
        $kapals = [$kapal1, $kapal2, $kapal3, $kapal4, $kapal5, $kapal6];
        $docs = [$docSuratLaut, $docGarisMuat, $docSafetyConst, $docSafetyRadio];

        $docCounter = 1001;
        foreach ($kapals as $index => $kapal) {
            // Document 1: AKTIF (Habis tempo di masa depan > 30 hari)
            DokumenKapal::create([
                'kapal_id' => $kapal->id,
                'jenis_dokumen_id' => $docSuratLaut->id,
                'nomor_dokumen' => 'REG/' . $docCounter++,
                'tanggal_terbit' => now()->subMonths(6)->toDateString(),
                'tanggal_expired' => now()->addMonths(18)->toDateString(),
                'file' => null
            ]);

            // Document 2: WARNING (Mendekati habis tempo ≤ 30 hari)
            // Kita gunakan sebaran hari: 5, 10, 15, 20, 25, 28 hari dari sekarang
            $warningDays = 5 + ($index * 4); 
            DokumenKapal::create([
                'kapal_id' => $kapal->id,
                'jenis_dokumen_id' => $docSafetyConst->id,
                'nomor_dokumen' => 'SFT-C/' . $docCounter++,
                'tanggal_terbit' => now()->subMonths(11)->toDateString(),
                'tanggal_expired' => now()->addDays($warningDays)->toDateString(),
                'file' => null
            ]);

            // Document 3: EXPIRED (Sudah kadaluarsa)
            // Kita gunakan sebaran hari di masa lalu: -5, -12, -20, -35, -45, -60 hari
            $expiredDays = 5 + ($index * 10);
            DokumenKapal::create([
                'kapal_id' => $kapal->id,
                'jenis_dokumen_id' => $docSafetyRadio->id,
                'nomor_dokumen' => 'RAD/' . $docCounter++,
                'tanggal_terbit' => now()->subMonths(13)->toDateString(),
                'tanggal_expired' => now()->subDays($expiredDays)->toDateString(),
                'file' => null
            ]);
        }

        // 10. SEED DOCKING (8 Data - 3 completed, 2 ongoing, 3 planned)
        // Docking 1: Completed (Masa Lalu)
        Docking::create([
            'kapal_id' => $kapal1->id,
            'tanggal_docking' => now()->subMonths(4)->toDateString(),
            'lokasi' => 'Galangan Shipyard Priok',
            'jenis_docking' => 'Annual Survey',
            'status' => 'completed',
            'catatan' => 'Pemeriksaan tahunan lambung dan mesin jangkar. Hasil baik.'
        ]);

        // Docking 2: Completed (Masa Lalu)
        Docking::create([
            'kapal_id' => $kapal4->id,
            'tanggal_docking' => now()->subMonths(8)->toDateString(),
            'lokasi' => 'Galangan Batulicin Mandiri',
            'jenis_docking' => 'Special Docking',
            'status' => 'completed',
            'catatan' => 'Selesai perbaikan pelat lambung kiri bawah.'
        ]);

        // Docking 3: Completed (Masa Lalu)
        Docking::create([
            'kapal_id' => $kapal5->id,
            'tanggal_docking' => now()->subMonths(2)->toDateString(),
            'lokasi' => 'Galangan Mahakam Samarinda',
            'jenis_docking' => 'Intermediate Survey',
            'status' => 'completed',
            'catatan' => 'Pembersihan teritip lambung dan pengecatan anti-fouling.'
        ]);

        // Docking 4: Ongoing (Sedang Berjalan)
        Docking::create([
            'kapal_id' => $kapal2->id,
            'tanggal_docking' => now()->subDays(3)->toDateString(),
            'lokasi' => 'Galangan Shipyard Priok',
            'jenis_docking' => 'Special Docking',
            'status' => 'ongoing',
            'catatan' => 'Sedang pengerjaan sandblasting dan penggantian zinc anode.'
        ]);

        // Docking 5: Ongoing (Sedang Berjalan)
        Docking::create([
            'kapal_id' => $kapal6->id,
            'tanggal_docking' => now()->subDays(1)->toDateString(),
            'lokasi' => 'Galangan Krakatau Balikpapan',
            'jenis_docking' => 'Annual Survey',
            'status' => 'ongoing',
            'catatan' => 'SPOB Rimau Energi masuk dok untuk perawatan poros baling-baling.'
        ]);

        // Docking 6: Planned (Masa Depan)
        Docking::create([
            'kapal_id' => $kapal3->id,
            'tanggal_docking' => now()->addDays(15)->toDateString(),
            'lokasi' => 'Galangan Shipyard Priok',
            'jenis_docking' => 'Annual Survey',
            'status' => 'planned',
            'catatan' => 'Rencana pemeliharaan berkala tahunan.'
        ]);

        // Docking 7: Planned (Masa Depan)
        Docking::create([
            'kapal_id' => $kapal1->id,
            'tanggal_docking' => now()->addDays(45)->toDateString(),
            'lokasi' => 'Galangan Batulicin Mandiri',
            'jenis_docking' => 'Special Docking',
            'status' => 'planned',
            'catatan' => 'Penjadwalan ulang perbaikan kemudi kapal.'
        ]);

        // Docking 8: Planned (Masa Depan)
        Docking::create([
            'kapal_id' => $kapal5->id,
            'tanggal_docking' => now()->addDays(60)->toDateString(),
            'lokasi' => 'Galangan Mahakam Samarinda',
            'jenis_docking' => 'Intermediate Survey',
            'status' => 'planned',
            'catatan' => 'Rencana survey pertengahan masa berlaku sertifikat.'
        ]);
    }
}
