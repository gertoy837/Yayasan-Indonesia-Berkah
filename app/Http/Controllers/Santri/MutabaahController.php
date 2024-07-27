<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MutabaahController extends Controller
{
    public function index(Request $request)
    {
        $selectedYear = $request->input('tahun', date('Y')); // Default ke tahun saat ini jika tidak ada input
        $selectedMonth = $request->input('bulan');

        // Mendapatkan daftar tahun yang ada di data mutabaah
        $years = DB::table('mutabaah')
            ->where('user_id', Auth()->id())
            ->select(DB::raw('YEAR(tanggal) as year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        // Mendapatkan daftar bulan yang ada di data mutabaah berdasarkan tahun
        $months = DB::table('mutabaah')
            ->select(DB::raw('MONTH(tanggal) as month'), DB::raw('MONTHNAME(tanggal) as month_name'))
            ->whereYear('tanggal', $selectedYear)
            ->groupBy('month', 'month_name')
            ->orderBy('month')
            ->get();

        // Jika tidak ada bulan yang dipilih atau bulan yang dipilih tidak tersedia, gunakan bulan pertama
        if (!$selectedMonth || !$months->contains('month', $selectedMonth)) {
            $selectedMonth = $months->last()->month ?? null;
        }

        // Mendapatkan data mutabaah berdasarkan bulan dan tahun yang dipilih
        $query = DB::table('mutabaah')->where('user_id', Auth()->id());

        if ($selectedYear) {
            $query->whereYear('tanggal', $selectedYear);
        }

        if ($selectedMonth) {
            $query->whereMonth('tanggal', $selectedMonth);
        }

        $mutabaah = $query->get();

        return view('santrii.mutabaah.index', compact('mutabaah', 'months', 'years', 'selectedYear', 'selectedMonth'));
    }

    public function getMonthsByYear(Request $request)
    {
        $year = $request->input('year');

        $months = DB::table('mutabaah')
            ->where('user_id', Auth()->id())
            ->select(DB::raw('MONTH(tanggal) as month'), DB::raw('MONTHNAME(tanggal) as month_name'))
            ->whereYear('tanggal', $year)
            ->groupBy('month', 'month_name')
            ->orderBy('month')
            ->get();

        return response()->json($months);
    }
}

