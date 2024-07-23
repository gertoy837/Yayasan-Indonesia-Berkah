<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mutabaah;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminMutabaahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil filter dari request
        $searchName = $request->input('search_name');
        $selectedGender = $request->input('gender');
        $selectedAngkatan = $request->input('angkatan');

        // Query santri dengan filter
        $query = DB::table('users')
            ->join('santri', 'santri.user_id', '=', 'users.id')
            ->where('users.role', 'santri')
            ->orderBy('nama_lengkap', 'asc');

        // Filter berdasarkan nama
        if ($searchName) {
            $query->where('users.nama_lengkap', 'like', '%' . $searchName . '%');
        }

        // Filter berdasarkan gender
        if ($selectedGender) {
            $query->where('santri.jk_santri', $selectedGender);
        }

        // Filter berdasarkan angkatan
        if ($selectedAngkatan) {
            $query->where('santri.angkatan_santri', $selectedAngkatan);
        }

        // Ambil data santri
        $santri = $query->get();


        // Check if any data was found
        $dataFound = $santri->isNotEmpty();

        // Ambil daftar angkatan untuk filter
        $angkatanList = DB::table('santri')->distinct()->pluck('angkatan_santri');

        return view('admin.mutabaah.index', compact('santri', 'angkatanList', 'dataFound'));
    }

    public function detail(Request $request, $id)
    {
        $users = User::where('role', 'santri')->where('id', $id)->get();
        $years = DB::table('mutabaah')
            ->where('user_id', $id)
            ->select(DB::raw('YEAR(tanggal) as year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        $currentYear = date('Y');
        $currentMonth = date('n');

        $selectedYear = $request->input('tahun', $currentYear);

        $months = $this->getMonthsForYear($id, $selectedYear);

        $selectedMonth = $request->input('bulan', $currentMonth);

        // If the selected year is the current year and no month is explicitly selected,
        // default to the current month
        if ($selectedYear == $currentYear && !$request->has('bulan')) {
            $selectedMonth = $currentMonth;
        } elseif (!$request->has('bulan') && $months->isNotEmpty()) {
            // If it's not the current year and no month is selected, use the latest available month
            $selectedMonth = $months->max('month');
        }

        $query = DB::table('mutabaah')
            ->join('users', 'mutabaah.user_id', '=', 'users.id')
            ->select('mutabaah.*', 'users.nama_lengkap')
            ->where('users.role', 'santri')
            ->where('mutabaah.user_id', $id)
            ->whereYear('mutabaah.tanggal', $selectedYear)
            ->orderBy('tanggal', 'asc');

        if ($selectedMonth) {
            $query->whereMonth('mutabaah.tanggal', $selectedMonth);
        }

        $mutabaah = $query->get();

        return view('admin.mutabaah.detail', compact('users', 'mutabaah', 'months', 'years', 'selectedYear', 'selectedMonth', 'id'));
    }

    public function getMonths(Request $request, $id)
    {
        $year = $request->input('year');
        $months = $this->getMonthsForYear($id, $year);
        return response()->json($months);
    }

    private function getMonthsForYear($id, $year)
    {
        return DB::table('mutabaah')
            ->where('user_id', $id)
            ->whereYear('tanggal', $year)
            ->select(DB::raw('MONTH(tanggal) as month'), DB::raw('MONTHNAME(tanggal) as month_name'))
            ->groupBy('month', 'month_name')
            ->orderBy('month')
            ->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request, $id)
    {
        $users = User::where('id', $id)->get();
        $querysantri = Santri::where("user_id", $id)->get();
        return view('admin.mutabaah.tambah', compact('querysantri', 'users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
        ]);

        // Periksa apakah tanggal sudah ada
        $existingMutabaah = Mutabaah::where('user_id', $request->user_id)->where('tanggal', $request->tanggal)->first();
        if ($existingMutabaah) {
            return redirect()->back()->withErrors(['tanggal' => 'Tanggal sudah ada.'])->withInput();
        }

        $mutabaah = new Mutabaah([
            'user_id' => $request->user_id,
            'tanggal' => $request->input('tanggal'),
            'shubuh' => $request->input('shubuh') ? true : false,
            'dzuhur' => $request->input('dzuhur') ? true : false,
            'ashar' => $request->input('ashar') ? true : false,
            'maghrib' => $request->input('maghrib') ? true : false,
            'isya' => $request->input('isya') ? true : false,
            'tilawah' => $request->input('tilawah'),
            'al_mulk' => $request->input('alMulk') ? true : false,
            'solawat' => $request->input('solawat') ? true : false,
            'al_kahfi' => $request->input('alkahfi') ? true : false,
            'tahajud' => $request->input('tahajud') ? true : false,
            'dhuha' => $request->input('dhuha') ? true : false,
            'rs' => $request->input('rs') ? true : false,
            'rd' => $request->input('rd') ? true : false,
            'rm' => $request->input('rm') ? true : false,
            'ri' => $request->input('ri') ? true : false,
            'dzikir_pagi' => $request->input('pagi') ? true : false,
            'dzikir_petang' => $request->input('petang') ? true : false,
            'sahur_senin' => $request->input('senin') ? true : false,
            'sahur_kamis' => $request->input('kamis') ? true : false,
            'workout_situp' => $request->input('sitUp') ? true : false,
            'workout_pushup' => $request->input('pushUp') ? true : false,
            'workout_run' => $request->input('run') ? true : false,
            'reading_book' => $request->input('reading'),
            'tiga_s' => $request->input('3s') ? true : false,
            'mendoakan_orangtua' => $request->input('mendoakanOrangTua') ? true : false,
            'bersyukur' => $request->input('bersyukur') ? true : false,
            'mendoakan_oranglain' => $request->input('mendoakanOrangLain') ? true : false,
        ]);

        $mutabaah->save();

        return redirect()->route('adminmutabaahdetail', $request->user_id)->with('success', 'Data mutabaah berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mutabaah = mutabaah::findOrFail($id);
        $users = User::where('id', $mutabaah->user_id)->first();
        return view('admin.mutabaah.edit', compact('mutabaah', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, $id)
    {

        $request->validate([
            'tanggal' => 'required|date',
        ]);

        $mutabaah = Mutabaah::findOrFail($id);

        // Periksa apakah tanggal sudah ada dan bukan tanggal yang sedang diperbarui
        $existingMutabaah = Mutabaah::where('tanggal', $request->tanggal)
            ->where('user_id', $mutabaah->user_id)
            ->where('id', '<>', $id)
            ->first();

        if ($existingMutabaah) {
            return redirect()->back()->withErrors(['tanggal' => 'Tanggal sudah ada.'])->withInput();
        }

        $data = $request->all();
        $data['shubuh'] = $request->has('shubuh') ? 1 : 0;
        $data['dzuhur'] = $request->has('dzuhur') ? 1 : 0;
        $data['ashar'] = $request->has('ashar') ? 1 : 0;
        $data['maghrib'] = $request->has('maghrib') ? 1 : 0;
        $data['isya'] = $request->has('isya') ? 1 : 0;
        $data['al_mulk'] = $request->has('alMulk') ? 1 : 0;
        $data['solawat'] = $request->has('solawat') ? 1 : 0;
        $data['al_kahfi'] = $request->has('alkahfi') ? 1 : 0;
        $data['tahajud'] = $request->has('tahajud') ? 1 : 0;
        $data['dhuha'] = $request->has('dhuha') ? 1 : 0;
        $data['rs'] = $request->has('rs') ? 1 : 0;
        $data['rd'] = $request->has('rd') ? 1 : 0;
        $data['rm'] = $request->has('rm') ? 1 : 0;
        $data['ri'] = $request->has('ri') ? 1 : 0;
        $data['dzikir_pagi'] = $request->has('pagi') ? 1 : 0;
        $data['dzikir_petang'] = $request->has('petang') ? 1 : 0;
        $data['sahur_senin'] = $request->has('senin') ? 1 : 0;
        $data['sahur_kamis'] = $request->has('kamis') ? 1 : 0;
        $data['workout_situp'] = $request->has('sitUp') ? 1 : 0;
        $data['workout_pushup'] = $request->has('pushUp') ? 1 : 0;
        $data['workout_run'] = $request->has('run') ? 1 : 0;
        $data['tiga_s'] = $request->has('3s') ? 1 : 0;
        $data['mendoakan_orangtua'] = $request->has('mendoakanOrangTua') ? 1 : 0;
        $data['bersyukur'] = $request->has('bersyukur') ? 1 : 0;
        $data['mendoakan_oranglain'] = $request->has('mendoakanOrangLain') ? 1 : 0;

        $mutabaah->update($data);


        return redirect()->route('adminmutabaahdetail', $mutabaah->user_id)->with('success', 'Data updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mutabaah = Mutabaah::findOrFail($id);
        $mutabaah->delete();

        return redirect()->route('adminmutabaahdetail', $mutabaah->user_id)->with('success', 'Mutabaah deleted successfully.');
    }
}

