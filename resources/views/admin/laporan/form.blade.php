@extends('layouts.template')
@section('title', 'Form Laporan - PT. Jambi Bara Sejahtera')
@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Laporan</h3>
        <div class="card shadow col-xl-5">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">Form Laporan</p>
            </div>
            <div class="card-body">
                <form action="{{ route('laporan.store') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 mb-3">
                            <select class="form-select" aria-label="Default select example" name="pilihdata" required>
                                <option selected hidden disabled>Select One--</option>
                                <option value="1">Data Minyak</option>
                                <option value="2">Data Batubara</option>
                            </select>
                        </div>
                        <div class="col-xl-12 mb-3">
                            <span><b>Tanggal Awal:</b></span>
                            <input type="date" class="form-control" name="start_date" required>
                        </div>
                        <div class="col-xl-12 mb-5">
                            <span><b>Tanggal Akhir:</b></span>
                            <input type="date" class="form-control" name="end_date" required>
                        </div>
                        <div class="col-xl-12 mb-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
