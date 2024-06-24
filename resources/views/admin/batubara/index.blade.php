@extends('layouts.template')
@section('title', 'Data Batubara - PT. Jambi Bara Sejahtera')
@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Kelola Batu Bara</h3>
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('batubara.create') }}" class="btn btn-success btn-icon-split me-4" role="button">
                            <span class="text-white-50 icon"><i class="fas fa-plus"></i></span>
                            <span class="text-white text">Create</span>
                        </a>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <form style="width: 50%" action="{{ route('batubara.index') }}" method="get">
                            <div class="text-md-end">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search.." name="search">
                                    <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>No Polisi</th>
                                <th>Lokasi</th>
                                <th>Driver</th>
                                <th>Jumlah Retase</th>
                                <th>Jumlah Bucket</th>
                                <th>Estimasi Tonase</th>
                                <th>DT Gendong</th>
                                <th>Tujuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($batubaras as $batubara)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($batubara->date)->isoFormat('dddd, DD MMMM YYYY') }}</td>
                                    <td>{{ $batubara->dataTruk->nopol ?? '' }}</td>
                                    <td>{{ $batubara->lokasi }}</td>
                                    <td>{{ $batubara->driver }}</td>
                                    <td>{{ $batubara->jumlah_retase }}</td>
                                    <td>{{ $batubara->jumlah_bucket }}</td>
                                    <td>{{ number_format($batubara->estimasi_tonase, 2, ',', '.') }}</td>
                                    <td>{{ $batubara->dt_gendong }}</td>
                                    <td>{{ $batubara->tujuan }}</td>
                                    <td class="d-xl-flex">
                                        <a href="{{ route('batubara.edit', $batubara) }}"
                                            class="btn btn-info btn-circle ms-1" role="button">
                                            <i class="fas fa-edit text-white"></i>
                                        </a>
                                        <a href="{{ route('batubara.show', $batubara) }}"
                                            class="btn btn-warning btn-circle ms-1" role="button">
                                            <i class="fas fa-eye text-white"></i>
                                        </a>
                                        <form action="{{ route('batubara.destroy', $batubara) }}" method="post"
                                            id="deleteForm-{{ $batubara->id }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-circle ms-1 delete_confirm" type="button"
                                                onclick="confirmDelete({{ $batubara->id }})">
                                                <i class="fas fa-trash text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="text-center">No data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end fw-bold">Total:</td>
                                <td>{{ number_format($totalRetase, 0, ',', '.') }}</td>
                                <td>{{ number_format($totalBucket, 0, ',', '.') }}</td>
                                <td>{{ number_format($totalTonase, 2, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                            Showing {{ $batubaras->firstItem() }} to {{ $batubaras->lastItem() }} of
                            {{ $batubaras->total() }} entries
                        </p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="d-flex justify-content-end">
                            {{ $batubaras->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
