@extends('layouts.app')

@section('header', 'Satuan Kerja')

@section('breadcrumb')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item active">Satuan Kerja</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('satker.create') }}" class="btn btn-primary">Tambah data</a>
                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Satuan Kerja</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($satker as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->nama_satuan_kerja }}</td>
                                    <td>
                                        <a href="{{ route('satker.edit', $item) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ route('satker.destroy', $item) }}" class="btn btn-danger btn-sm"
                                            data-confirm-delete="true">Hapus</a>
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
