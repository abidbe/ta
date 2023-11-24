<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id', 'asc')->latest()->where('id', '!=', '1')->filter(request(['search']))->paginate(10)->withQueryString();
        return view('admin.user.index', compact('users'));
    }
    //untuk menjadikan admin
    public function makeadmin(User $user)
    {
        $user->timestamps = false;
        $user->is_admin = true;
        $user->save();
        Alert::success('Sukses!', 'Data ini sekarang jadi admin!');
        return back()->with('success', 'Make admin successfully!');
    }
    //untuk menjadikan user
    public function removeadmin(User $user)
    {
        if ($user->id != 1) {
            $user->timestamps = false;
            $user->is_admin = false;
            $user->save();
            Alert::success('Sukses!', 'Data ini sekarang jadi user!');
            return back()->with('success', 'Remove admin successfully!');
        } else {
            Alert::error('Gagal!', 'Admin tidak bisa diubah!');
            return redirect()->route('user.index');
        }
    }
    public function destroy(User $user)
    {
        
        if ($user->id != 1) {
            $user->delete();
            Alert::success('Sukses!', 'Data user berhasil dihapus!');
            return back();
        } else {
            Alert::error('Gagal!', 'Admin tidak bisa dihapus!');
            return redirect()->route('user.index');
        }
    }
}
