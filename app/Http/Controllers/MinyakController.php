<?php

namespace App\Http\Controllers;

use App\Models\DataAlat;
use App\Models\DataTruk;
use App\Models\Minyak;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class MinyakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ambil data minyak dan search serta pagination
        $minyaks = Minyak::with('dataAlat', 'dataTruk')
            ->latest()
            ->filter(request(["search"]))
            ->paginate(10)
            ->withQueryString();

        // saldo minyak
        $totalPemasukan = Minyak::Pemasukan()->sum('amount');
        $totalPengeluaran = Minyak::Pengeluaran()->sum('amount');
        $saldoMinyak = $totalPemasukan - $totalPengeluaran;

        return view('admin.minyak.index', compact('minyaks', 'saldoMinyak', 'totalPemasukan', 'totalPengeluaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataAlat = DataAlat::all();
        $dataTruk = DataTruk::all();

        return view('admin.minyak.create', compact('dataAlat', 'dataTruk'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'type' => 'required|not_in:Select One--',
                'data_alats_id' => 'not_in:Data Alat',
                'data_truks_id' => 'not_in:Data Truk',
            ]);
            Minyak::create([
                'type' => $request->type,
                'amount' => $request->amount,
                'keterangan' => ucfirst($request->keterangan),
                'date' => $request->date,
                'data_alats_id' => $request->data_alats_id,
                'data_truks_id' => $request->data_truks_id,
            ]);

            Alert::success('Sukses!', 'Data minyak berhasil ditambahkan!');
            return redirect()->route('minyak.index');
        } catch (\Exception $e) {
            Alert::error('Ada data kosong!', 'Periksa kembali data yang anda masukkan!');
            return redirect()->route('minyak.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $minyak = Minyak::findOrFail($id);
        return view('admin.minyak.show', compact('minyak'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $minyak = Minyak::findOrFail($id);
        $dataAlat = DataAlat::all();
        $dataTruk = DataTruk::all();
        return view('admin.minyak.edit', compact('minyak', 'dataAlat', 'dataTruk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'type' => 'required',
                'amount' => 'required',
                'date' => 'required|date',
            ]);

            $minyak = Minyak::findOrFail($id);

            $minyak->update([
                'type' => $request->type,
                'amount' => $request->amount,
                'date' => $request->date,
                'keterangan' => ucfirst($request->keterangan),
                'data_alats_id' => $request->data_alats_id,
                'data_truks_id' => $request->data_truks_id,
            ]);

            Alert::success('Sukses!', 'Data minyak berhasil diubah!');
            return redirect()->route('minyak.index');
        } catch (\Exception $exception) {
            Alert::error('Ada data kosong!', 'Periksa kembali data yang anda masukkan!');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Minyak $minyak)
    {
        $minyak->delete();
        Alert::success('Sukses!', 'Data minyak berhasil dihapus');
        return redirect()->route('minyak.index');
    }
}
