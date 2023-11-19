@extends('layouts.templete')
@section('content')
    <div
        class="container-fluid d-flex d-print-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex flex-column align-items-center">
        <h3 class="text-center text-dark mb-4" style="margin-top: 12px;">Edit Data Minyak</h3>
        <div class="card shadow ms-xxl-0 ps-xxl-0 mb-xxl-4 mb-xl-4 mb-lg-4 mb-md-4 mb-sm-4 mb-4">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"></p>
            </div>
            <div class="card-body d-xl-flex justify-content-xl-center">
                <form style="min-width: 350px;" role="form" action="{{ route('minyak.update', $minyak) }}" method="post"
                    enctype="multipart/form-data" id="editConfirm">
                    {{-- @dd($minyak->type) --}}
                    @csrf
                    @method('patch')
                    <div class="form-group mb-3">
                        <label class="form-label">Type</label>
                        <select class="form-select" aria-label="Default select example" name="type"
                            value="{{ $minyak->type }}" required>
                            <option selected disabled hidden>Select One--</option>
                            <option value="Pemasukan" {{ $minyak->type === 'Pemasukan' ? 'selected' : '' }}>Pemasukan
                            </option>
                            <option value="Pengeluaran" {{ $minyak->type === 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran
                            </option>
                        </select>
                        </select>
                    </div>
                    <!-- Tambahkan ID unik untuk elemen select -->
                    <div class="form-group mb-3">
                        <label class="form-label">Jenis Unit</label>
                        <div class="d-flex flex-column gap-3 ps-2">
                            <div class="form-check d-flex align-items-center gap-2">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault1" {{ $minyak->data_alats_id ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    <select class="form-select" aria-label="Default select example" name="data_alats_id"
                                        id="selectDataAlat">
                                        <option selected disabled hidden>Alat Berat</option>
                                        @foreach ($dataAlat as $dA)
                                            <option value="{{ $dA->id }}"
                                                {{ $minyak->data_alats_id == $dA->id ? 'selected' : '' }}>
                                                {{ $dA->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                            <div class="form-check  d-flex align-items-center gap-2">
                                <input class="form-check-input" type="radio" name="flexRadioDefault"
                                    id="flexRadioDefault2" {{ $minyak->data_truks_id ? 'checked' : '' }}>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    <select class="form-select" aria-label="Default select example" name="data_truks_id"
                                        id="selectJenisUnit">
                                        <option selected disabled hidden>Truk Angkutan</option>
                                        @foreach ($dataTruk as $dT)
                                            <option value="{{ $dT->id }}"
                                                {{ $minyak->data_truks_id == $dT->id ? 'selected' : '' }}>
                                                {{ $dT->nopol }}</option>
                                        @endforeach
                                    </select>
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group mb-3">
                        <label class="form-label">Tanggal</label>
                        <input class="form-control" type="date" required placeholder="Tanggal" name="date"
                            id="date" value="{{ $minyak->date->format('Y-m-d') }}" />

                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Jumlah</label>
                        <input class="form-control" type="number" required placeholder="Jumlah" name="amount"
                            value="{{ $minyak->amount }}" />
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label">Keterangan</label>
                        <input id="summernote" class="form-control" name="keterangan" placeholder="Keterangan"
                            value="{{ $minyak->keterangan }}">
                        </input>
                    </div>

                    <hr style="margin-top: 30px;margin-bottom: 10px;" />
                    <div class="form-group mb-3">
                        <button id="submitButton" class="btn btn-primary d-block w-100 " type="button"
                            onclick="confirmEdit()">
                            <i class="fas fa-save"></i> Save</button>
                        <a class="btn btn-danger d-block w-100" role="button" href="{{ route('minyak.index') }}"
                            style="margin-top: 15px;">
                            <i class="fas fa-arrow-left"></i> Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
