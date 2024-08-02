<?php

namespace App\Http\Controllers\Admin;

use App\Imports\NilaiImport;
use App\Models\nilai;
use App\Models\Santri;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Storenilai;
use App\Http\Requests\updatenilai;
use App\Models\User;
use Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminNilaiController extends Controller
{
    public function import(Request $request) {
        Excel::import(new NilaiImport(), $request->file('file'));

        return redirect()->back();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $selectedAngkatan = $request->input('angkatan');

        // $query = DB::table('users')
        //     ->join('nilai', 'nilai.user_id', '=', 'users.id')
        //     ->join('santri', 'santri.user_id', '=', 'users.id')
        //     ->select(
        //         'nilai.id as nilai_id',
        //         'users.nama_lengkap',
        //         'santri.jk_santri',
        //         'santri.angkatan_santri',
        //         'nilai.Adab',
        //         'nilai.Aqidah',
        //         'nilai.Akhlak',
        //         'nilai.Fiqih',
        //         'nilai.IT',
        //         'nilai.Hadis',
        //         'nilai.Quran',
        //         'nilai.BahasaArab',
        //         'nilai.BahasaInggris',
        //         'nilai.Public_Speaking'
        //     )
        //     ->where('users.role', 'santri');

        // if ($request->filled('search')) {
        //     $query->where('users.nama_lengkap', 'like', '%' . $request->search . '%');
        // }

        // if ($request->filled('gender')) {
        //     $query->where('santri.jk_santri', $request->gender);
        // }

        // if ($selectedAngkatan) {
        //     $query->where('santri.angkatan_santri', $selectedAngkatan);
        // }

        // $query = $query->orderBy('nama_lengkap', 'asc')->paginate(10);
        // $angkatanList = DB::table('santri')->distinct()->pluck('angkatan_santri');

        $query = Nilai::query();

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

        return view('admin.nilai.index',  [
            'query' => $queryResult,
            'angkatanList' => $angkatanList,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $users = User::where('role', 'santri')->get();
        return view('admin.nilai.tambah', compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nilai = new nilai();

        $nilai->user_id = $request->user_id;
        $nilai->Adab = $request->Adab;
        $nilai->Aqidah = $request->Aqidah;
        $nilai->Akhlak = $request->Akhlak;
        $nilai->Fiqih = $request->Fiqih;
        $nilai->Hadis = $request->Hadis;
        $nilai->IT = $request->IT;
        $nilai->Quran = $request->Quran;
        $nilai->BahasaArab = $request->BahasaArab;
        $nilai->BahasaInggris = $request->BahasaInggris;
        $nilai->Public_Speaking = $request->Public_Speaking;
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

        return view('admin.mutabaah.nilai', compact('adminnilai'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $query = nilai::findOrFail($id);
        $users = User::where('id', $query->user_id)->first();
        return view('admin.nilai.edit', compact('users', 'query'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $nilai = nilai::findOrFail($id);

        $nilai->user_id = $request->user_id;
        $nilai->Adab = $request->Adab;
        $nilai->Aqidah = $request->Aqidah;
        $nilai->Akhlak = $request->Akhlak;
        $nilai->Fiqih = $request->Fiqih;
        $nilai->Hadis = $request->Hadis;
        $nilai->IT = $request->IT;
        $nilai->Quran = $request->Quran;
        $nilai->Bahasaarab = $request->BahasaArab;
        $nilai->Bahasainggris = $request->BahasaInggris;
        $nilai->Public_Speaking = $request->Public_Speaking;

        $nilai->save();
        session()->flash('update', 'Data nilai berhasil diupdate!');
        return redirect()->route('adminnilai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hapus = nilai::findOrFail($id);
        $hapus->delete();
        session()->flash('destroy', 'Data nilai berhasil dihapus!');
        return redirect()->route('adminnilai');
    }
}
