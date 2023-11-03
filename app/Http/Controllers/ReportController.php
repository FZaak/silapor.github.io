<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Satker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Yakin ingin hapus data?';
        confirmDelete($title);

        $satker = Satker::all();

        if (Auth::user()->is_admin == 1) {
            if ($request->has('tahun')) {
                if ($request->has('bulan') && $request->has('satker')) {
                    $reports = Report::where('satker_id', 'LIKE', '%' . $request->satker . '%')->whereMonth('created_at', $request->bulan)->whereYear('created_at', $request->tahun)->latest()->get();
                } elseif ($request->has('bulan')) {
                    $reports = Report::whereMonth('created_at', $request->bulan)->get();
                } elseif ($request->has('satker')) {
                    $reports = Report::where('satker_id', 'LIKE', '%' . $request->satker . '%')->latest()->get();
                } else {
                    $reports = Report::latest()->get();
                }
            } else {
                if ($request->has('bulan') && $request->has('satker')) {
                    $reports = Report::where('satker_id', 'LIKE', '%' . $request->satker . '%')->whereMonth('created_at', $request->bulan)->latest()->get();
                } elseif ($request->has('bulan')) {
                    $reports = Report::whereMonth('created_at', $request->bulan)->get();
                } elseif ($request->has('satker')) {
                    $reports = Report::where('satker_id', 'LIKE', '%' . $request->satker . '%')->latest()->get();
                } else {
                    $reports = Report::latest()->get();
                }
            }
        } else {
            if ($request->has('tahun')) {
                if ($request->has('bulan')) {
                    $reports = Report::where('satker_id', 'LIKE', '%' . $request->satker . '%')->whereMonth('created_at', $request->bulan)->where('user_id', Auth::id())->whereYear('created_at', $request->tahun)->latest()->get();
                } else {
                    $reports = Report::where('user_id', Auth::id())->whereYear('created_at', $request->tahun)->latest()->get();
                }
            } else {
                if ($request->has('bulan')) {
                    $reports = Report::where('satker_id', 'LIKE', '%' . $request->satker . '%')->whereMonth('created_at', $request->bulan)->where('user_id', Auth::id())->latest()->get();
                } else {
                    $reports = Report::where('user_id', Auth::id())->latest()->get();
                }
            }
        }
        return view('user.reports.index', compact('reports', 'satker'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required'
        ]);

        //upload file
        $file = $request->file('file');
        $file->storeAs('public/laporan', $file->hashName());

        Report::create([
            'file' => $file->hashName(),
            'user_id' => Auth::id(),
            'satker_id' => Auth::user()->satker_id
        ]);

        return redirect()->route('reports.index')->with('success', 'Data Laporan Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        return view('user.reports.edit', compact('report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        if (Auth::user()->is_admin == 1) {
            $request->validate([
                'keterangan' => 'required',
                'status' => 'required',
            ]);

            $report->update([
                'status' => $request->status,
                'keterangan' => $request->keterangan
            ]);
        } else {
            $request->validate([
                'file' => 'required'
            ]);

            //upload file
            $file = $request->file('file');
            $file->storeAs('public/laporan', $file->hashName());

            Storage::delete('public/laporan/' . $report->file);

            $report->update([
                'file' => $file->hashName(),
                'user_id' => Auth::id(),
                'status' => 'diperiksa',
                'keterangan' => null
            ]);
        }

        return redirect()->route('reports.index')->with('success', 'Data Laporan Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {

        //delete file
        Storage::delete('public/posts/' . $report->file);

        //delete file
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Data Laporan Berhasil Dihapus');
    }
}
