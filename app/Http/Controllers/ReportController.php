<?php

namespace App\Http\Controllers;

use App\Models\Docking;
use App\Models\DokumenKapal;
use App\Models\JenisDokumen;
use App\Models\Kapal;
use App\Models\Operator;
use App\Models\Pelabuhan;
use App\Models\TipeKapal;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function dokumen(Request $request)
    {
        // Query awal dokumen kapal
        $query = DokumenKapal::with([
            'kapal',
            'jenisDokumen'
        ]);

        // Filter kapal
        if ($request->kapal_id) {
            $query->where('kapal_id', $request->kapal_id);
        }

        // Filter jenis dokumen
        if ($request->jenis_dokumen_id) {
            $query->where(
                'jenis_dokumen_id',
                $request->jenis_dokumen_id
            );
        }

        // Filter status dokumen
        if ($request->status) {

            // Dokumen sudah expired
            if ($request->status == 'expired') {

                $query->whereDate(
                    'tanggal_expired',
                    '<',
                    now()
                );

                // Dokumen akan expired ≤ 30 hari
            } elseif ($request->status == 'warning') {

                $query->whereDate(
                    'tanggal_expired',
                    '>=',
                    now()
                )
                    ->whereDate(
                        'tanggal_expired',
                        '<=',
                        now()->addDays(30)
                    );

                // Dokumen masih aktif > 30 hari
            } elseif ($request->status == 'aktif') {

                $query->whereDate(
                    'tanggal_expired',
                    '>',
                    now()->addDays(30)
                );
            }
        }

        // Ambil data dokumen
        $dokumens = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // Data dropdown filter
        $kapals = Kapal::orderBy('nama_kapal')->get();

        $jenisDokumens = JenisDokumen::orderBy('nama')->get();

        // Statistik dokumen
        $totalDokumen = DokumenKapal::count();

        $expired = DokumenKapal::whereDate(
            'tanggal_expired',
            '<',
            now()
        )->count();

        $warning = DokumenKapal::whereDate(
            'tanggal_expired',
            '>=',
            now()
        )
            ->whereDate(
                'tanggal_expired',
                '<=',
                now()->addDays(30)
            )
            ->count();

        $aktif = DokumenKapal::whereDate(
            'tanggal_expired',
            '>',
            now()->addDays(30)
        )->count();

        // Kirim data ke view
        return view('report.dokumen', compact(
            'dokumens',
            'kapals',
            'jenisDokumens',
            'totalDokumen',
            'expired',
            'warning',
            'aktif'
        ));
    }

    public function printDokumen(Request $request)
    {
        // Ambil data dokumen beserta relasinya
        $query = DokumenKapal::with([
            'kapal',
            'jenisDokumen'
        ]);

        // Filter kapal
        if ($request->kapal_id) {
            $query->where('kapal_id', $request->kapal_id);
        }

        // Filter jenis dokumen
        if ($request->jenis_dokumen_id) {
            $query->where('jenis_dokumen_id', $request->jenis_dokumen_id);
        }


        // Filter status dokumen
        if ($request->status) {

            if ($request->status == 'expired') {

                $query->whereDate(
                    'tanggal_expired',
                    '<',
                    now()
                );
            } elseif ($request->status == 'warning') {

                $query->whereDate(
                    'tanggal_expired',
                    '>=',
                    now()
                )
                    ->whereDate(
                        'tanggal_expired',
                        '<=',
                        now()->addDays(30)
                    );
            } elseif ($request->status == 'aktif') {

                $query->whereDate(
                    'tanggal_expired',
                    '>',
                    now()->addDays(30)
                );
            }
        }

        $dokumens = $query->get();

        $kapalDipilih = null;
        $jenisDipilih = null;

        if ($request->kapal_id) {
            $kapalDipilih = Kapal::find($request->kapal_id);
        }

        if ($request->jenis_dokumen_id) {
            $jenisDipilih = JenisDokumen::find(
                $request->jenis_dokumen_id
            );
        }

        $aktif = $dokumens->filter(function ($item) {
            return $item->tanggal_expired > now()->addDays(30);
        })->count();

        $warning = $dokumens->filter(function ($item) {
            return $item->tanggal_expired >= now()
                && $item->tanggal_expired <= now()->addDays(30);
        })->count();

        $expired = $dokumens->filter(function ($item) {
            return $item->tanggal_expired < now();
        })->count();

        return view(
            'report.print-dokumen',
            compact(
                'dokumens',
                'aktif',
                'warning',
                'expired',
                'kapalDipilih',
                'jenisDipilih'
            )
        );
    }

    public function expired(Request $request)
    {
        $query = DokumenKapal::with([
            'kapal',
            'jenisDokumen'
        ])->whereDate(
            'tanggal_expired',
            '<',
            now()
        );

        // Filter kapal
        if ($request->kapal_id) {
            $query->where('kapal_id', $request->kapal_id);
        }

        // Filter jenis dokumen
        if ($request->jenis_dokumen_id) {
            $query->where(
                'jenis_dokumen_id',
                $request->jenis_dokumen_id
            );
        }

        $dokumens = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $kapals = Kapal::orderBy('nama_kapal')->get();

        $jenisDokumens = JenisDokumen::orderBy('nama')->get();

        $totalExpired = DokumenKapal::whereDate(
            'tanggal_expired',
            '<',
            now()
        )->count();

        return view(
            'report.expired',
            compact(
                'dokumens',
                'kapals',
                'jenisDokumens',
                'totalExpired'
            )
        );
    }

    public function printExpired(Request $request)
    {
        $query = DokumenKapal::with([
            'kapal',
            'jenisDokumen'
        ])->whereDate(
            'tanggal_expired',
            '<',
            now()
        );

        if ($request->kapal_id) {
            $query->where('kapal_id', $request->kapal_id);
        }

        if ($request->jenis_dokumen_id) {
            $query->where(
                'jenis_dokumen_id',
                $request->jenis_dokumen_id
            );
        }

        $dokumens = $query->get();

        $kapalDipilih = null;
        $jenisDipilih = null;

        if ($request->kapal_id) {
            $kapalDipilih = Kapal::find($request->kapal_id);
        }

        if ($request->jenis_dokumen_id) {
            $jenisDipilih = JenisDokumen::find(
                $request->jenis_dokumen_id
            );
        }

        return view(
            'report.print-expired',
            compact(
                'dokumens',
                'kapalDipilih',
                'jenisDipilih'
            )
        );
    }

    public function warning(Request $request)
    {
        $query = DokumenKapal::with([
            'kapal',
            'jenisDokumen'
        ])
            ->whereDate('tanggal_expired', '>=', now())
            ->whereDate('tanggal_expired', '<=', now()->addDays(30));

        // Filter kapal
        if ($request->kapal_id) {
            $query->where('kapal_id', $request->kapal_id);
        }

        // Filter jenis dokumen
        if ($request->jenis_dokumen_id) {
            $query->where(
                'jenis_dokumen_id',
                $request->jenis_dokumen_id
            );
        }

        $dokumens = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $kapals = Kapal::orderBy('nama_kapal')->get();

        $jenisDokumens = JenisDokumen::orderBy('nama')->get();

        $totalWarning = DokumenKapal::whereDate(
            'tanggal_expired',
            '>=',
            now()
        )
            ->whereDate(
                'tanggal_expired',
                '<=',
                now()->addDays(30)
            )
            ->count();

        return view(
            'report.warning',
            compact(
                'dokumens',
                'kapals',
                'jenisDokumens',
                'totalWarning'
            )
        );
    }

    public function printWarning(Request $request)
    {
        $query = DokumenKapal::with([
            'kapal',
            'jenisDokumen'
        ])
            ->whereDate('tanggal_expired', '>=', now())
            ->whereDate('tanggal_expired', '<=', now()->addDays(30));

        if ($request->kapal_id) {
            $query->where('kapal_id', $request->kapal_id);
        }

        if ($request->jenis_dokumen_id) {
            $query->where(
                'jenis_dokumen_id',
                $request->jenis_dokumen_id
            );
        }

        $dokumens = $query->get();

        $kapalDipilih = null;
        $jenisDipilih = null;

        if ($request->kapal_id) {
            $kapalDipilih = Kapal::find($request->kapal_id);
        }

        if ($request->jenis_dokumen_id) {
            $jenisDipilih = JenisDokumen::find(
                $request->jenis_dokumen_id
            );
        }

        return view(
            'report.print-warning',
            compact(
                'dokumens',
                'kapalDipilih',
                'jenisDipilih'
            )
        );
    }

    public function kapal(Request $request)
    {
        $query = Kapal::with([
            'tipeKapal',
            'operator',
            'pelabuhan',
        ]);

        if ($request->operator_id) {
            $query->where(
                'operator_id',
                $request->operator_id
            );
        }

        if ($request->pelabuhan_id) {
            $query->where(
                'pelabuhan_id',
                $request->pelabuhan_id
            );
        }

        if ($request->tipe_kapal_id) {
            $query->where(
                'tipe_kapal_id',
                $request->tipe_kapal_id
            );
        }

        $kapals = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $operators = Operator::orderBy('nama')->get();

        $pelabuhans = Pelabuhan::orderBy('nama')->get();

        $tipeKapals = TipeKapal::orderBy('nama')->get();

        $totalKapal = Kapal::count();

        return view(
            'report.kapal',
            compact(
                'kapals',
                'operators',
                'pelabuhans',
                'tipeKapals',
                'totalKapal'
            )
        );
    }

    public function printKapal(Request $request)
    {
        $query = Kapal::with([
            'tipeKapal',
            'operator',
            'pelabuhan',
        ]);

        if ($request->operator_id) {
            $query->where('operator_id', $request->operator_id);
        }

        if ($request->pelabuhan_id) {
            $query->where('pelabuhan_id', $request->pelabuhan_id);
        }

        if ($request->tipe_kapal_id) {
            $query->where('tipe_kapal_id', $request->tipe_kapal_id);
        }

        $kapals = $query->latest()->get();

        $operatorDipilih = $request->operator_id ? Operator::find($request->operator_id) : null;
        $pelabuhanDipilih = $request->pelabuhan_id ? Pelabuhan::find($request->pelabuhan_id) : null;
        $tipeKapalDipilih = $request->tipe_kapal_id ? TipeKapal::find($request->tipe_kapal_id) : null;

        return view('report.print-kapal', compact(
            'kapals',
            'operatorDipilih',
            'pelabuhanDipilih',
            'tipeKapalDipilih'
        ));
    }

    public function operator(Request $request)
    {
        $query = Operator::query();

        if ($request->nama) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        $operators = $query->latest()->paginate(10)->withQueryString();
        $totalOperator = Operator::count();

        return view('report.operator', compact('operators', 'totalOperator'));
    }

    public function printOperator(Request $request)
    {
        $query = Operator::query();

        if ($request->nama) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        $operators = $query->latest()->get();

        return view('report.print-operator', compact('operators'));
    }

    public function pelabuhan(Request $request)
    {
        $query = Pelabuhan::query();

        if ($request->nama) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        $pelabuhans = $query->latest()->paginate(10)->withQueryString();
        $totalPelabuhan = Pelabuhan::count();

        return view('report.pelabuhan', compact('pelabuhans', 'totalPelabuhan'));
    }

    public function printPelabuhan(Request $request)
    {
        $query = Pelabuhan::query();

        if ($request->nama) {
            $query->where('nama', 'like', '%' . $request->nama . '%');
        }

        $pelabuhans = $query->latest()->get();

        return view('report.print-pelabuhan', compact('pelabuhans'));
    }

    public function statistik()
    {
        $totalKapal = Kapal::count();
        $totalDokumen = DokumenKapal::count();

        $expired = DokumenKapal::whereDate(
            'tanggal_expired',
            '<',
            now()
        )->count();

        $warning = DokumenKapal::whereDate(
            'tanggal_expired',
            '>=',
            now()
        )
            ->whereDate(
                'tanggal_expired',
                '<=',
                now()->copy()->addDays(30)
            )
            ->count();

        $aktif = DokumenKapal::whereDate(
            'tanggal_expired',
            '>',
            now()->copy()->addDays(30)
        )->count();

        $tipeKapals = TipeKapal::withCount('kapals')->get();
        $operators = Operator::withCount('kapals')->get();
        $pelabuhans = Pelabuhan::withCount('kapals')->get();
        $jenisDokumens = JenisDokumen::withCount('dokumenKapal')->get();

        return view('report.statistik', compact(
            'totalKapal',
            'totalDokumen',
            'expired',
            'warning',
            'aktif',
            'tipeKapals',
            'operators',
            'pelabuhans',
            'jenisDokumens'
        ));
    }

    public function printStatistik()
    {
        $totalKapal = Kapal::count();
        $totalDokumen = DokumenKapal::count();
        $expired = DokumenKapal::whereDate('tanggal_expired', '<', now())->count();
        $warning = DokumenKapal::whereDate('tanggal_expired', '>=', now())
            ->whereDate('tanggal_expired', '<=', now()->addDays(30))
            ->count();
        $aktif = DokumenKapal::whereDate('tanggal_expired', '>', now()->addDays(30))->count();

        $tipeKapals = TipeKapal::withCount('kapals')->get();
        $operators = Operator::withCount('kapals')->get();
        $pelabuhans = Pelabuhan::withCount('kapals')->get();
        $jenisDokumens = JenisDokumen::withCount('dokumenKapal')->get();

        return view('report.print-statistik', compact(
            'totalKapal',
            'totalDokumen',
            'expired',
            'warning',
            'aktif',
            'tipeKapals',
            'operators',
            'pelabuhans',
            'jenisDokumens'
        ));
    }

    public function perKapal(Request $request)
    {
        $kapals = Kapal::all();

        $dokumens = collect();
        $kapalDipilih = null;

        if ($request->kapal_id) {

            $kapalDipilih = Kapal::find($request->kapal_id);

            $dokumens = DokumenKapal::with([
                'kapal',
                'jenisDokumen'
            ])
                ->where('kapal_id', $request->kapal_id)
                ->latest()
                ->get();
        }

        return view('report.per-kapal', compact(
            'kapals',
            'dokumens',
            'kapalDipilih'
        ));
    }

    public function printPerKapal(Request $request)
    {
        $dokumens = collect();
        $kapalDipilih = null;

        if ($request->kapal_id) {
            $kapalDipilih = Kapal::find($request->kapal_id);
            $dokumens = DokumenKapal::with([
                'kapal',
                'jenisDokumen'
            ])
                ->where('kapal_id', $request->kapal_id)
                ->latest()
                ->get();
        }

        return view('report.print-per-kapal', compact(
            'dokumens',
            'kapalDipilih'
        ));
    }

    public function docking(Request $request)
    {
        $query = Docking::with('kapal');

        if ($request->kapal_id) {
            $query->where('kapal_id', $request->kapal_id);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $dockings = $query->latest()->paginate(10)->withQueryString();
        $kapals = Kapal::orderBy('nama_kapal')->get();
        $totalDocking = Docking::count();

        return view('report.docking', compact('dockings', 'kapals', 'totalDocking'));
    }

    public function printDocking(Request $request)
    {
        $query = Docking::with('kapal');

        if ($request->kapal_id) {
            $query->where('kapal_id', $request->kapal_id);
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $dockings = $query->latest()->get();
        $kapalDipilih = $request->kapal_id ? Kapal::find($request->kapal_id) : null;

        return view('report.print-docking', compact('dockings', 'kapalDipilih'));
    }
}
