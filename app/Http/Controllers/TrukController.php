<?php

namespace App\Http\Controllers;

use App\Models\Truk;
use Illuminate\Http\Request;

class TrukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.truk.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Truk $truk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Truk $truk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Truk $truk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Truk $truk)
    {
        //
    }
}
