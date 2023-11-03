@extends('layouts.app')

@section('header', 'Tambah Pengguna')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Pengguna</li>
        <li class="breadcrumb-item active">Tambah Pengguna</li>
    </ol>
@endsection

@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" value="{{ old('nama') }}"
                                placeholder="Nama">
                            @error('nama')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                                placeholder="Username">
                            @error('username')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="satker_id">Satuan Kerja</label>
                            <select name="satker_id" id="satker_id" class="custom-select">
                                <option selected disabled>Pilih Satuan Kerja</option>
                                @foreach ($satker as $item)
                                    <option value="{{ $item->id }}" @selected($item->id == old('satker_id'))>
                                        {{ $item->nama_satuan_kerja }}</option>
                                @endforeach
                            </select>
                            @error('satker_id')
                                <div>
                                    <span class="text-danger">{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                placeholder="Password">
                            @error('password')
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
