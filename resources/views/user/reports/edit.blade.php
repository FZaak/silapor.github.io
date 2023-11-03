@extends('layouts.app')

@section('header', 'Tambah Laporan')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Laporan</li>
        <li class="breadcrumb-item active">Tambah Laporan</li>
    </ol>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            @if (Auth::user()->is_admin == 1)
                <div class="card">
                    {{-- admin --}}
                    <div class="card-body">
                        <form action="{{ route('reports.update', $report) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" id="keterangan" rows="2" placeholder="Keterangan" class="form-control">{{ old('keterangan', $report->keterangan) }}</textarea>
                                @error('keterangan')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select name="status" id="status" class="custom-select">
                                    <option selected disabled>Pilih Status</option>
                                    <option value="revisi" @selected(old('status', $report->status) == 'revisi')>Revisi</option>
                                    <option value="diterima" @selected(old('status', $report->status) == 'diterima')>Diterima</option>
                                    <option value="diperiksa" @selected(old('status', $report->status) == 'diperiksa')>Diperiksa</option>
                                </select>
                                @error('status')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('reports.update', $report) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group">
                                <label for="file">File</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="file" name="file">
                                    <label class="custom-file-label" for="file">Choose file</label>
                                </div>
                                @error('file')
                                    <div>
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
