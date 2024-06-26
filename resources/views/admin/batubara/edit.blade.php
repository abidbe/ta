@extends('layouts.template')
@section('title', 'Edit Data Batubara - PT. Jambi Bara Sejahtera')
@section('content')
    <div class="container-fluid d-flex flex-column align-items-center">
        <h3 class="text-center text-dark mb-4" style="margin-top: 12px;">Edit Data Minyak</h3>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"></p>
            </div>
            <div class="card-body d-xl-flex justify-content-xl-center">
                <form style="min-width: 350px;" role="form" action="{{ route('batubara.update', $batubara) }}"
                    method="post" enctype="multipart/form-data" id="editConfirm">
                    @csrf
                    @method('patch')
                    <div class="container">
                        <div class="row row-cols-2 ">
                            <div class="col form-group mb-3">
                                <label class="form-label">Nomor Polisi</label>
                                <select class="form-select" aria-label="Default select example" name="data_truks_id"
                                    required>
                                    <option selected disabled hidden>Select One--</option>
                                    @foreach ($dataTruk as $dT)
                                        <option value="{{ $dT->id }}"
                                            {{ $batubara->data_truks_id == $dT->id ? 'selected' : '' }}>{{ $dT->nopol }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">Tanggal</label>
                                <input class="form-control" type="date" required placeholder="Tanggal" name="date"
                                    value="{{ $batubara->date->format('Y-m-d') }}" />
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">Lokasi</label>
                                <input class="form-control" placeholder="Lokasi" name="lokasi"
                                    value="{{ $batubara->lokasi }}" />
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">Driver</label>
                                <input class="form-control" name="driver" placeholder="Driver"
                                    value="{{ $batubara->driver }}" />
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">Jumlah Retase</label>
                                <input class="form-control" type="number" name="jumlah_retase" placeholder="Jumlah Retase"
                                    value="{{ $batubara->jumlah_retase }}" />
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">Jumlah Bucket</label>
                                <input class="form-control" type="number" name="jumlah_bucket" placeholder="Jumlah Bucket"
                                    value="{{ $batubara->jumlah_bucket }}" />
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">Estimasi Tonase</label>
                                <input class="form-control" type="number" step="0.01" name="estimasi_tonase"
                                    placeholder="Estimasi Tonase" value="{{ $batubara->estimasi_tonase }}" />
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">DT Gendong</label>
                                <input class="form-control" name="dt_gendong" placeholder="DT Gendong"
                                    value="{{ $batubara->dt_gendong }}" />
                            </div>
                            <div class="col form-group mb-3">
                                <label class="form-label">Tujuan</label>
                                <input class="form-control" name="tujuan" placeholder="Tujuan"
                                    value="{{ $batubara->tujuan }}" />
                            </div>
                        </div>
                    </div>
                    <hr style="margin-top: 30px;margin-bottom: 10px;" />
                    <div class="form-group mb-3">
                        <button id="submitButton" class="btn btn-primary d-block w-100" type="button"
                            onclick="confirmEdit()"><i class="fas fa-save"></i> Save</button>
                        <a class="btn btn-danger d-block w-100" role="button" href="{{ route('batubara.index') }}"
                            style="margin-top: 15px;"><i class="fas fa-arrow-left"></i> Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
