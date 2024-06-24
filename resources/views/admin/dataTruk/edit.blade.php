@extends('layouts.template')
@section('title', 'Edit Data Truk Angkutan - PT. Jambi Bara Sejahtera')
@section('content')
<div class="container-fluid d-flex flex-column align-items-center">
    <h3 class="text-center text-dark mb-4" style="margin-top: 12px;">Edit Data Truk Angkutan</h3>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold"></p>
        </div>
        <div class="card-body d-flex justify-content-center">
            <form style="max-width: 700px;" role="form" method="post" action="{{ route('datatruk.update', $dataTruk) }}" enctype="multipart/form-data" id="editConfirm">
                @csrf
                @method('PATCH')
                <div class="form-group mb-3">
                    <label class="form-label">Nomor Polisi</label>
                    <input class="form-control" type="text" value="{{ $dataTruk->nopol }}" required placeholder="Nomor Polisi" name="nopol" />
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Tahun</label>
                    <input class="form-control" type="number" value="{{ $dataTruk->year }}" placeholder="Tahun" name="year" />
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Kondisi</label>
                    <input class="form-control" type="text" value="{{ $dataTruk->kondisi }}" placeholder="Kondisi" name="kondisi" />
                </div>
                <div class="form-group mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea id="summernote" class="form-control" name="keterangan" placeholder="Keterangan">{{ $dataTruk->keterangan }}</textarea>
                </div>
                <div class="form-group mb-3">
                    <label class="form-label" style="margin-top: 15px;">Foto</label>
                    <input id="input-file-now" class="form-control" type="file" name="image" accept="image/*" onchange="previewImage(event)" />
                    @if ($dataTruk->image)
                        <img id="imagePreview" src="{{ asset('storage/potoTruk/' . $dataTruk->image) }}" style="max-height: 200px; margin-top: 15px;" />
                    @else
                        <img id="imagePreview" style="max-height: 200px; margin-top: 15px; display: none;" />
                    @endif
                </div>
                <hr style="margin-top: 30px;margin-bottom: 10px;" />
                <div class="form-group mb-3">
                    <button id="submitButton" class="btn btn-primary d-block w-100" type="submit">
                        <i class="fas fa-save"></i> Save
                    </button>
                    <a class="btn btn-danger d-block w-100" role="button" href="{{ route('datatruk.index') }}" style="margin-top: 15px;">
                        <i class="fas fa-arrow-left"></i> Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
