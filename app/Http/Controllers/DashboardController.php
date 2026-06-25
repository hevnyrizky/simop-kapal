<?php

namespace App\Http\Controllers;

use App\Models\Docking;
use App\Models\DokumenKapal;
use App\Models\Kapal;
use App\Models\Operator;
use App\Models\Pelabuhan;
use App\Models\TipeKapal;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $today = now();
        $warningDate = now()->addDays(30);

        $totalKapal = Kapal::count();
        $totalDokumen = DokumenKapal::count();
        $totalOperator = Operator::count();
        $totalPelabuhan = Pelabuhan::count();

        $expired = DokumenKapal::whereDate('tanggal_expired', '<', $today)
            ->count();

        $warning = DokumenKapal::whereDate('tanggal_expired', '>=', $today)
            ->whereDate('tanggal_expired', '<=', $warningDate)
            ->count();

        $aktif = DokumenKapal::whereDate('tanggal_expired', '>', $warningDate)
            ->count();

        // Upcoming / ongoing dockings
        $upcomingDockings = Docking::with('kapal')
            ->whereIn('status', ['planned', 'ongoing'])
            ->orderBy('tanggal_docking')
            ->limit(5)
            ->get();

        $totalActiveDocking = Docking::whereIn('status', ['planned', 'ongoing'])->count();

        // Dokumen terdekat expired/warning
        $dokumenTerdekat = DokumenKapal::with(['kapal', 'jenisDokumen'])
            ->orderBy('tanggal_expired')
            ->limit(5)
            ->get();

        // Chart data for Ship Types Distribution
        $tipeKapals = TipeKapal::withCount('kapals')->get();

        return view('dashboard', compact(
            'totalKapal',
            'totalDokumen',
            'totalOperator',
            'totalPelabuhan',
            'totalActiveDocking',
            'expired',
            'warning',
            'aktif',
            'dokumenTerdekat',
            'upcomingDockings',
            'tipeKapals'
        ));
    }
}
