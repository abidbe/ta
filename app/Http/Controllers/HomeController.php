<?php

namespace App\Http\Controllers;

use App\Charts\EstimasitonaseChart;
use App\Charts\PenggunaanminyakChart;
use App\Models\Batubara;
use App\Models\DataAlat;
use App\Models\DataTruk;
use App\Models\Minyak;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PenggunaanminyakChart $chart, EstimasitonaseChart $Echart)
    {
        //buat chart
        $chart = $chart->build();
        $Echart = $Echart->build();

        //data minyak
        $minyak = Minyak::all();
        $totalPemasukan = Minyak::Pemasukan()->sum('amount');
        $totalPengeluaran = Minyak::pengeluaran()->sum('amount');
        $saldoMinyak = $totalPemasukan - $totalPengeluaran;

        //data alat
        $dataAlat = DataAlat::all();

        //data truk
        $dataTruk = DataTruk::all();

        //data batu bara
        $batubara = Batubara::all();

        return view('admin.dashboard', compact(
            'minyak',
            'totalPemasukan',
            'totalPengeluaran',
            'saldoMinyak',
            'chart',
            'dataTruk',
            'dataAlat',
            'batubara',
            'Echart'
        ));
    }
}
