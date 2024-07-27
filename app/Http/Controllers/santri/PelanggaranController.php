<?php

namespace App\Http\Controllers\Santri;
use App\Http\Controllers\Controller;
use App\Models\pelanggaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PelanggaranImport;

class PelanggaranController extends Controller
{
    public function index()
    {  
        $query = pelanggaran::where('user_id', Auth::user()->id)->get();
        return view('santrii.pelanggaran.index',compact('query'));
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
        ]);

        Excel::import(new PelanggaranImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data Pelanggaran Imported Successfully');
    }
}
