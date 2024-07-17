<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Santri;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PelanggaranImport;

class AdminPelanggaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {  
        $query = pelanggaran::all();
        return view('admin.pelanggaran.index',compact('query'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $query = Pelanggaran::with('Santri')->get();
        $querysantri = Santri::all();
        return view('admin.pelanggaran.tambah',compact('query','querysantri'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new PelanggaranImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data Pelanggaran Imported Successfully');
    }
    public function store(Request $request)
{

    // Ambil id santri dari request (misalnya dari form input)
    // $santri = $request->input('santri_id');

    $validated = $request->validate([
        'santri_id' => 'required|exists:santris,id',
    ]);

    // Buat instance model Pelanggaran
    $pelanggaran = new Pelanggaran();
    $santri = Santri::findOrFail($validated['santri_id']);

    // Atur atribut-atribut pelanggaran
    $pelanggaran->santri_id = $request->santri_id; // Contoh jika Anda menyimpan nama santri juga
    $pelanggaran->nama_pelanggaran = $request->nama_pelanggaran;
    $pelanggaran->kategori_pelanggaran = $request->kategori_pelanggaran;
    $pelanggaran->deskripsi_pelanggaran = $request->deskripsi_pelanggaran;
    $pelanggaran->tglpelanggaran = $request->tglpelanggaran;

    // Atur santri_id

    // Simpan data
    $pelanggaran->save();

    session()->flash('add', 'Data Pelanggaran berhasil ditambahkan!');
    return redirect()->route('adminpelanggaran');
}


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pelanggaran = pelanggaran::findOrFail($id);

        return view('admin.pelanggaran.detail',compact('pelanggaran'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit = pelanggaran::findOrFail($id);
        $query = Pelanggaran::with('Santri')->get();
        $querysantri = Santri::all();
        return view ('admin.pelanggaran.edit',compact('edit','query','querysantri'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pelanggaran = pelanggaran::findOrFail($id); 
        $pelanggaran->santri_id = $request->santri_id;
        $pelanggaran->nama_pelanggaran = $request->nama_pelanggaran;
        $pelanggaran->tglpelanggaran = $request->tglpelanggaran;
        $pelanggaran->kategori_pelanggaran = $request->kategori_pelanggaran;
        $pelanggaran->deskripsi_pelanggaran = $request->deskripsi_pelanggaran;

        $pelanggaran->save();
        session()->flash('update', 'Data pelanggaran berhasil diupdate!');
        return redirect()->route('adminpelanggaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hapus = pelanggaran::findOrFail($id);
        $hapus->delete();
        session()->flash('destroy', 'Data pelanggaran berhasil dihapus!');
        return redirect()->route('adminpelanggaran');
    }
}
