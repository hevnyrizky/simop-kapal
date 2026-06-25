<?php

namespace App\Http\Controllers;

use App\Models\AreaPelayaran;
use App\Models\Kapal;
use App\Models\Klasifikasi;
use App\Models\TipeKapal;
use App\Models\Operator;
use App\Models\Pelabuhan;
use Illuminate\Http\Request;

class KapalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Kapal::with([
            'tipeKapal',
            'operator',
            'pelabuhan',
            'areaPelayaran',
            'klasifikasi'
        ]);

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama_kapal', 'like', '%' . $request->search . '%')
                    ->orWhere('call_sign', 'like', '%' . $request->search . '%')
                    ->orWhere('no_imo', 'like', '%' . $request->search . '%');
            });
        }

        $kapals = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('kapal.index', compact('kapals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipeKapal = TipeKapal::all();
        $operators = Operator::all();
        $pelabuhans = Pelabuhan::all();
        $areas = AreaPelayaran::all();
        $klasifikasis = Klasifikasi::all();
        return view('kapal.create', compact('tipeKapal', 'operators', 'pelabuhans', 'areas', 'klasifikasis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kapal' => 'required',
            'tipe_kapal_id' => 'required',
            'pelabuhan_id' => 'nullable',
            'area_pelayaran_id' => 'nullable',
            'klasifikasi_id' => 'nullable',
        ]);

        Kapal::create($request->all());

        return redirect()->route('kapal.index')->with('success', 'Data kapal berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kapal $kapal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kapal $kapal)
    {
        $tipeKapal = TipeKapal::all();
        $operators = Operator::all();
        $pelabuhans = Pelabuhan::all();
        $areas = AreaPelayaran::all();
        $klasifikasis = Klasifikasi::all();

        return view('kapal.edit', compact('kapal', 'tipeKapal', 'operators', 'pelabuhans', 'areas', 'klasifikasis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kapal $kapal)
    {
        $request->validate([
            'nama_kapal' => 'required',
            'tipe_kapal_id' => 'required',
            'pelabuhan_id' => 'nullable',
        ]);

        $kapal->update($request->all());

        return redirect()->route('kapal.index')->with('success', 'Data kapal berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kapal $kapal)
    {
        $kapal->delete();

        return redirect()->route('kapal.index')->with('success', 'Data berhasil dihapus');
    }
}
