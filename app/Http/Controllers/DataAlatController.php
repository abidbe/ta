<?php

namespace App\Http\Controllers;

use App\Models\DataAlat;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DataAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(request('search'));

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
                'name' => 'required|max:50',
                'year' => 'nullable|numeric|digits:4',
                'kondisi' => 'max:50',
                'keterangan' => 'max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            // dd($request->all());
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
        $dataAlat = DataAlat::findorfail($id);
        return view('admin.dataAlat.show', compact('dataAlat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $datAl = DataAlat::findorfail($id);
        return view('admin.dataAlat.edit', compact('datAl'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required|max:50',
                'year' => 'nullable|numeric|digits:4',
                'kondisi' => 'max:50',
                'keterangan' => 'max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
            // dd($request->all());
            if ($request->hasFile('image')) {
                $imageName = time() . '.' . $request->image->extension();
                $request->image->storeAs('public/potoAlat', $imageName);
            } else {
                $imageName = null;
            }
            $datAl = DataAlat::findorfail($id);
            $datAl->update([
                'name' => ucfirst($request->name),
                'year' => $request->year,
                'kondisi' => $request->kondisi,
                'keterangan' => ucfirst($request->keterangan),
            ]);
            Alert::success('Sukses!', 'Data alat berat berhasil diubah');
            return redirect()->route('dataalat.index');
        } catch (\Throwable $th) {
            Alert::error('Error!', 'Data alat berat gagal diubah');
            return redirect()->route('dataalat.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {   
        $datAl = DataAlat::findorfail($id);
        $datAl->delete();
        Alert::success('Sukses!', 'Data alat berat berhasil dihapus');
        return redirect()->route('dataalat.index');
    }
}
