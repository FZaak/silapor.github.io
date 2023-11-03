<div>

    <div class="row">
        <div class="col">
            <select class="custom-select" wire:model.live="filter">
                <option value="">Select departement</option>
                @foreach ($satkers as $item)
                    <option value="{{ $item->id }}">{{ $item->nama_satuan_kerja }}</option>
                @endforeach
            </select>
            <div class="card">
                <div class="card-body">
                    @if (Auth::user()->is_admin !== 1)
                        <a href="{{ route('reports.create') }}" class="btn btn-primary">Tambah data</a>
                    @endif

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
                                    <td>{{ $report->created_at }}</td>
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
                                            <a href="{{ route('reports.destroy', $report) }}"
                                                class="btn btn-danger btn-sm" data-confirm-delete="true">Hapus</a>
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
</div>
