@extends('layouts.templete')
@section('content')
<div class="container-fluid text-center">
    <h3 class="text-dark mt-4">Detail Data Truk Angkutan</h3>

    <div class="row justify-content-center mt-4">
        <div class="col-11 col-sm-10 col-md-8 col-lg-7 col-xl-6">
            <div class="card clean-card">
                <img class="card-img-top w-100 d-block" src="{{ asset('storage/potoTruk/' . $dataTruk->image) }}" alt="{{ $dataTruk->nopol }}"/>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <p class="labels"><strong>Nomor Polisi</strong></p>
                        </div>
                        <div class="col">
                            <p class="labels">{{ $dataTruk->nopol }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <p class="labels"><strong>Tahun</strong></p>
                        </div>
                        <div class="col">
                            <p class="labels">{{ $dataTruk->year }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <p class="labels"><strong>Kondisi</strong></p>
                        </div>
                        <div class="col">
                            <p class="labels">{{ $dataTruk->kondisi }}</p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <p class="labels"><strong>Keterangan</strong></p>
                        </div>
                        <div class="col">
                            <p class="labels">{{ $dataTruk->keterangan }}</p>
                        </div>
                    </div>
                    <hr />

                    <div class="container">
                        <div class="row justify-content-center gap-2">
                            <div class="col-md-4">
                                
                                    <a style="width: 100%;" href="{{ route('datatruk.edit', $dataTruk) }}" class="btn btn-success btn-block">Ubah</a>
                                
                            </div>
                            <div class="col-md-4">
                               
                                    <form action="{{ route('datatruk.destroy', $dataTruk) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-block" style="width: 100%;" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                
                            </div>
                            <div class="col-md-4">
                               
                                    <a style="width: 100%;" href="{{ route('datatruk.index') }}" class="btn btn-secondary btn-block">Kembali</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
