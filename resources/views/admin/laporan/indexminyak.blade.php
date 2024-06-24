@extends('layouts.template')
@section('title', 'Laporan Minyak - PT. Jambi Bara Sejahtera')
@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Laporan Minyak</h3>
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-7 d-flex gap-3">
                        <a href="{{ route('laporan.form') }}" class="btn btn-danger"><span
                                class="fas fa-arrow-left"></span></a>
                        <a href="#" id="btnCetakPDF" class="btn btn-primary">Cetak PDF</a>
                        <a href="{{ route('export.minyak', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="btn btn-success text-white">Export to Excel</a>
                    </div>

                    <div class="table-responsive table mt-2" id="dataTable" role="grid"
                        aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="border-bottom-color: rgb(0,0,0);">Tanggal</th>
                                    <th style="border-bottom-color: rgb(0,0,0);">Jenis Unit</th>
                                    <th style="border-bottom-color: rgb(0,0,0);">Pemasukan (per liter)</th>
                                    <th style="border-bottom-color: rgb(0,0,0);">Pengeluaran (per liter)</th>
                                    <th style="border-bottom-color: rgb(0,0,0);">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($Data as $minyak)
                                    <tr>
                                        <td class="border-end">
                                            {{ \Carbon\Carbon::parse($minyak->date)->isoFormat('dddd, DD MMMM YYYY') }}</td>
                                        <td class="border-end">
                                            @if ($minyak->data_alats_id)
                                                {{ $minyak->dataAlat->name }}
                                            @endif
                                            @if ($minyak->data_truks_id)
                                                {{ $minyak->dataTruk->nopol }}
                                            @endif
                                        </td>
                                        <td class="border-end">
                                            @if ($minyak->type == 'Pemasukan')
                                                {{ number_format($minyak->amount, 0, ',', '.') }}
                                            @endif
                                        </td>
                                        <td class="border-end">
                                            @if ($minyak->type == 'Pengeluaran')
                                                {{ number_format($minyak->amount, 0, ',', '.') }}
                                            @endif
                                        </td>
                                        <td class="border-end">{{ $minyak->keterangan }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No data available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" align="end"class="border-end">Total:</td>
                                    <td class="border-end">{{ number_format($totalPemasukan, 0, ',', '.') }}</td>
                                    <td class="border-end">{{ number_format($totalPengeluaran, 0, ',', '.') }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2" align="end" class="border-end">Sisa Minyak:</td>
                                    <td class="border-end">{{ number_format($sisaMinyak, 0, ',', '.') }}</td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.js"></script>

    <script>
        $(document).ready(function() {
            $("#btnCetakPDF").on("click", function() {
                // Ambil HTML dari tabel atau elemen lain yang ingin dicetak
                var element = document.getElementById("dataTable");

                // Konfigurasi opsi cetak PDF
                var opt = {
                    margin: 10,
                    filename: 'laporan.pdf',
                    image: {
                        type: 'jpeg',
                        quality: 1
                    },
                    html2canvas: {
                        scale: 2
                    },
                    jsPDF: {
                        unit: 'mm',
                        format: 'a4',
                        orientation: 'portrait'
                    }
                };

                // Gunakan html2pdf untuk membuat file PDF
                html2pdf(element, opt);
            });
        });
    </script>
@endsection
