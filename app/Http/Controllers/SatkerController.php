<?php

namespace App\Http\Controllers;

use App\Models\Satker;
use Illuminate\Http\Request;

class SatkerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = 'Yakin ingin hapus data?';
        confirmDelete($title);

        return view('admin.satker.index', [
            'satker' => Satker::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.satker.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attr = $request->validate([
            'nama_satuan_kerja' => 'required'
        ]);

        Satker::create($attr);

        return redirect()->route('satker.index')->with('success', 'Data Satuan Kerja Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Satker $satker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satker $satker)
    {
        return view('admin.satker.edit', compact('satker'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Satker $satker)
    {
        $attr = $request->validate([
            'nama_satuan_kerja' => 'required'
        ]);

        $satker->update($attr);

        return redirect()->route('satker.index')->with('success', 'Data Satuan Kerja Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satker $satker)
    {
        $satker->delete();
        return redirect()->route('satker.index')->with('success', 'Data Satuan Kerja Berhasil Dihapus');
    }
}
