@extends('layouts.template')
@section('title', 'Data Alat Berat - PT. Jambi Bara Sejahtera')
@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Data Alat Berat</h3>
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="{{ route('dataalat.create') }}" class="btn btn-success btn-icon-split me-4" role="button">
                            <span class="text-white-50 icon"><i class="fas fa-plus"></i></span>
                            <span class="text-white text">Create</span>
                        </a>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <form style="width: 50%;" action="{{ route('dataalat.index') }}" method="get">
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
                                <th>Nama</th>
                                <th>Tahun</th>
                                <th>Kondisi</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($dataAlats as $dataAlat)
                                <tr>
                                    <td>{{ $dataAlat->name }}</td>
                                    <td>{{ $dataAlat->year }}</td>
                                    <td>{{ $dataAlat->kondisi }}</td>
                                    <td>{{ $dataAlat->keterangan }}</td>
                                    <td class="d-flex">
                                        <a href="{{ route('dataalat.edit', $dataAlat) }}"
                                            class="btn btn-info btn-circle ms-1" role="button">
                                            <i class="fas fa-edit text-white"></i>
                                        </a>
                                        <a href="{{ route('dataalat.show', $dataAlat) }}"
                                            class="btn btn-warning btn-circle ms-1" role="button">
                                            <i class="fas fa-eye text-white"></i>
                                        </a>
                                        <form action="{{ route('dataalat.destroy', $dataAlat) }}" method="post"
                                            id="deleteForm-{{ $dataAlat->id }}">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-circle ms-1 delete_confirm" type="button"
                                                onclick="confirmDelete({{ $dataAlat->id }})">
                                                <i class="fas fa-trash text-white"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                            Showing {{ $dataAlats->firstItem() }} to {{ $dataAlats->lastItem() }} of
                            {{ $dataAlats->total() }} entries
                        </p>
                    </div>
                    <div class="col-md-12 mt-3">
                        <div class="d-flex justify-content-end">
                            {{ $dataAlats->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
