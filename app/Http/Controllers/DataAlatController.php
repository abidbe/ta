<?php

namespace App\Http\Controllers;

use App\Models\DataAlat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class DataAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataAlats = DataAlat::latest()->filter(request(['search']))->paginate(10)->withQueryString();
        return view('admin.dataAlat.index', compact('dataAlats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.dataAlat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|unique:data_alats|max:50',
                'year' => 'nullable|numeric|digits:4',
                'kondisi' => 'max:50',
                'keterangan' => 'max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/potoAlat', $imageName);
            } else {
                $imageName = null;
            }

            DataAlat::create([
                'name' => ucfirst($request->name),
                'year' => $request->year,
                'kondisi' => $request->kondisi,
                'keterangan' => ucfirst($request->keterangan),
                'image' => $imageName,
            ]);

            Alert::success('Hore!', 'Data alat berat sudah ditambahkan!');
            return redirect()->route('dataalat.index')->with('image', $imageName);
        } catch (\Throwable $th) {
            Alert::error('Error!', 'Cek lagi data anda!');
            return redirect()->route('dataalat.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $dataAlat = DataAlat::findOrFail($id);
        return view('admin.dataAlat.show', compact('dataAlat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataAlat = DataAlat::findOrFail($id);
        return view('admin.dataAlat.edit', compact('dataAlat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|max:50|unique:data_alats,name,' . $id,
                'year' => 'nullable|numeric|digits:4',
                'kondisi' => 'max:50',
                'keterangan' => 'max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $dataAlat = DataAlat::findOrFail($id);

            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/potoAlat', $imageName);
                // Hapus gambar lama jika ada
                if ($dataAlat->image) {
                    Storage::delete('public/potoAlat/' . $dataAlat->image);
                }
            } else {
                $imageName = $dataAlat->image;
            }

            $dataAlat->update([
                'name' => ucfirst($request->name),
                'year' => $request->year,
                'kondisi' => $request->kondisi,
                'keterangan' => ucfirst($request->keterangan),
                'image' => $imageName,
            ]);

            Alert::success('Sukses!', 'Data alat berat berhasil diubah');
            return redirect()->route('dataalat.index');
        } catch (\Throwable $th) {
            Alert::error('Error!', 'Data alat berat gagal diubah');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $dataAlat = DataAlat::findOrFail($id);
            if ($dataAlat->image) {
                Storage::delete('public/potoAlat/' . $dataAlat->image);
            }
            $dataAlat->delete();
            Alert::success('Sukses!', 'Data alat berat berhasil dihapus');
        } catch (\Throwable $th) {
            Alert::error('Error!', 'Data alat berat gagal dihapus');
        }
        return redirect()->route('dataalat.index');
    }
}
