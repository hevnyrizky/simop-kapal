<?php

namespace App\Http\Controllers;

use App\Models\Klasifikasi;
use Illuminate\Http\Request;

class KlasifikasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Klasifikasi::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%' . $request->search . '%')
                    ->orWhere('negara', 'like', '%' . $request->search . '%')
                    ->orWhere('keterangan', 'like', '%' . $request->search . '%');
            });
        }

        $klasifikasis = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('klasifikasi.index', compact('klasifikasis'));
    }

    public function create()
    {
        return view('klasifikasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'negara' => 'nullable',
            'keterangan' => 'nullable',
        ]);

        Klasifikasi::create($request->all());

        return redirect()
            ->route('klasifikasi.index')
            ->with('success', 'Klasifikasi berhasil ditambahkan');
    }

    public function edit(Klasifikasi $klasifikasi)
    {
        return view('klasifikasi.edit', compact('klasifikasi'));
    }

    public function update(Request $request, Klasifikasi $klasifikasi)
    {
        $request->validate([
            'nama' => 'required',
            'negara' => 'nullable',
            'keterangan' => 'nullable',
        ]);

        $klasifikasi->update($request->all());

        return redirect()
            ->route('klasifikasi.index')
            ->with('success', 'Klasifikasi berhasil diupdate');
    }

    public function destroy(Klasifikasi $klasifikasi)
    {
        $klasifikasi->delete();

        return redirect()
            ->route('klasifikasi.index')
            ->with('success', 'Klasifikasi berhasil dihapus');
    }
}
