@extends('layouts.templete')
@section('content')
<div class="container-fluid d-flex d-print-flex d-sm-flex d-md-flex d-lg-flex d-xl-flex d-xxl-flex flex-column align-items-center">
    <h3 class="text-center text-dark mb-4" style="margin-top: 12px;">Tambah Data Alat Berat</h3>
    <div class="card shadow ms-xxl-0 ps-xxl-0 mb-xxl-4 mb-xl-4 mb-lg-4 mb-md-4 mb-sm-4 mb-4">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold"></p>
        </div>
        <div class="card-body d-xl-flex justify-content-xl-center">
            <form style="max-width: 700px;" role="form" action="{{route('dataalat.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group mb-3"><label class="form-label">Nama</label><input class="form-control" type="text" required  placeholder="Nama" name="name" />
                    <div class="form-group mb-3"><label class="form-label">Tahun</label><input class="form-control" type="number"  placeholder="Tahun" name="year" /></div>
                    <div class="form-group mb-3"><label class="form-label">Kondisi</label><input class="form-control" type="text"  placeholder="Kondisi" name="kondisi" /></div>
                </div>
                <div class="form-group mb-3"><label class="form-label">Keterangan</label><input id="summernote" class="form-control" name="keterangan" placeholder="Keterangan"></input></div>
                <div class="color form-group mb-3"><label class="form-label" style="margin-top: 15px;">Foto</label>
                    <section>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-12 col-md-12">
                                    <div class="file-upload-wrapper">
                                        <div class="view file-upload" style="padding-bottom: 7px;padding-right: 4px;"><input id="input-file-now" class="form-control Masukkan Foto" type="file" name="image" accept="image/*"/></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <hr style="margin-top: 30px;margin-bottom: 10px;" />
                <div class="form-group mb-3"><button id="submitButton" class="btn btn-primary d-block w-100" type="submit"><i class="fas fa-save"></i> Save</button><a class="btn btn-danger d-block w-100" role="button" href="{{route('dataalat.index')}}" style="margin-top: 15px;"><i class="fas fa-arrow-left"></i> Cancel</a></div>
            </form>
        </div>
    </div>
</div>
@endsection
