<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use App\Models\prestasi;
use App\Http\Requests\StoreprestasiRequest;
use App\Http\Requests\UpdateprestasiRequest;
use Illuminate\Http\Request;
use App\Models\Santri;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PrestasiImport;

class PrestasiController extends Controller
{
    public function index()
    {
        $query = Prestasi::where('user_id', Auth()->id())->get();
        return view('santrii.prestasi.index', compact('query'));
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
}
