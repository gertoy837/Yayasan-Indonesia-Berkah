<?php

namespace App\Http\Controllers;

use App\Models\pelanggaran;
use App\Models\Prestasi;
use App\Models\Santri;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DonaturController extends Controller
{
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
        $totalpelanggaran = pelanggaran::count();
        $totalprestasi = Prestasi::count();

        return view('donatur.dashboard.index', [
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

        if ($request->has('filter_tahun_angkatan') && $request->filter_tahun_angkatan != '') {
            $query->whereHas('santri', function ($q) use ($request) {
                $q->where('tahun_angkatan_santri', $request->filter_tahun_angkatan);
            });
        }

        $users = $query->paginate(10);
    
        // Fetch unique angkatan values
        $angkatans = Santri::distinct()->pluck('angkatan_santri')->sort()->values();
        $tahun_angkatans = Santri::distinct()->pluck('tahun_angkatan_santri')->sort()->values();
    
        return view('donatur.santri.index', compact('users', 'angkatans', 'tahun_angkatans'));
    }

    public function pelanggaran(Request $request)
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
        $queryResult = $query->get();

        // Ambil daftar angkatan untuk dropdown
        $angkatanList = santri::distinct()->pluck('angkatan_santri');

        // Cek jika data kosong
        $dataKosong = $queryResult->isEmpty();

        return view('donatur.pelanggaran.index', [
            'query' => $queryResult,
            'angkatanList' => $angkatanList,
            'dataKosong' => $dataKosong
        ]);
    }

    public function prestasi(Request $request)
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
    
        return view('donatur.prestasi.index', compact('query', 'angkatanList'));
    }

    public function mutabaah(Request $request)
    {
        // Ambil filter dari request
        $searchName = $request->input('search_name');
        $selectedGender = $request->input('gender');
        $selectedAngkatan = $request->input('angkatan');
        $selectedTahunAngkatan = $request->input('tahun_angkatan');
    
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
    
        // Filter berdasarkan tahun angkatan
        if ($selectedTahunAngkatan) {
            $query->where('santri.tahun_angkatan_santri', $selectedTahunAngkatan);
        }
    
        // Ambil data santri
        $santri = $query->get();
    
        // Check if any data was found
        $dataFound = $santri->isNotEmpty();
    
        // Ambil daftar angkatan untuk filter
        $angkatanList = DB::table('santri')->distinct()->pluck('angkatan_santri');
    
        // Ambil daftar tahun angkatan untuk filter
        $tahunAngkatanList = DB::table('santri')->distinct()->pluck('tahun_angkatan_santri');
    
        return view('donatur.mutabaah.index', compact('santri', 'angkatanList', 'tahunAngkatanList', 'dataFound'));
    }    

    public function detailmutabaah(Request $request, $id)
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

        return view('donatur.mutabaah.detail', compact('users', 'mutabaah', 'months', 'years', 'selectedYear', 'selectedMonth', 'id'));
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

    public function nilai(Request $request)
    {
        $selectedAngkatan = $request->input('angkatan');

        $query = DB::table('users')
            ->join('nilai', 'nilai.user_id', '=', 'users.id')
            ->join('santri', 'santri.user_id', '=', 'users.id')
            ->select(
                'nilai.id as nilai_id',
                'users.nama_lengkap',
                'santri.jk_santri',
                'santri.angkatan_santri',
                'nilai.Adab',
                'nilai.Aqidah',
                'nilai.Akhlak',
                'nilai.Fiqih',
                'nilai.IT',
                'nilai.Hadis',
                'nilai.Quran',
                'nilai.BahasaArab',
                'nilai.BahasaInggris',
                'nilai.Public_Speaking'
            )
            ->where('users.role', 'santri');

        if ($request->filled('search')) {
            $query->where('users.nama_lengkap', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('gender')) {
            $query->where('santri.jk_santri', $request->gender);
        }

        if ($selectedAngkatan) {
            $query->where('santri.angkatan_santri', $selectedAngkatan);
        }

        $query = $query->orderBy('nama_lengkap', 'asc')->get();
        $angkatanList = DB::table('santri')->distinct()->pluck('angkatan_santri');

        return view('donatur.nilai.index', compact('angkatanList', 'query'));
    }

}
