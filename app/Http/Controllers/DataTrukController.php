<?php

namespace App\Http\Controllers;

use App\Models\DataTruk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DataTrukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataTruks = DataTruk::latest()->filter(request(['search']))->paginate(10)->withQueryString();
        return view('admin.dataTruk.index', compact('dataTruks'));
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
                'nopol' => 'required|unique:data_truks|max:50',
                'year' => 'nullable|numeric|digits:4',
                'kondisi' => 'max:50',
                'keterangan' => 'max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/potoTruk', $imageName);
            } else {
                $imageName = null;
            }

            DataTruk::create([
                'nopol' => strtoupper($request->nopol),
                'year' => $request->year,
                'kondisi' => ucfirst($request->kondisi),
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
        $dataTruk = DataTruk::findOrFail($id);
        return view('admin.dataTruk.show', compact('dataTruk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataTruk = DataTruk::findOrFail($id);
        return view('admin.dataTruk.edit', compact('dataTruk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nopol' => 'required|max:50|unique:data_truks,nopol,' . $id,
                'year' => 'nullable|numeric|digits:4',
                'kondisi' => 'max:50',
                'keterangan' => 'max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $dataTruk = DataTruk::findOrFail($id);

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/potoTruk', $imageName);
                if ($dataTruk->image) {
                    Storage::delete('public/potoTruk/' . $dataTruk->image);
                }
            } else {
                $imageName = $dataTruk->image;
            }

            $dataTruk->update([
                'nopol' => strtoupper($request->nopol),
                'year' => $request->year,
                'kondisi' => ucfirst($request->kondisi),
                'keterangan' => ucfirst($request->keterangan),
                'image' => $imageName,
            ]);

            Alert::success('Sukses!', 'Data truk berhasil diubah');
            return redirect()->route('datatruk.index');
        } catch (\Throwable $th) {
            Alert::error('Error!', 'Data truk gagal diubah');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $dataTruk = DataTruk::findOrFail($id);
            if ($dataTruk->image) {
                Storage::delete('public/potoTruk/' . $dataTruk->image);
            }
            $dataTruk->delete();
            Alert::success('Sukses!', 'Data truk berhasil dihapus!');
        } catch (\Throwable $th) {
            Alert::error('Error!', 'Data truk gagal dihapus!');
        }
        return redirect()->route('datatruk.index');
    }
}
