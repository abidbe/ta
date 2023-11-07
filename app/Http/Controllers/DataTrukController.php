<?php

namespace App\Http\Controllers;

use App\Models\DataTruk;
use Illuminate\Http\Request;

class DataTrukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dataTruk');
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
    public function show(DataTruk $dataTruk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataTruk $dataTruk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataTruk $dataTruk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataTruk $dataTruk)
    {
        //
    }
}
