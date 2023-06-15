<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;
class ChildController extends Controller
{
    public function index()
    {
       $childs = Child::orderBy('created_at','DESC')->get();
       return view('layouts.children.index',compact('childs'));

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
        Child::create($request->all());
        return redirect()->route('dataanak.index')->with('success','Tambah Data Ibu Berhasil');
    
    }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     // dd($id);
    //     $mothers = Mothers::findOrFail($id);
    //     $mothers->update($request->all());

    //     return redirect()->route('dataibu.index')->with('successUpdate','Update Data Ibu Berhasil');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    public function destroy(string $id)
    {
        $childs = child::findOrFail($id);
        $childs->delete();
        return redirect()->route('dataanak.index')->with('successDelete','Hapus Data Ibu Berhasil');
    }

}