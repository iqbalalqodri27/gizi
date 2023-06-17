<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posyandu;
class PosyanduController extends Controller
{
    public function index()
    {
       $posyandus = Posyandu::orderBy('created_at','DESC')->get();
       return view('layouts.posyandus.index',compact('posyandus'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.mothers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Mothers::create($request->all());
        return redirect()->route('dataibu.index')->with('success','Tambah Data Ibu Berhasil');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($id);
        $mothers = Mothers::findOrFail($id);
        $mothers->update($request->all());

        return redirect()->route('dataibu.index')->with('successUpdate','Update Data Ibu Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mothers = Mothers::findOrFail($id);
        $mothers->delete();
        return redirect()->route('dataibu.index')->with('successDelete','Hapus Data Ibu Berhasil');
    }
}
