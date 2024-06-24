<?php

namespace App\Http\Controllers;

use App\Exports\BatubaraExport;
use App\Exports\MinyakExport;
use App\Models\Batubara;
use App\Models\Minyak;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
{
    public function form()
    {
        return view('admin.laporan.form');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'pilihdata' => 'required|not_in:Select One--',
                'start_date' => 'required|date',
                'end_date' => 'required|date|after_or_equal:start_date',
            ]);

            $dataType = $request->pilihdata;
            $startDate = $request->start_date;
            $endDate = $request->end_date;

            if ($dataType == '1') {
                $Data = Minyak::whereBetween('date', [$startDate, $endDate])->get();
                $totalPemasukan = $Data->where('type', 'Pemasukan')->sum('amount');
                $totalPengeluaran = $Data->where('type', 'Pengeluaran')->sum('amount');

                $sisaPemasukan = Minyak::where('date', '<=', $endDate)->where('type', 'Pemasukan')->sum('amount');
                $sisaPengeluaran = Minyak::where('date', '<=', $endDate)->where('type', 'Pengeluaran')->sum('amount');
                $sisaMinyak = $sisaPemasukan - $sisaPengeluaran;

                return view('admin.laporan.indexminyak', compact('Data', 'totalPemasukan', 'totalPengeluaran', 'sisaMinyak', 'startDate', 'endDate'));
            } elseif ($dataType == '2') {
                $Data = Batubara::whereBetween('date', [$startDate, $endDate])->get();
                $totalRetase = $Data->sum('jumlah_retase');
                $totalBucket = $Data->sum('jumlah_bucket');
                $totalEstimasiTonase = $Data->sum('estimasi_tonase');
                return view('admin.laporan.indexbatubara', compact('Data', 'totalRetase', 'totalBucket', 'totalEstimasiTonase', 'startDate', 'endDate'));
            }
        } catch (\Throwable $th) {
            Alert::error('Error!', 'Masukkan Data Dengan Benar!');
            return redirect()->back();
        }
    }

    public function exportBatubara(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        return Excel::download(new BatubaraExport($startDate, $endDate), 'batubara.xlsx');
    }
    
    public function exportMinyak(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        return Excel::download(new MinyakExport($startDate, $endDate), 'minyak.xlsx');
    }
}
