<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\prestasi;
use App\Http\Requests\StoreprestasiRequest;
use App\Http\Requests\UpdateprestasiRequest;
use Illuminate\Http\Request;
use App\Models\Santri;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PrestasiImport;

class AdminPrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Prestasi::all();
        return view('admin.prestasi.index', compact('query'));
    }

    /** 
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $query = Prestasi::with('Santri')->get();
        $querysantri = Santri::all();
        return view('admin.prestasi.tambah', compact('query','querysantri'));
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
        $validated = $request->validate([
            'santri_id' => 'required|exists:santris,id',
            'nama_prestasi' => 'required|string|max:255',
            'kategori_prestasi' => 'required|string|max:255',
            'keterangan_prestasi' => 'required|string',
            'tglprestasi' => 'required|date_format:Y-m-d',
        ]);

        $santri = Santri::findOrFail($validated['santri_id']);

        $prestasi = new Prestasi();
        $prestasi->santri_id = $request->santri_id;
        $prestasi->nama_prestasi = $request->nama_prestasi;
        $prestasi->kategori_prestasi = $request->kategori_prestasi;
        $prestasi->keterangan_prestasi = $request->keterangan_prestasi;
        $prestasi->tglprestasi = $request->tglprestasi;
        $prestasi->santri_id = $santri->id;

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
        $edit = Prestasi::findOrFail($id);
        $query = Prestasi::with('Santri')->get();
        $querysantri = Santri::all();
        return view('admin.prestasi.edit', compact('edit', 'query', 'querysantri'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $prestasi->santri_id = $request->santri_id; // update the santri_id field
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
