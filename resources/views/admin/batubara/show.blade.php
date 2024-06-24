@extends('layouts.template')
@section('title', 'Detail Data Batubara - PT. Jambi Bara Sejahtera')
@section('content')
    <div class="container-fluid text-start">
        <h3 class="text-dark text-center mt-4">Detail Data batubara</h3>
        <div class="row justify-content-center mt-4">
            <div class="col-11 col-sm-10 col-md-8 col-lg-7 col-xl-6">
                <div class="card clean-card">
                    <div class="card-body">
                        <div class="row mb-3 ms-2 mt-4">
                            <div class="col">
                                <p class="labels"><strong>Tanggal</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">
                                    : {{ \Carbon\Carbon::parse($batubara->date)->isoFormat('dddd, DD MMMM YYYY') }}</p>
                            </div>
                        </div>
                        <div class="row mb-3 ms-2">
                            <div class="col">
                                <p class="labels"><strong>Nomor Polisi</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">: {{ $batubara->dataTruk->nopol ?? '' }}</p>
                            </div>
                        </div>
                        <div class="row mb-3 ms-2">
                            <div class="col">
                                <p class="labels"><strong>Lokasi</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">: {{ $batubara->lokasi }}</p>
                            </div>
                        </div>
                        <div class="row mb-3 ms-2">
                            <div class="col">
                                <p class="labels"><strong>Driver</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">: {{ $batubara->driver }}</p>
                            </div>
                        </div>
                        <div class="row mb-3 ms-2">
                            <div class="col">
                                <p class="labels"><strong>Jumlah Retase</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">: {{ $batubara->jumlah_retase }}</p>
                            </div>
                        </div>
                        <div class="row mb-3 ms-2">
                            <div class="col">
                                <p class="labels"><strong>Jumlah Bucket</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">: {{ $batubara->jumlah_bucket }}</p>
                            </div>
                        </div>
                        <div class="row mb-3 ms-2">
                            <div class="col">
                                <p class="labels"><strong>Estimasi Tonase</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">: {{ $batubara->estimasi_tonase }}</p>
                            </div>
                        </div>
                        <div class="row mb-3 ms-2">
                            <div class="col">
                                <p class="labels"><strong>DT Gendong</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">: {{ $batubara->dt_gendong }}</p>
                            </div>
                        </div>
                        <div class="row mb-3 ms-2">
                            <div class="col">
                                <p class="labels"><strong>Tujuan</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">: {{ $batubara->tujuan }}</p>
                            </div>
                        </div>
                        <hr />
                        <div class="container">
                            <div class="row d-flex justify-content-center">
                                <div class="row d-flex justify-content-center gap-2">
                                    <div class="row">
                                        <a style="width: 100%;" href="{{ route('batubara.edit', $batubara) }}"
                                            class="btn btn-success btn-block">Ubah</a>
                                    </div>
                                    <div class="row">
                                        <form class="p-0" action="{{ route('batubara.destroy', $batubara) }}"
                                            method="post" id="deleteForm-{{ $batubara->id }}">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-danger btn-block" style="width: 100%;"
                                                onclick="confirmDelete({{ $batubara->id }})">Hapus</button>
                                        </form>
                                    </div>
                                    <div class="row">
                                        <a style="width: 100%;" href="{{ route('batubara.index') }}"
                                            class="btn btn-secondary btn-block">Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
