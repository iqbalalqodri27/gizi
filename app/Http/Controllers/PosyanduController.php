<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posyandu;
use App\Models\Child;
class PosyanduController extends Controller
{
    public function index()
    {
       $posyandus = Posyandu::with('Child')->get();
       $children = Child::orderBy('created_at','DESC')->get();

       return view('layouts.posyandus.index',compact('posyandus','children'));

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
            // dd($request->created_at);

            $timestamp = strtotime($request->created_at);

            $month = date('m', $timestamp);

            $posyandu = Posyandu::where('child_id', $request->child_id)
            ->whereMonth('created_at', '=', $month)
            ->whereYear('created_at', '=', $request->created_at)
            ->exists();

        if ($posyandu) 
        {
            
            return redirect()->route('dataposyandu.index')->with('CekData','Data Anak Di bulan Tersebut Sudah Ada !!');

         }
         else{
            Posyandu::create($request->all());
            return redirect()->route('dataposyandu.index')->with('success','Tambah Data Posyandu Berhasil');
         }
    
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
        $posyandu = Posyandu::findOrFail($id);
        $posyandu->update($request->all());

        return redirect()->route('dataposyandu.index')->with('successUpdate','Update Data Posyandu Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Posyandu = Posyandu::findOrFail($id);
        $Posyandu->delete();
        return redirect()->route('dataposyandu.index')->with('successDelete','Hapus Data Posyandu Berhasil');
    }
}
