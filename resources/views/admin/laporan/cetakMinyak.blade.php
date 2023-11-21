<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <style>
        table.static {
            position: relative;
            border: 1px solid #543535;
        }

        td {
            padding: 5px 15px;

        }
    </style>
    <title>Cetak</title>
</head>

<body>
    <div class="form-group">
        <h1 align="center"><b>Laporan</b></h1>
        <table class="static" align="center" rules="all" border="1px" style="width: 95%">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jenis Unit</th>
                <th>Pemasukan (perliter)</th>
                <th>Pengeluaran (perliter)</th>
                <th>Keterangan</th>
            </tr>
            @forelse ($minyaks as $minyak)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ \Carbon\Carbon::parse($minyak->date)->isoFormat('dddd, DD MMMM YYYY') }}</td>
                    <td>
                        @if ($minyak->data_alats_id)
                            {{ $minyak->dataAlat->name }}
                        @endif
                        @if ($minyak->data_truks_id)
                            {{ $minyak->dataTruk->nopol }}
                        @endif
                    </td>
                    <td>
                        @if($minyak->type == 'Pemasukan')
                        {{ number_format($minyak->amount, 0, ',', '.') }}
                        @endif
                    </td>
                    <td>
                        @if($minyak->type == 'Pengeluaran')
                        {{ number_format($minyak->amount, 0, ',', '.') }}
                        @endif
                    </td>
                    <td>{{ $minyak->keterangan }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">No data available</td>
                </tr>
            @endforelse
            <tr>
                <td colspan="3" align="end">Total:</td>
                <td>{{ number_format($totalPemasukan, 0, ',', '.') }}</td>
                <td>{{ number_format($totalPengeluaran, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
