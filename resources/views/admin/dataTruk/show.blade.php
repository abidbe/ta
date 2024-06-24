@extends('layouts.template')
@section('title', 'Detail Data Truk Angkutan - PT. Jambi Bara Sejahtera')
@section('content')
<div class="container-fluid text-start">
    <h3 class="text-dark text-center mt-4">Detail Data Truk Angkutan</h3>
    <div class="row justify-content-center mt-4">
        <div class="col-11 col-sm-10 col-md-8 col-lg-7 col-xl-6">
            <div class="card clean-card">
                <div class="card-img-top-container">
                    @if ($dataTruk->image)
                        <a href="{{ asset('storage/potoTruk/' . $dataTruk->image) }}" target="_blank">
                            <img class="card-img-top w-100 d-block" src="{{ asset('storage/potoTruk/' . $dataTruk->image) }}" alt="{{ $dataTruk->nopol }}" style="max-height: 400px; object-fit: cover;" />
                        </a>
                    @else
                        <img class="card-img-top w-100 d-block" src="{{ asset('storage/Image_not_available.png') }}" alt="Image not available" style="max-height: 400px; object-fit: cover;" />
                    @endif
                </div>
                <div class="card-body mx-3 my-2">
                    <div class="row mb-3">
                        <div class="col">
                            <p class="labels"><strong>Nomor Polisi</strong></p>
                        </div>
                        <div class="col">
                            <p class="labels">: {{ $dataTruk->nopol }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <p class="labels"><strong>Tahun</strong></p>
                        </div>
                        <div class="col">
                            <p class="labels">: {{ $dataTruk->year }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <p class="labels"><strong>Kondisi</strong></p>
                        </div>
                        <div class="col">
                            <p class="labels">: {{ $dataTruk->kondisi }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <p class="labels"><strong>Keterangan</strong></p>
                        </div>
                        <div class="col">
                            <p class="labels">: {{ $dataTruk->keterangan }}</p>
                        </div>
                    </div>
                    <hr />
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="row d-flex justify-content-center gap-2">
                                <div class="row">
                                    <a style="width: 100%;" href="{{ route('datatruk.edit', $dataTruk) }}" class="btn btn-success btn-block">Ubah</a>
                                </div>
                                <div class="row">
                                    <form class="p-0" action="{{ route('datatruk.destroy', $dataTruk) }}" method="post" id="deleteForm-{{ $dataTruk->id }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-block" style="width: 100%;" onclick="confirmDelete({{ $dataTruk->id }})">Hapus</button>
                                    </form>
                                </div>
                                <div class="row">
                                    <a style="width: 100%;" href="{{ route('datatruk.index') }}" class="btn btn-secondary btn-block">Kembali</a>
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