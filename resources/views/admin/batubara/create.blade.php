@extends('layouts.templete')
@section('content')
    <div
        class="container-fluid d-flex d-print-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex flex-column align-items-center">
        <h3 class="text-center text-dark mb-4" style="margin-top: 12px;">Tambah Data Batu Bara</h3>
        <div class="card shadow ms-xxl-0 ps-xxl-0 mb-xxl-4 mb-xl-4 mb-lg-4 mb-md-4 mb-sm-4 mb-4">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"></p>
            </div>
            <div class="card-body d-xl-flex justify-content-xl-center">
                <form style="max-width:750px;" role="form" action="{{ route('batubara.store') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="container">
                        <div class="row row-cols-2 ">
                            <div class="col form-group mb-3">
                                <label class="form-label">Nomor Polisi</label>
                                <select class="form-select" aria-label="Default select example" name="data_truks_id"
                                    required>
                                    <option selected disabled hidden>Select One--</option>
                                    @foreach ($dataTruk as $dT)
                                        <option value="{{ $dT->id }}">{{ $dT->nopol }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">Tanggal</label>
                                <input class="form-control" type="date" required placeholder="Tanggal" name="date" />
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">Lokasi</label>
                                <input class="form-control" placeholder="Lokasi" name="lokasi" />
                            </div>

                            <div class="col form-group mb-3">
                                <label class="form-label">Driver</label>
                                <input class="form-control" name="driver" placeholder="Driver">
                                </input>
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">Jumlah Retase</label>
                                <input class="form-control" type="number" name="jumlah_retase" placeholder="Jumlah Retase">
                                </input>
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">Jumlah Bucket</label>
                                <input class="form-control" type="number" name="jumlah_bucket" placeholder="Jumlah Bucket">
                                </input>
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">Estimasi Tonase</label>
                                <input class="form-control" type="number" step="0.01" name="estimasi_tonase" placeholder="Estimasi Tonase">
                                </input>
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">DT Gendong</label>
                                <input class="form-control" name="dt_gendong" placeholder="DT Gendong">
                                </input>
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">Tujuan</label>
                                <input class="form-control" name="tujuan" placeholder="Tujuan">
                                </input>
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 30px;margin-bottom: 10px;" />
                    <div class="form-group mb-3"><button id="submitButton" class="btn btn-primary d-block w-100"
                            type="submit"><i class="fas fa-save"></i> Save</button>
                        <a class="btn btn-danger d-block w-100" role="button" href="{{ route('batubara.index') }}"
                            style="margin-top: 15px;"><i class="fas fa-arrow-left"></i> Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
