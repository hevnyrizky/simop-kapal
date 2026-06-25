<?php

namespace App\Http\Controllers;

use App\Models\Pelabuhan;
use Illuminate\Http\Request;

class PelabuhanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pelabuhan::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('lokasi', 'like', '%' . $request->search . '%')
                    ->orWhere('kode', 'like', '%' . $request->search . '%');
            });
        }

        $pelabuhans = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('pelabuhan.index', compact('pelabuhans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelabuhan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'nullable',
            'kode' => 'nullable',
            'keterangan' => 'nullable'
        ]);

        Pelabuhan::create($request->all());
        return redirect()->route('pelabuhan.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelabuhan $pelabuhan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelabuhan $pelabuhan)
    {
        $pelabuhan = Pelabuhan::find($pelabuhan->id);
        return view('pelabuhan.edit', compact('pelabuhan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelabuhan $pelabuhan)
    {
        $request->validate([
            'nama' => 'required',
            'lokasi' => 'nullable',
            'kode' => 'nullable',
            'keterangan' => 'nullable'
        ]);
        $pelabuhan->update($request->all());

        return redirect()->route('pelabuhan.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelabuhan $pelabuhan)
    {
        $pelabuhan->delete();

        return redirect()->route('pelabuhan.index')->with('success', 'Data berhasil dihapus');
    }
}
