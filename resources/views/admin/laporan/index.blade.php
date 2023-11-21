@extends('layouts.templete')
@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Laporan</h3>
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-7 mb-3">
                        <span>
                            <b>Tanggal Awal:</b>
                        </span>
                        <input type="date" class="form-control" id="awal" name="date">
                    </div>
                    <div class="col-xl-7  mb-5">
                        <span>
                            <b>Tanggal Akhir:</b>
                        </span>
                        <input type="date" class="form-control" id="akhir" name="date">
                    </div>
                    <div class="col-xl-12 mb-3">
                        <a href="#" id="cetakLinkB" onclick="return validateAndRedirectB();" target="_blank"
                            class="btn btn-primary col-xl-2 p-2 me-2">Cetak Data Batubara<i class="fas fa-print ms-2"></i>
                        </a>
                        <a href="#" id="cetakLinkM" onclick="return validateAndRedirectM();" target="_blank"
                            class="btn btn-primary col-xl-2 p-2">Cetak Data Minyak<i class="fas fa-print ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function validateAndRedirectM() {
            var tanggalAwal = document.getElementById("awal").value;
            var tanggalAkhir = document.getElementById("akhir").value;

            if (!tanggalAwal || !tanggalAkhir) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Tanggal awal dan akhir harus diisi!'
                });
                return false;
            }
            var link = '/laporan/minyak/' + tanggalAwal + '/' + tanggalAkhir;
            document.getElementById('cetakLinkM').href = link;

            return true;
        }

        function validateAndRedirectB() {
            var tanggalAwal = document.getElementById("awal").value;
            var tanggalAkhir = document.getElementById("akhir").value;

            if (!tanggalAwal || !tanggalAkhir) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Tanggal awal dan akhir harus diisi!'
                });
                return false;
            }
            var link = '/laporan/batubara/' + tanggalAwal + '/' + tanggalAkhir;
            document.getElementById('cetakLinkB').href = link;

            return true;
        }
    </script>
@endsection
