<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\pelanggaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Santri;
use Illuminate\Support\Facades\DB;
use App\Imports\PelanggaranImport;
use Excel;

class AdminPelanggaranController extends Controller
{
    public function import(Request $request) {
        Excel::import(new PelanggaranImport(), $request->file('file'));

        return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = pelanggaran::query();

        // Filter berdasarkan gender
        if ($request->filled('gender')) {
            $gender = $request->input('gender');
            $query->whereHas('user.santri', function ($q) use ($gender) {
                $q->where('jk_santri', $gender);
            });
        }

        // Filter berdasarkan angkatan
        if ($request->filled('angkatan')) {
            $angkatan = $request->input('angkatan');
            $query->whereHas('user.santri', function ($q) use ($angkatan) {
                $q->where('angkatan_santri', $angkatan);
            });
        }

        // Pencarian berdasarkan nama santri
        if ($request->filled('search_name')) {
            $searchName = $request->input('search_name');
            $query->whereHas('user.santri', function ($q) use ($searchName) {
                $q->where('nama_lengkap', 'like', '%' . $searchName . '%');
            });
        }

        // Ambil data pelanggaran
        $queryResult = $query->paginate(10);

        // Ambil daftar angkatan untuk dropdown
        $angkatanList = santri::distinct()->pluck('angkatan_santri');

        // Cek jika data kosong
        $dataKosong = $queryResult->isEmpty();

        return view('admin.pelanggaran.index', [
            'query' => $queryResult,
            'angkatanList' => $angkatanList,
            'dataKosong' => $dataKosong
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $query = Pelanggaran::with('Santri')->get();
        $users = User::where('role', 'santri')->get();
        return view('admin.pelanggaran.tambah', compact('users'));
    }

    public function store(Request $request)
    {
        $pelanggaran = new Pelanggaran();

        // Atur atribut-atribut pelanggaran
        $pelanggaran->user_id = $request->santri_id; // Contoh jika Anda menyimpan nama santri juga
        $pelanggaran->nama_pelanggaran = $request->nama_pelanggaran;
        $pelanggaran->kategori_pelanggaran = $request->kategori_pelanggaran;
        $pelanggaran->deskripsi_pelanggaran = $request->deskripsi_pelanggaran;
        $pelanggaran->tglpelanggaran = $request->tglpelanggaran;

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

        return view('admin.pelanggaran.detail', compact('pelanggaran'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $datas = Pelanggaran::findOrFail($id);
        return view('admin.pelanggaran.edit', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pelanggaran = pelanggaran::findOrFail($id);
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
