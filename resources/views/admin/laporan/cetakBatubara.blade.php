<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <style>
        /* Gaya untuk tampilan di luar mode cetak */
        table.static {
            position: relative;
            border: 1px solid #543535;
        }

        td {
            padding: 5px 15px;
        }
    </style>
    <style type="text/css">
        @media print {
            tfoot {
                display: table-row-group !important;
            }
            tfoot tr {
                page-break-before: always;
            }
        }
    </style>
    <title>Cetak Data Batu Bara</title>
</head>

<body>
    <div class="form-group">
        <h1 align="center"><b>Laporan Data Batu Bara</b></h1>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%">
            <thead>
                <tr>
                    <th>No</th>
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
                @forelse ($batubaras as $batubara)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($batubara->date)->isoFormat('dddd, DD MMMM YYYY') }}</td>
                    <td>@if ($batubara->data_truks_id)
                        {{ $batubara->dataTruk->nopol }}
                    @endif</td>
                    <td>{{$batubara->lokasi}}</td>
                    <td>{{$batubara->driver}}</td>
                    <td>{{ number_format($batubara->jumlah_retase, 0, ',', '.') }}</td>
                    <td>{{ number_format($batubara->jumlah_bucket, 0, ',', '.') }}</td>
                    <td>{{ number_format($batubara->estimasi_tonase, 2, ',', '.') }}</td>
                    <td>{{$batubara->dt_gendong}}</td>
                    <td>{{$batubara->tujuan}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="text-center">No data available</td>
                </tr>
            @endforelse
            <tr>
                <td colspan="5" align="end">Total:</td>
                <td>{{ number_format($totalRetase, 0, ',', '.') }}</td>
                <td>{{ number_format($totalBucket, 0, ',', '.') }}</td>
                <td>{{ number_format($totalEstimasiTonase, 2, ',', '.') }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    <script type="text/javascript">
    
        window.print();
    </script>
    
</body>

</html>
