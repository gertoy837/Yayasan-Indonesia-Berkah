<?php

namespace App\Http\Controllers\Admin;

use App\Models\nilai;
use App\Http\Requests\Storenilai;
use App\Http\Requests\updatenilai;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
                // $data =  new nilai;
                $query = nilai::all();
                return view ('admin.nilai.index',compact('request','query'));
    }

    /**
     * Show the form for creating a new resource.
     */ 
    public function create(Request $request)
    {
        $query = nilai::all();
        return view('admin.nilai.tambah',compact('query'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nilai = new nilai();
        $test = 1;

        $nilai->namasantri = $request->namasantri;
        $nilai->Fiqih = $request->Fiqih;
        $nilai->Hadis = $request->Hadis;
        $nilai->IT = $request->IT;
        $nilai->Quran = $request->Quran;
        $nilai->BahasaArab = $request->BahasaArab;
        $nilai->BahasaInggris = $request->BahasaInggris;
        $nilai->Polygon = $request->Polygon;
       
        $nilai->save();

        session()->flash('add', 'Data nilai berhasil ditambahkan!');
        return redirect()->route('adminnilai');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $nilai = nilai::findOrFail($id);
        

        return view('admin.mutabaah.nilai',compact('adminnilai'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit = nilai::findOrFail($id);
        $query = nilai::all();
        return view ('admin.nilai.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $nilai = nilai::findOrFail($id);

        $nilai->namasantri = $request->namasantri;
        $nilai->Fiqih = $request->Fiqih;
        $nilai->Hadis = $request->Hadis;
        $nilai->IT = $request->IT;
        $nilai->Quran = $request->Quran;
        $nilai->Bahasaarab = $request->BahasaArab;
        $nilai->Bahasainggris = $request->BahasaInggris;
        $nilai->Polygon = $request->Polygon;

        $nilai->save();
        session()->flash('update', 'Data nilai berhasil diupdate!');
        return redirect()->route('adminnilai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hapus =nilai ::findOrFail($id);
        $hapus->delete();
        session()->flash('destroy', 'Data nilai berhasil dihapus!');
        return redirect()->route('adminnilai');
    }
}
