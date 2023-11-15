@extends('layouts.templete')
@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Data Alat berat</h3>
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 text-nowrap">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                            <a href="{{ route('dataalat.create') }}" class="btn btn-success btn-icon-split me-4"
                                role="button"><span class="text-white-50 icon"><i class="fas fa-plus"></i></span><span
                                    class="text-white text">Create</span></a><label class="form-label">Show&nbsp;<select
                                    class="d-inline-block form-select form-select-sm">
                                    <option value="10" selected="">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input
                                    type="search" class="form-control form-control-sm" aria-controls="dataTable"
                                    placeholder="Search"></label></div>
                    </div>
                </div>
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th style="border-bottom-color: rgb(0,0,0);">Nama</th>
                                <th style="border-bottom-color: rgb(0,0,0);">Tahun</th>
                                <th style="border-bottom-color: rgb(0,0,0);">Kondisi</th>
                                <th style="border-bottom-color: rgb(0,0,0);">Keterangan</th>
                                <th style="border-bottom-color: rgb(0,0,0);">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataAlats as $dataAlat)
                                <tr>
                                    <td>{{ $dataAlat->name }}</td>
                                    <td>{{ $dataAlat->year }}</td>
                                    <td>{{ $dataAlat->kondisi }}</td>
                                    <td>{{ $dataAlat->keterangan }}</td>
                                    <td class="d-xl-flex">
                                        <a href="{{ route('dataalat.edit', $dataAlat) }}"
                                            class="btn btn-info btn-circle ms-1" role="button"
                                            style="text-align: justify;"><i class="fas fa-edit text-white"></i></a>
                                        <a href="{{ route('dataalat.show',$dataAlat)}}" class="btn btn-warning btn-circle ms-1" role="button"
                                            style="text-align: justify;"><i class="fas fa-eye text-white"></i></a>
                                        <form action="{{ route('dataalat.destroy',$dataAlat)}}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class="btn btn-danger btn-circle ms-1 delete_confirm" type="Submit" 
                                                style="text-align: justify;"><i class="fas fa-trash text-white"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr></tr>
                        </tfoot>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of
                            27</p>
                    </div>
                    <div class="col-md-6">
                        <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                            <ul class="pagination">
                                <li class="page-item disabled"><a class="page-link" aria-label="Previous"
                                        href="#"><span aria-hidden="true">«</span></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span
                                            aria-hidden="true">»</span></a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
