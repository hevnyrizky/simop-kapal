<?php

namespace App\Http\Controllers;

use App\Models\AreaPelayaran;
use Illuminate\Http\Request;

class AreaPelayaranController extends Controller
{
    public function index(Request $request)
    {
        $query = AreaPelayaran::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('keterangan', 'like', '%' . $request->search . '%');
            });
        }

        $areas = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('area-pelayaran.index', compact('areas'));
    }

    public function create()
    {
        return view('area-pelayaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'nullable',
        ]);

        AreaPelayaran::create($request->all());

        return redirect()
            ->route('area-pelayaran.index')
            ->with('success', 'Area pelayaran berhasil ditambahkan');
    }

    public function edit(AreaPelayaran $areaPelayaran)
    {
        return view('area-pelayaran.edit', compact('areaPelayaran'));
    }

    public function update(Request $request, AreaPelayaran $areaPelayaran)
    {
        $request->validate([
            'nama' => 'required',
            'keterangan' => 'nullable',
        ]);

        $areaPelayaran->update($request->all());

        return redirect()
            ->route('area-pelayaran.index')
            ->with('success', 'Area pelayaran berhasil diupdate');
    }

    public function destroy(AreaPelayaran $areaPelayaran)
    {
        $areaPelayaran->delete();

        return redirect()
            ->route('area-pelayaran.index')
            ->with('success', 'Area pelayaran berhasil dihapus');
    }
}
