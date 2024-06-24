@extends('layouts.template')
@section('title', 'Laporan Batubara - PT. Jambi Bara Sejahtera')
@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Laporan Batubara</h3>
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">Laporan Batubara</p>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-xl-7">
                        <a href="{{ route('laporan.form') }}" class="btn btn-danger"><span
                            class="fas fa-arrow-left"></span></a>
                        <a href="#" id="btnCetakPDF" class="btn btn-primary">Cetak PDF</a>
                        <a href="{{ route('export.batubara', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="btn btn-success text-white">Export to Excel</a>
                    </div>
                </div>
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>No Polisi</th>
                                <th>Lokasi</th>
                                <th>Driver</th>
                                <th>Jumlah Retase</th>
                                <th>Jumlah Bucket</th>
                                <th>Estimasi Tonase</th>
                                <th>DT Gendong</th>
                                <th>Tujuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($Data as $batubara)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($batubara->date)->isoFormat('dddd, DD MMMM YYYY') }}</td>
                                    <td>{{ $batubara->data_truks_id ? $batubara->dataTruk->nopol : '' }}</td>
                                    <td>{{ $batubara->lokasi }}</td>
                                    <td>{{ $batubara->driver }}</td>
                                    <td>{{ $batubara->jumlah_retase }}</td>
                                    <td>{{ $batubara->jumlah_bucket }}</td>
                                    <td>{{ number_format($batubara->estimasi_tonase, 2, ',', '.') }}</td>
                                    <td>{{ $batubara->dt_gendong }}</td>
                                    <td>{{ $batubara->tujuan }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="text-center">No data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4" class="text-end fw-bold">Total:</td>
                                <td>{{ number_format($Data->sum('jumlah_retase'), 0, ',', '.') }}</td>
                                <td>{{ number_format($Data->sum('jumlah_bucket'), 0, ',', '.') }}</td>
                                <td>{{ number_format($Data->sum('estimasi_tonase'), 2, ',', '.') }}</td>
                                <td colspan="2"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>
    <script>
        $(document).ready(function () {
            $("#btnCetakPDF").on("click", function () {
                var element = document.getElementById("dataTable");
                var opt = {
                    margin: 10,
                    filename: 'laporan.pdf',
                    image: { type: 'jpeg', quality: 1 },
                    html2canvas: { scale: 2 },
                    jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait', fontSize: 5 }
                };
                html2pdf(element, opt);
            });
        });
    </script>
@endsection
