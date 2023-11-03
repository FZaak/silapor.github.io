@extends('layouts.app')

@section('header')
    Laporan
    @isset($_GET['satker'])
        @php
            $nama_satker = \App\Models\Satker::where('id', $_GET['satker'])->first();
            if (!$nama_satker) {
                abort(404);
            }
        @endphp
        Satuan Kerja <span style="font-weight: bold">{{ $nama_satker->nama_satuan_kerja }}</span>
    @endisset
@endsection

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">
            Laporan
        </li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                @if (Auth::user()->is_admin !== 1)
                    <div class="card-header d-flex justify-content-end">
                        <a href="{{ route('reports.create') }}" class="btn btn-primary">Tambah data</a>
                    </div>
                @endif
                <div class="card-body">
                    <form action="/reports" method="GET">
                        <div class="row d-flex align-items-center">
                            <div class="col-sm-12">
                                <h4>Filter Laporan</h4>
                            </div>
                            <div class="col-sm-3 col-12 mb-2">
                                <select name="anggaran" class="custom-select">
                                    <option selected disabled>Pilih Perencanaan Anggaran</option>
                                    <option value="Ankabut"
                                        @isset($_GET['anggaran'])
                                        @selected($_GET['anggaran'] == 'Ankabut')
                                    @endisset>
                                        Ankabut</option>
                                    <option value="Indikatif"
                                        @isset($_GET['anggaran'])
                                        @selected($_GET['anggaran'] == 'Indikatif')
                                    @endisset>
                                    Indikatif</option>
                                    <option value="Anggaran"
                                        @isset($_GET['anggaran'])
                                        @selected($_GET['anggaran'] == 'Anggaran')
                                    @endisset>
                                    Anggaran</option>
                                    <option value="Alokasi"
                                        @isset($_GET['anggaran'])
                                        @selected($_GET['anggaran'] == 'Alokasi')
                                    @endisset>
                                    Alokasi</option>
                                </select>
                            </div>
                            @if (Auth::user()->is_admin === 1)
                                <div class="col-sm-3 mb-2">
                                    <select name="satker" class="custom-select">
                                        <option selected disabled>Pilih Satuan Kerja</option>
                                        @foreach ($satker as $item)
                                            <option value="{{ $item->id }}"
                                                @isset($_GET['satker'])
                                                 @selected($_GET['satker'] == $item->id)
                                            @endisset>
                                                {{ $item->nama_satuan_kerja }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endif
                            <div class="col-sm-3 col-12 mb-2">
                                <select name="bulan" class="custom-select">
                                    <option selected disabled>Pilih Bulan</option>
                                    <option value="01"
                                        @isset($_GET['bulan'])
                                        @selected($_GET['bulan'] == '01')
                                    @endisset>
                                        Januari</option>
                                    <option value="02"
                                        @isset($_GET['bulan'])
                                        @selected($_GET['bulan'] == '02')
                                    @endisset>
                                        Februari</option>
                                        <option value="03"
                                        @isset($_GET['bulan'])
                                        @selected($_GET['bulan'] == '03')
                                    @endisset>
                                        Maret</option>
                                        <option value="04"
                                        @isset($_GET['bulan'])
                                        @selected($_GET['bulan'] == '04')
                                    @endisset>
                                        April</option>
                                        <option value="05"
                                        @isset($_GET['bulan'])
                                        @selected($_GET['bulan'] == '05')
                                    @endisset>
                                        Mei</option>
                                        <option value="06"
                                        @isset($_GET['bulan'])
                                        @selected($_GET['bulan'] == '06')
                                    @endisset>
                                        Juni</option>
                                        <option value="06"
                                        @isset($_GET['bulan'])
                                        @selected($_GET['bulan'] == '06')
                                    @endisset>
                                        Juli</option>
                                        <option value="07"
                                        @isset($_GET['bulan'])
                                        @selected($_GET['bulan'] == '07')
                                    @endisset>
                                        Agustus</option>
                                        <option value="08"
                                        @isset($_GET['bulan'])
                                        @selected($_GET['bulan'] == '08')
                                    @endisset>
                                        September</option>
                                        <option value="09"
                                        @isset($_GET['bulan'])
                                        @selected($_GET['bulan'] == '09')
                                    @endisset>
                                        Oktober</option>
                                        <option value="10"
                                        @isset($_GET['bulan'])
                                        @selected($_GET['bulan'] == '10')
                                    @endisset>
                                        November</option>
                                        <option value="11"
                                        @isset($_GET['bulan'])
                                        @selected($_GET['bulan'] == '11')
                                    @endisset>
                                        Desember</option>
                                        <option value="12"
                                        @isset($_GET['bulan'])
                                        @selected($_GET['bulan'] == '12')
                                    @endisset>
                                </select>
                            </div>
                            <div class="col-sm-3 col-12 mb-2">
                                <select name="tahun" class="custom-select">
                                    <option selected disabled>Pilih Tahun</option>
                                    <option value="2022"
                                        @isset($_GET['tahun'])
                                        @selected($_GET['tahun'] == '2022')
                                    @endisset>
                                        2022</option>
                                    <option value="2023"
                                        @isset($_GET['tahun'])
                                        @selected($_GET['tahun'] == '2023')
                                    @endisset>
                                        2023</option>
                                    <option value="2024"
                                    @isset($_GET['tahun'])
                                        @selected($_GET['tahun'] == '2024')
                                    @endisset>
                                        2024</option>
                                        <option value="2025"
                                    @isset($_GET['tahun'])
                                        @selected($_GET['tahun'] == '2025')
                                    @endisset>
                                        2025</option>
                                        <option value="2026"
                                    @isset($_GET['tahun'])
                                        @selected($_GET['tahun'] == '2026')
                                    @endisset>
                                        2026</option>
                                </select>
                            </div>
                            <div class="col-sm-3 col-12 mb-2 d-flex justify-content-end justify-content-sm-start">
                                <a href="/reports" class="btn btn-secondary">Reset Filter</a>
                                <button type="submit" class="btn btn-primary ml-2">Cari</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                    <table id="myTable" class="table table-bordered table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Satuan Kerja</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($reports as $report)
                                <tr wire:key="{{ $report->id }}">
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $report->user->nama }}</td>
                                    <td>{{ $report->user->satker->nama_satuan_kerja }}</td>
                                    <td>{{ \Illuminate\Support\Carbon::parse($report->created_at)->translatedFormat('d F Y') }}
                                    </td>
                                    <td>{{ $report->status }}</td>
                                    <td>{{ $report->keterangan }}</td>
                                    <td>
                                        <a href="/storage/laporan/{{ $report->file }}"
                                            class="btn btn-success btn-sm">Unduh</a>
                                        @if (Auth::user()->is_admin === 0 && $report->status === 'revisi')
                                            <a href="{{ route('reports.edit', $report) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                        @endif
                                        @if (Auth::user()->is_admin == 1)
                                            <a href="{{ route('reports.edit', $report) }}"
                                                class="btn btn-warning btn-sm">Edit</a>
                                            <a href="{{ route('reports.destroy', $report) }}" class="btn btn-danger btn-sm"
                                                data-confirm-delete="true">Hapus</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
