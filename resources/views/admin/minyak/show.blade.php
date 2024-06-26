@extends('layouts.template')
@section('title', 'Detail Data Minyak - PT. Jambi Bara Sejahtera')
@section('content')
    <div class="container-fluid text-start">
        <h3 class="text-dark text-center mt-4">Detail Data Minyak</h3>
        <div class="row justify-content-center mt-4">
            <div class="col-11 col-sm-10 col-md-8 col-lg-7 col-xl-6">
                <div class="card clean-card">
                    <div class="card-body">
                        <div class="row mb-3 ms-2 mt-3">
                            <div class="col">
                                <p class="labels"><strong>Tanggal</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">: {{ \Carbon\Carbon::parse($minyak->date)->isoFormat('dddd, DD MMMM YYYY') }}</p>
                            </div>
                        </div>
                        <div class="row mb-3 ms-2">
                            <div class="col">
                                <p class="labels"><strong>Jenis Unit</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">
                                    @if ($minyak->data_alats_id)
                                        : {{ $minyak->dataAlat->name }}
                                    @endif
                                    @if ($minyak->data_truks_id)
                                        : {{ $minyak->dataTruk->nopol }}
                                    @endif
                                </p>
                            </div>
                        </div>
                        @if ($minyak->type == 'Pemasukan')
                            <div class="row mb-3 ms-2">
                                <div class="col">
                                    <p class="labels"><strong>Pemasukan (perliter)</strong></p>
                                </div>
                                <div class="col">
                                    <p class="labels">: {{ $minyak->amount }}</p>
                                </div>
                            </div>
                        @endif
                        @if ($minyak->type == 'Pengeluaran')
                            <div class="row mb-3 ms-2">
                                <div class="col">
                                    <p class="labels"><strong>Pengeluaran (perliter)</strong></p>
                                </div>
                                <div class="col">
                                    <p class="labels">: {{ $minyak->amount }}</p>
                                </div>
                            </div>
                        @endif
                        <div class="row mb-3 ms-2">
                            <div class="col">
                                <p class="labels"><strong>Keterangan</strong></p>
                            </div>
                            <div class="col">
                                <p class="labels">: {{ $minyak->keterangan }}</p>
                            </div>
                        </div>
                        <hr />
                        <div class="container">
                            <div class="row d-flex justify-content-center gap-2">
                                <div class="col">
                                    <a style="width: 100%;" href="{{ route('minyak.edit', $minyak) }}" class="btn btn-success btn-block">Ubah</a>
                                </div>
                                <div class="col">
                                    <form action="{{ route('minyak.destroy', $minyak) }}" method="post" id="deleteForm-{{ $minyak->id }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="button" class="btn btn-danger btn-block" style="width: 100%;" onclick="confirmDelete({{ $minyak->id }})">Hapus</button>
                                    </form>
                                </div>
                                <div class="col">
                                    <a style="width: 100%;" href="{{ route('minyak.index') }}" class="btn btn-secondary btn-block">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
