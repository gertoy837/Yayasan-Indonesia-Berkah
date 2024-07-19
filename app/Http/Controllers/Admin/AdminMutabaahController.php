<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mutabaah;
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
        // Dapatkan daftar santri yang memiliki data mutabaah
        $santri = DB::table('mutabaah')
            ->join('users', 'mutabaah.user_id', '=', 'users.id')
            ->select('users.id', 'users.name')
            ->where('users.role', 'santri')
            ->groupBy('users.id', 'users.name')
            ->orderBy('users.name')
            ->get();

        // Jika tidak ada santri yang dipilih, gunakan santri pertama sebagai default
        $selectedUserId = $request->input('user_id', $santri->first()->id ?? null);

        // Dapatkan daftar tahun untuk santri yang dipilih
        $years = DB::table('mutabaah')
            ->where('user_id', $selectedUserId)
            ->select(DB::raw('YEAR(tanggal) as year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        // Jika tidak ada tahun yang dipilih, gunakan tahun terbaru
        $selectedYear = $request->input('tahun', $years->first()->year ?? null);

        // Dapatkan daftar bulan berdasarkan tahun yang dipilih untuk santri yang dipilih
        $months = DB::table('mutabaah')
            ->where('user_id', $selectedUserId)
            ->whereYear('tanggal', $selectedYear)
            ->select(DB::raw('MONTH(tanggal) as month'), DB::raw('MONTHNAME(tanggal) as month_name'))
            ->groupBy('month', 'month_name')
            ->orderBy('month')
            ->get();

        // Jika tidak ada bulan yang dipilih, gunakan bulan terbaru
        $selectedMonth = $request->input('bulan', $months->first()->month ?? null);

        // Dapatkan data mutabaah berdasarkan santri, tahun, dan bulan yang dipilih
        $mutabaah = DB::table('mutabaah')
            ->join('users', 'mutabaah.user_id', '=', 'users.id')
            ->select('mutabaah.*', 'users.name')
            ->where('users.role', 'santri')
            ->where('mutabaah.user_id', $selectedUserId)
            ->whereYear('mutabaah.tanggal', $selectedYear)
            ->whereMonth('mutabaah.tanggal', $selectedMonth)
            ->get();

        return view('admin.mutabaah.index', compact('mutabaah', 'months', 'years', 'santri', 'selectedYear', 'selectedMonth', 'selectedUserId'));
    }

    public function getMonthsByYear(Request $request)
    {
        $year = $request->input('year');
        $userId = $request->input('user_id');

        $query = DB::table('mutabaah')
            ->join('users', 'mutabaah.user_id', '=', 'users.id')
            ->select(DB::raw('MONTH(mutabaah.tanggal) as month'), DB::raw('MONTHNAME(mutabaah.tanggal) as month_name'))
            ->whereYear('mutabaah.tanggal', $year)
            ->where('users.role', 'santri');

        if ($userId) {
            $query->where('mutabaah.user_id', $userId);
        }

        $months = $query->groupBy('month', 'month_name')
            ->orderBy('month')
            ->get();

        return response()->json($months);
    }

    public function getYearsBySantri(Request $request)
    {
        $userId = $request->input('user_id');

        $years = DB::table('mutabaah')
            ->where('user_id', $userId)
            ->select(DB::raw('YEAR(tanggal) as year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->get();

        return response()->json($years);
    }

    public function getMonthsBySantriAndYear(Request $request)
    {
        $userId = $request->input('user_id');
        $year = $request->input('year');

        $months = DB::table('mutabaah')
            ->where('user_id', $userId)
            ->whereYear('tanggal', $year)
            ->select(DB::raw('MONTH(tanggal) as month'), DB::raw('MONTHNAME(tanggal) as month_name'))
            ->groupBy('month', 'month_name')
            ->orderBy('month')
            ->get();

        return response()->json($months);
    }

    public function detail(Request $request)
    {



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


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

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, $id)
    {

    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

    }
}

