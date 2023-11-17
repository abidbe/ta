@extends('layouts.templete')
@section('content')
    <div class="container-fluid text-center">
        <h3 class="text-dark mt-4">Detail Data Alat Berat</h3>

        <div class="row justify-content-center mt-4">
            <div class="col-11 col-sm-10 col-md-8 col-lg-7 col-xl-6">
                <div class="card clean-card">
                    <img class="card-img-top w-100 d-block" src="{{ asset('storage/potoAlat/' . $dataAlat->image) }}"
                        alt="{{ $dataAlat->name }}" />
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <p class="labels"><strong>Nama</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">{{ $dataAlat->name }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <p class="labels"><strong>Tahun</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">{{ $dataAlat->year }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <p class="labels"><strong>Kondisi</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">{{ $dataAlat->kondisi }}</p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <p class="labels"><strong>Keterangan</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">{{ $dataAlat->keterangan }}</p>
                            </div>
                        </div>
                        <hr />

                        <div class="container">
                            <div class="row d-flex justify-content-center ">
                                <div class="row d-flex justify-content-center gap-2 ">
                                    <div class="row">
                                        <a style="width: 100%;" href="{{ route('dataalat.edit', $dataAlat) }}"
                                            class="btn btn-success btn-block">Ubah</a>
                                    </div>
                                    <div class="row">
                                        <form class="p-0" action="{{ route('dataalat.destroy', $dataAlat) }}" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-block"
                                                style="width: 100%;">Hapus</button>
                                        </form>
                                    </div>
                                    <div class="row">
                                        <a style="width: 100%;" href="{{ route('dataalat.index') }}"
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
