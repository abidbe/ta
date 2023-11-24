<?php

namespace App\Http\Controllers;

use App\Models\DataTruk;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataTrukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataTruks = DataTruk::latest()->filter(request(['search']))->paginate(10)->withQueryString();
        return view('admin.dataTruk.index', [
            'dataTruks' => $dataTruks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dataTruk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nopol' => 'required|max:50',
                'year' => 'nullable|numeric|digits:4',
                'kondisi' => 'max:50',
                'keterangan' => 'max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            // ddd($request->all());

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/potoTruk', $imageName);
            } else {
                $imageName = null;
            }
            DataTruk::create([
                'nopol' => ucfirst($request->nopol),
                'year' => $request->year,
                'kondisi' => $request->kondisi,
                'keterangan' => ucfirst($request->keterangan),
                'image' => $imageName,
            ]);

            Alert::success('Sukses!', 'Data truk berhasil ditambahkan!');
            return redirect()->route('datatruk.index')->with('image', $imageName);
        } catch (\Throwable $th) {
            Alert::error('Error!', 'Data truk gagal ditambahkan!');
            return redirect()->route('datatruk.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dataTruk = DataTruk::findorfail($id);
        return view('admin.dataTruk.show', compact('dataTruk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataTruk = DataTruk::findorfail($id);
        return view('admin.dataTruk.edit', compact('dataTruk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nopol' => 'required|max:50',
                'year' => 'nullable|numeric|digits:4',
                'kondisi' => 'max:50',
                'keterangan' => 'max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            // dd($request->all());
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/potoTruk', $imageName);
            } else {
                $imageName = null;
            }
            $dataTruk = DataTruk::findorfail($id);
            $dataTruk->update([
                'nopol' => ucfirst($request->nopol),
                'year' => $request->year,
                'kondisi' => $request->kondisi,
                'keterangan' => ucfirst($request->keterangan),
            ]);
            Alert::success('Sukses!', 'Data truk berhasil diubah');
            return redirect()->route('datatruk.index');
        } catch (\Throwable $th) {
            Alert::error('Error!', 'Data truk gagal diubah');
            return redirect()->route('datatruk.edit');
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $dataTruk = DataTruk::findorfail($id);
        $dataTruk->delete();
        Alert::success('Sukses!', 'Data truk berhasil dihapus!');
        return redirect()->route('datatruk.index');
    }
}
