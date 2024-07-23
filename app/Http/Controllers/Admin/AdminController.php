<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Santri;
use App\Http\Requests\StoresantriRequest;
use App\Http\Requests\UpdatesantriRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\dashboard;
use Illuminate\Support\Facades\Hash;
use App\Models\Pelanggaran;
use App\Models\Prestasi;
use Illuminate\Support\Facades\DB;




class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function getDatesByMonth($month)
    {
        $prestasiDates = Prestasi::whereMonth('tglprestasi', $month)->pluck('tglprestasi')->toArray();
        $pelanggaranDates = Pelanggaran::whereMonth('tglpelanggaran', $month)->pluck('tglpelanggaran')->toArray();

        return response()->json([
            'prestasiDates' => $prestasiDates,
            'pelanggaranDates' => $pelanggaranDates,
        ]);
    }


    public function getMonthlyData()
    {
        $monthlyData = $this->getMonthlyDataArray();

        return view('admin.chart', [
            'monthlyPrestasi' => $monthlyData['monthlyPrestasi'],
            'monthlyPelanggaran' => $monthlyData['monthlyPelanggaran']
        ]);
    }

    private function getMonthlyDataArray()
    {
        $monthlyPrestasi = Prestasi::selectRaw('MONTH(tglprestasi) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $monthlyPelanggaran = Pelanggaran::selectRaw('MONTH(tglpelanggaran) as month, COUNT(*) as count')
            ->groupBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $monthlyPrestasi = array_replace(array_fill(1, 12, 0), $monthlyPrestasi);
        $monthlyPelanggaran = array_replace(array_fill(1, 12, 0), $monthlyPelanggaran);

        return [
            'monthlyPrestasi' => $monthlyPrestasi,
            'monthlyPelanggaran' => $monthlyPelanggaran
        ];
    }
    public function dashboard(Request $request)
    {
        $genderData = Santri::selectRaw('jk_santri, COUNT(*) as count')
            ->groupBy('jk_santri')
            ->pluck('count', 'jk_santri')
            ->toArray();

        $monthlyData = $this->getMonthlyDataArray();

        $totalSantri = User::where('role', 'santri')->count();
        $totalpelanggaran = Pelanggaran::count();
        $totalprestasi = Prestasi::count();

        return view('admin.dashboard.index', [
            'request' => $request,
            'totalSantri' => $totalSantri,
            'totalpelanggaran' => $totalpelanggaran,
            'totalprestasi' => $totalprestasi,
            'monthlyPrestasi' => $monthlyData['monthlyPrestasi'],
            'monthlyPelanggaran' => $monthlyData['monthlyPelanggaran'],
            'genderData' => $genderData
        ]);
    }

    public function index(Request $request)
    {
        $users = User::where('role', 'santri')->with('santri')->paginate(10);
        // $santris = Santri::where('user_id', $users->id)->paginate(10);

        // $data =  new santri;
        return view('admin.santri.index', compact('users', 'request'));
    }

    public function index2(Request $request)
    {
        $query = User::where('role', 'santri')->with('santri');
    
        if ($request->has('search_name')) {
            $query->where('nama_lengkap', 'like', '%' . $request->search_name . '%');
        }
    
        if ($request->has('filter_gender') && $request->filter_gender != '') {
            $query->whereHas('santri', function ($q) use ($request) {
                $q->where('jk_santri', $request->filter_gender);
            });
        }
    
        if ($request->has('filter_angkatan') && $request->filter_angkatan != '') {
            $query->whereHas('santri', function ($q) use ($request) {
                $q->where('angkatan_santri', $request->filter_angkatan);
            });
        }
    
        $users = $query->paginate(10);
    
        // Fetch unique angkatan values
        $angkatans = Santri::distinct()->pluck('angkatan_santri')->sort()->values();
    
        return view('admin.santri.index2', compact('users', 'angkatans'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $sortBy = $request->input('sort_by', 'nama_santri'); // Default sort by name
        $sortOrder = $request->input('sort_order', 'asc'); // Default sort order ascending

        $santris = Santri::where('nama_santri', 'LIKE', "%{$query}%")
            ->orWhere('angkatan_santri', 'LIKE', "%{$query}%")
            ->orWhere('tgllahir_santri', 'LIKE', "%{$query}%")
            ->orderBy($sortBy, $sortOrder)
            ->get();

        $count = $santris->count();

        return response()->json([
            'santris' => $santris,
            'count' => $count
        ]);
    }


    public function create()
    {
        $query = Santri::all();
        return view('admin.santri.tambah', compact('query'));
    }

    public function deleteAll()
    {
        Santri::truncate();

        return response()->json([
            'message' => 'Semua data santri berhasil dihapus!'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        // $request->validate([
        //     'nama_lengkap' => 'required|string|max:255',
        //     'username' => 'required|string|max:255|unique:users',
        //     'email' => 'required|email|max:255|unique:users',
        //     'password' => 'required|string|min:8|confirmed',
        //     'jk_santri' => 'required|in:Ikhwan,Akhwat',
        //     'angkatan_santri' => 'required|string|max:255',
        //     'tgllahir_santri' => 'required|date',
        //     'domisili_santri' => 'required|string|max:255',
        //     'alamat_santri' => 'required|string|max:255',
        //     'photo_santri' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // Buat instance User baru
        $user = new User();
        $user->username = $request->username;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = 'santri'; // Pastikan untuk menetapkan peran pengguna
        $user->save();

        // Buat instance Santri baru dengan user_id dari pengguna yang baru disimpan
        $santri = new Santri();
        $santri->user_id = $user->id; // Menggunakan ID pengguna yang baru disimpan
        $santri->jk_santri = $request->jk_santri;
        $santri->angkatan_santri = $request->angkatan_santri;
        $santri->tgllahir_santri = $request->tgllahir_santri;
        $santri->alamat_santri = $request->alamat_santri;

        if ($request->photo_santri) {
            $foto_santri = $request->photo_santri;
            $name_foto = $foto_santri->getClientOriginalName();
            $foto_santri->move(public_path() . '/storage/images', $name_foto);

            $santri->photo_santri = $name_foto;
        }
        
        // Simpan data santri
        $santri->save();

        // Redirect dengan pesan sukses
        session()->flash('add', 'Data berhasil ditambahkan!');
        return redirect()->route('adminsantri');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $santri = Santri::findOrFail($id);


        return view('admin.santri.detail', compact('santri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit = Santri::findOrFail($id);
        return view('admin.santri.edit', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $santri = Santri::findOrFail($id);
        $user = User::findOrFail($santri->user_id);
        $user->username = $request->username;
        $user->nama_lengkap = $request->nama_santri;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $santri->jk_santri = $request->jk_santri;
        $santri->angkatan_santri = $request->angkatan_santri;
        $santri->tgllahir_santri = $request->tgllahir_santri;
        $santri->alamat_santri = $request->alamat_santri;
        
        if ($request->photo_santri) {
            $foto_santri = $request->photo_santri;
            $name_foto = $foto_santri->getClientOriginalName();
            $foto_santri->move(public_path() . '/storage/images', $name_foto);

            $santri->photo_santri = $name_foto;
        }

        $santri->save();
        session()->flash('update', 'Data berhasil diupdate!');
        return redirect()->route('adminsantri');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $hapus = User::findOrFail($id);
        $hapus->delete();

        session()->flash('destroy', 'Data Santri berhasil dihapus!');
        return back();
    }
}
