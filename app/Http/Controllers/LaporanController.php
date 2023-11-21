<?php

namespace App\Http\Controllers;

use App\Models\Batubara;
use App\Models\Minyak;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.laporan.index');
    }
    public function cetakLaporanBatubara($awal, $akhir)
    {
        // dd($awal, $akhir);
        $batubaras = Batubara::whereBetween('date', [$awal, $akhir])->oldest('date')->get();

        $totalRetase = $batubaras->sum('jumlah_retase');
        $totalBucket = $batubaras->sum('jumlah_bucket');
        $totalEstimasiTonase = $batubaras->sum('estimasi_tonase');

        return view('admin.laporan.cetakBatubara', compact('batubaras', 'awal', 'akhir', 'totalRetase', 'totalBucket', 'totalEstimasiTonase'));
    }
    public function cetakLaporanMinyak($awal, $akhir)
    {
        $minyaks = Minyak::whereBetween('date', [$awal, $akhir])->oldest('date')->get();

        $totalPemasukan = $minyaks->where('type', 'Pemasukan')->sum('amount');
        $totalPengeluaran = $minyaks->where('type', 'Pengeluaran')->sum('amount');

        return view('admin.laporan.cetakMinyak', compact('minyaks', 'awal', 'akhir', 'totalPemasukan', 'totalPengeluaran'));
    }
}
