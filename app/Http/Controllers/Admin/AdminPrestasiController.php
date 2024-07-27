<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\prestasi;
use App\Http\Requests\StoreprestasiRequest;
use App\Http\Requests\UpdateprestasiRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Santri;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PrestasiImport;

class AdminPrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Prestasi::query();
    
        // Filter berdasarkan gender
        if ($request->has('gender') && !empty($request->input('gender'))) {
            $query->whereHas('user.santri', function($query) use ($request) {
                $query->where('jk_santri', $request->input('gender'));
            });
        }
    
        // Filter berdasarkan angkatan
        if ($request->has('angkatan') && !empty($request->input('angkatan'))) {
            $query->whereHas('user.santri', function($query) use ($request) {
                $query->where('angkatan_santri', $request->input('angkatan'));
            });
        }
    
        // Pencarian berdasarkan nama santri
        if ($request->has('search_name') && !empty($request->input('search_name'))) {
            $query->whereHas('user.santri', function($query) use ($request) {
                $query->where('nama_lengkap', 'like', '%' . $request->input('search_name') . '%');
            });
        }
    
        $query = $query->get();
        
        // Ambil daftar angkatan untuk filter
        $angkatanList = Santri::distinct()->pluck('angkatan_santri');
    
        return view('admin.prestasi.index', compact('query', 'angkatanList'));
    }
    

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $query = Prestasi::with('Santri')->get();
        $users = User::where('role', 'santri')->get();
        return view('admin.prestasi.tambah', compact('users'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        // Lakukan impor menggunakan PrestasiImport
        Excel::import(new PrestasiImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data Prestasi Imported Successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::where('nama_lengkap', $request->nama_lengkap)->first();

        $prestasi = new Prestasi();
        $prestasi->user_id = $user->id;
        $prestasi->nama_prestasi = $request->nama_prestasi;
        $prestasi->kategori_prestasi = $request->kategori_prestasi;
        $prestasi->keterangan_prestasi = $request->keterangan_prestasi;
        $prestasi->tglprestasi = $request->tglprestasi;

        $prestasi->save();
        session()->flash('add', 'Data Prestasi berhasil ditambahkan!');
        return redirect()->route('adminprestasi');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        return view('admin.prestasi.detail', compact('prestasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Prestasi::findOrFail($id);
        $users = User::where('role', 'santri')->get();
        return view('admin.prestasi.edit', compact('data', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $prestasi->user_id = $request->santri_id; // update the santri_id field
        $prestasi->nama_prestasi = $request->nama_prestasi;
        $prestasi->kategori_prestasi = $request->kategori_prestasi;
        $prestasi->tglprestasi = $request->tglprestasi;
        $prestasi->keterangan_prestasi = $request->keterangan_prestasi;

        $prestasi->save();
        session()->flash('update', 'Data prestasi berhasil diupdate!');
        return redirect()->route('adminprestasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hapus = prestasi::findOrFail($id);
        $hapus->delete();
        session()->flash('destroy', 'Data prestasi berhasil dihapus!');
        return redirect()->route('adminprestasi');
    }
}
