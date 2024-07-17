<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Santri;
use App\Http\Requests\StoresantriRequest;
use App\Http\Requests\UpdatesantriRequest;
use Illuminate\Http\Request;
use App\Models\dashboard;
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

        $totalSantri = Santri::count();
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
        $query = Santri::all();
        $santris = Santri::paginate(10);

        // $data =  new santri;
        return view ('admin.santri.index',compact('request','query','santris'));
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
        return view('admin.santri.tambah',compact('query'));
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
        $request->validate([
            'nama_santri' => 'required|string|max:255',
            'jk_santri' => 'required|in:Ikhwan,Akhwat',
            'angkatan_santri' => 'required|string|max:255',
            'tgllahir_santri' => 'required|date',
            'domisili_santri' => 'required|string|max:255',
            'alamat_santri' => 'required|string|max:255',
            // 'photo_santri' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Buat instance Santri baru
        $santri = new Santri();
        $santri->nama_santri = $request->nama_santri;
        $santri->jk_santri = $request->jk_santri;
        $santri->angkatan_santri = $request->angkatan_santri;
        $santri->tgllahir_santri = $request->tgllahir_santri;
        $santri->domisili_santri = $request->domisili_santri;
        $santri->alamat_santri = $request->alamat_santri;

        // Cek apakah memilih avatar default
        if ($request->has('avatar_choice')) {
            $santri->photo_santri = $request->avatar_choice;
        } elseif ($request->hasFile('photo_santri')) {
            // Jika tidak memilih avatar default, lakukan upload foto
            $image = $request->file('photo_santri');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/images'), $image_name);
            $santri->photo_santri = $image_name;
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
        

        return view('admin.santri.detail',compact('santri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $edit = Santri::findOrFail($id);
        $query = Santri::all();
        return view ('admin.santri.edit',compact('edit','query','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $filePath = public_path('storage/images');
        $santri = Santri::findOrFail($id); 
        $santri->nama_santri = $request->nama_santri;
        $santri->jk_santri = $request->jk_santri;
        $santri->angkatan_santri = $request->angkatan_santri;
        $santri->tgllahir_santri = $request->tgllahir_santri;
        $santri->domisili_santri = $request->domisili_santri;
        $santri->alamat_santri = $request->alamat_santri;
        $santri->photo_santri = $request->photo_santri;
       
         
        // SAVE IMAGE
        
        if ($request->hasFile('photo_santri')){
            $image = $request->file('photo_santri');
            $text = $image->getClientOriginalExtension();
            $image_name = time() .".". $text;
            $image->move('storage/images',$image_name);

            $santri->photo_santri = $image_name;
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
        $hapus = santri::findOrFail($id);
        $hapus->delete();
        
        session()->flash('destroy', 'Data Santri berhasil dihapus!');
        return back();
    }
}
