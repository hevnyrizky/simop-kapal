<?php

namespace App\Http\Controllers;

use App\Models\JenisDokumen;
use Illuminate\Http\Request;

class JenisDokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = JenisDokumen::query();

        if ($request->search) {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $jenisDokumens = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('jenis-dokumen.index', compact('jenisDokumens'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis-dokumen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'masa_berlaku' => 'nullable',
        ]);

        JenisDokumen::create($request->all());

        return redirect()->route('jenis-dokumen.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisDokumen $jenisDokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisDokumen $jenisDokumen)
    {
        return view('jenis-dokumen.edit', compact('jenisDokumen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisDokumen $jenisDokumen)
    {
        $request->validate([
            'nama' => 'required',
            'masa_berlaku' => 'nullable',
        ]);
        $jenisDokumen->update($request->all());
        return redirect()->route('jenis-dokumen.index')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisDokumen $jenisDokumen)
    {
        $jenisDokumen->delete();
        return redirect()->route('jenis-dokumen.index')->with('success', 'Data berhasil dihapus');
    }
}
