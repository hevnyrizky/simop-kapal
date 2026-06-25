<?php

namespace App\Http\Controllers;

use App\Models\Docking;
use App\Models\Kapal;
use Illuminate\Http\Request;

class DockingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Docking::with('kapal');

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('lokasi', 'like', '%' . $request->search . '%')
                    ->orWhere('jenis_docking', 'like', '%' . $request->search . '%')
                    ->orWhereHas('kapal', function ($kapal) use ($request) {
                        $kapal->where('nama_kapal', 'like', '%' . $request->search . '%');
                    });
            });
        }

        if ($request->status) {
            $query->where('status', $request->status);
        }

        $dockings = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('docking.index', compact('dockings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kapals = Kapal::all();

        return view('docking.create', compact('kapals'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kapal_id' => 'required',
            'tanggal_docking' => 'required|date',
            'lokasi' => 'required',
            'jenis_docking' => 'required',
            'status' => 'required',
            'catatan' => 'nullable',
        ]);

        // dd($request->all());
        Docking::create($request->all());

        return redirect()
            ->route('docking.index')
            ->with('success', 'Data docking berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Docking $docking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docking $docking)
    {
        $kapals = Kapal::all();

        return view('docking.edit', compact('docking', 'kapals'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Docking $docking)
    {
        $request->validate([
            'kapal_id' => 'required',
            'tanggal_docking' => 'required|date',
            'lokasi' => 'required',
            'jenis_docking' => 'required',
            'status' => 'required',
            'catatan' => 'nullable',
        ]);

        $docking->update($request->all());

        return redirect()
            ->route('docking.index')
            ->with('success', 'Data docking berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Docking $docking)
    {
        $docking->delete();

        return redirect()
            ->route('docking.index')
            ->with('success', 'Data docking berhasil dihapus');
    }
}
