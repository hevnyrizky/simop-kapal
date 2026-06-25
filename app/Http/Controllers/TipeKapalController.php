<?php

namespace App\Http\Controllers;

use App\Models\TipeKapal;
use Illuminate\Http\Request;

class TipeKapalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = TipeKapal::query();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $tipeKapals = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('tipe-kapal.index', compact('tipeKapals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipe-kapal.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        TipeKapal::create($request->all());

        return redirect()->route('tipe-kapal.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(TipeKapal $tipeKapal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TipeKapal $tipeKapal)
    {
        return view('tipe-kapal.edit', compact('tipeKapal'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TipeKapal $tipeKapal)
    {
        $request->validate([
            'nama' => 'required',
        ]);

        $tipeKapal->update($request->all());

        return redirect()->route('tipe-kapal.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TipeKapal $tipeKapal)
    {
        $tipeKapal->delete();

        return redirect()->route('tipe-kapal.index')->with('success', 'Data berhasil dihapus');
    }
}
