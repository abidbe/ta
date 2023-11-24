<?php

namespace App\Http\Controllers;

use App\Models\Batubara;
use App\Models\DataTruk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class BatubaraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batubaras = Batubara::with('dataTruk')
            ->latest()
            ->filter(request(["search"]))
            ->paginate(10)
            ->withQueryString();
            return view("admin.batubara.index", compact("batubaras"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataTruk = DataTruk::all();
        return view("admin.batubara.create", compact("dataTruk"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'date' => 'required',
                'data_truks_id' => 'required|not_in:Select One--',
            ]);
            Batubara::create([
                'lokasi' => $request->lokasi,
                'driver' => $request->driver,
                'jumlah_retase' => $request->jumlah_retase,
                'jumlah_bucket' => $request->jumlah_bucket,
                'estimasi_tonase' => $request->estimasi_tonase,
                'dt_gendong' => $request->dt_gendong,
                'tujuan' => $request->tujuan,
                'date' => $request->date,
                'data_truks_id' => $request->data_truks_id,
            ]);
            Alert::success('Sukses', 'Data Batu Bara Berhasil Ditambahkan');
            return redirect()->route('batubara.index');
        } catch (\Throwable $th) {
            Alert::error('Ada Kesalahan', 'Data Batubara Gagal Ditambahkan');
            return redirect()->route('batubara.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {   
        $batubara = Batubara::findorfail($id);
        $dataTruk = DataTruk::all();
        return view('admin.batubara.show', compact('batubara','dataTruk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $batubara = Batubara::findorfail($id);
        $dataTruk = DataTruk::all();
        return view('admin.batubara.edit', compact('batubara','dataTruk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'date' => 'required',
                'data_truks_id' => 'not_in:Data Truk',
            ]);
            $batubara = Batubara::findorfail($id);
            $batubara->update([
                'lokasi' => $request->lokasi,
                'driver' => $request->driver,
                'jumlah_retase' => $request->jumlah_retase,
                'jumlah_bucket' => $request->jumlah_bucket,
                'estimasi_tonase' => $request->estimasi_tonase,
                'dt_gendong' => $request->dt_gendong,
                'tujuan' => $request->tujuan,
                'date' => $request->date,
                'data_truks_id' => $request->data_truks_id,
            ]);
            Alert::success('Sukses!','Data Batu Bara Berhasil Diubah');
            return redirect()->route('batubara.index');
        } catch (\Throwable $th) {
            Alert::error('Ada Kesalahan','Data Batu Bara Gagal Diubah');
            return redirect()->route('batubara.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batubara $batubara)
    {
        $batubara->delete();
        Alert::success('Sukses!','Data Batu Bara Berhasil Dihapus');
        return redirect()->route('batubara.index');
    }
}
