@extends('layouts.templete')
@section('content')
    <div class="container-fluid">
        <h3 class="text-dark mb-4">Kelola Minyak</h3>
        <div class="card shadow">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold"></p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 ">
                        <a href="{{ route('minyak.create') }}" class="btn btn-success btn-icon-split me-4"
                            role="button"><span class="text-white-50 icon"><i class="fas fa-plus"></i></span><span
                                class="text-white text">Create</span></a>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <form style="width: 50% " action="{{ route('minyak.index') }}" method="get">
                            <div class="text-md-end">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Search.." name="search">
                                    <button class="btn btn-primary" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th style="border-bottom-color: rgb(0,0,0);">Tanggal</th>
                                <th style="border-bottom-color: rgb(0,0,0);">Jenis Unit</th>
                                <th style="border-bottom-color: rgb(0,0,0);">Pemasukan (perliter)</th>
                                <th style="border-bottom-color: rgb(0,0,0);">Pengeluaran (perliter)</th>
                                <th style="border-bottom-color: rgb(0,0,0);">Keterangan</th>
                                <th style="border-bottom-color: rgb(0,0,0);">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($minyaks as $minyak)
                                <tr>
                                    <td class="border-end">{{ \Carbon\Carbon::parse($minyak->date)->isoFormat('dddd, DD MMMM YYYY') }}</td>
                                    <td class="border-end">
                                    @if ($minyak->data_alats_id)
                                    {{ $minyak->dataAlat->name }}
                                    @endif
                                    @if ($minyak->data_truks_id)
                                    {{ $minyak->dataTruk->nopol }}
                                    @endif
                                    </td>
                                    <td class="border-end">
                                        @if($minyak->type == 'Pemasukan')
                                        {{ $minyak->amount }}
                                        @endif
                                    </td>
                                    <td class="border-end">
                                        @if($minyak->type == 'Pengeluaran')
                                        {{ $minyak->amount }}
                                        @endif
                                    </td>
                                    <td class="border-end">{{ $minyak->keterangan }}</td>
                                    <td class="d-xl-flex">
                                        <a href="{{ route('minyak.edit', $minyak) }}"
                                            class="btn btn-info btn-circle ms-1" role="button"
                                            style="text-align: justify;"><i class="fas fa-edit text-white"></i></a>
                                        <a href="{{ route('minyak.show', $minyak) }}"
                                            class="btn btn-warning btn-circle ms-1" role="button"
                                            style="text-align: justify;"><i class="fas fa-eye text-white"></i></a>
                                            <form action="{{ route('minyak.destroy', $minyak) }}" method="post" id="deleteForm">
                                                @method('DELETE')
                                                @csrf
                                                <button class="btn btn-danger btn-circle ms-1 delete_confirm" type="button"
                                                        style="text-align: justify;" onclick="confirmDelete()">
                                                    <i class="fas fa-trash text-white"></i>
                                                </button>
                                            </form>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-0pky" colspan="2"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-0pky"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                  </tr>
                                  <tr>
                                    <td class="tg-0pky" colspan="2"></td>
                                    <td class="tg-0pky" colspan="2"></td>
                                    <td class="tg-zv4m"></td>
                                    <td class="tg-zv4m"></td>
                                  </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No data available</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                            Showing {{ $minyaks->firstItem() }} to {{ $minyaks->lastItem() }} of {{ $minyaks->total() }} entries
                        </p>
                    </div>
                    {{-- <div class="col-md-6  text-start">
                        <li class="mb-0">Total Pemasukkan: {{$totalPemasukan}}</li>
                        <li class="mb-0">Sisa Pengeluaran: {{$totalPengeluaran}}</li>
                        <li class="mb-0">Sisa Minyak: {{$saldoMinyak}}</li>
                    </div> --}}
                    <div class="col-md-12 mt-3">
                        <div class="d-flex justify-content-end">
                            {{ $minyaks->links() }}
                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
@endsection
