<?php

namespace App\Http\Controllers;

use App\Models\DokumenKapal;
use Illuminate\Http\Request;
use App\Models\Kapal;
use App\Models\JenisDokumen;
use Illuminate\Support\Facades\Storage;

class DokumenKapalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = DokumenKapal::with([
            'kapal',
            'jenisDokumen'
        ]);

        // SEARCH
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('nomor_dokumen', 'like', "%{$search}%")
                    ->orWhereHas('kapal', function ($kapal) use ($search) {
                        $kapal->where('nama_kapal', 'like', "%{$search}%");
                    });
            });
        }

        // FILTER STATUS
        if ($request->status == 'expired') {
            $query->whereDate('tanggal_expired', '<', now());
        }

        if ($request->status == 'warning') {
            $query->whereDate('tanggal_expired', '>=', now())
                ->whereDate('tanggal_expired', '<=', now()->addDays(30));
        }

        if ($request->status == 'aktif') {
            $query->whereDate('tanggal_expired', '>', now()->addDays(30));
        }

        // $dokumens = $query->latest()->get();
        $dokumens = $query->latest()->paginate(10)->withQueryString();

        return view('dokumen-kapal.index', compact('dokumens'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kapals = Kapal::all();
        $jenisDokumens = JenisDokumen::all();

        return view('dokumen-kapal.create', compact('kapals', 'jenisDokumens'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kapal_id' => 'required',
            'jenis_dokumen_id' => 'required',
            'nomor_dokumen' => 'required',
            'tanggal_terbit' => 'required',
            'tanggal_expired' => 'required',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048',
        ]);
        $data = $request->all();

        //upload file
        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('dokumen', 'public');
        }

        DokumenKapal::create($data);

        return redirect()->route('dokumen-kapal.index')->with('success', 'Dokumen berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(DokumenKapal $dokumenKapal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DokumenKapal $dokumenKapal)
    {
        $kapals = Kapal::all();
        $jenisDokumens = JenisDokumen::all();

        return view('dokumen-kapal.edit', compact(
            'dokumenKapal',
            'kapals',
            'jenisDokumens'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DokumenKapal $dokumenKapal)
    {
        $request->validate([
            'kapal_id' => 'required',
            'jenis_dokumen_id' => 'required',
            'nomor_dokumen' => 'required',
            'tanggal_terbit' => 'required|date',
            'tanggal_expired' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('file');

        if ($request->hasFile('file')) {
            if ($dokumenKapal->file) {
                Storage::disk('public')->delete($dokumenKapal->file);
            }
            $data['file'] = $request->file('file')->store('dokumen', 'public');
        }

        $dokumenKapal->update($data);

        return redirect()
            ->route('dokumen-kapal.index')
            ->with('success', 'Dokumen berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DokumenKapal $dokumenKapal)
    {
        if ($dokumenKapal->file) {
            Storage::disk('public')->delete($dokumenKapal->file);
        }

        $dokumenKapal->delete();

        return redirect()
            ->route('dokumen-kapal.index')
            ->with('success', 'Dokumen berhasil dihapus');
    }
}
