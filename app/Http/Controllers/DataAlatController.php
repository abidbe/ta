<?php

namespace App\Http\Controllers;

use App\Models\DataAlat;
use Illuminate\Http\Request;

class DataAlatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dataAlat');
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
    public function show(DataAlat $dataAlat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataAlat $dataAlat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataAlat $dataAlat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataAlat $dataAlat)
    {
        //
    }
}
