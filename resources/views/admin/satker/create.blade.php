@extends('layouts.app')

@section('header', 'Tambah Satuan Kerja')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Satuan Kerja</li>
        <li class="breadcrumb-item active">Tambah Satuan Kerja</li>
    </ol>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('satker.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_satuan_kerja">Nama Satuan Kerja</label>
                            <input type="text" class="form-control" name="nama_satuan_kerja"
                                value="{{ old('nama_satuan_kerja') }}" placeholder="Nama Satuan Kerja">
                            @error('nama_satuan_kerja')
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
        </div>
    </div>
@endsection
