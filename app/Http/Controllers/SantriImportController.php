<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\SantriImport;
use Maatwebsite\Excel\Facades\Excel;

class SantriImportController extends Controller
{
    public function showImportForm()
    {
        return view('santrii.santri.import');
    }

    // Metode untuk menghandle proses import Excel
    public function import(Request $request)
    {
        $request->validate([
            'excel_file' => 'required|mimes:xls,xlsx'
        ]);

        $file = $request->file('excel_file');

        Excel::import(new SantriImport, $file);

        return redirect()->route('santri')->with('success', 'Data santri berhasil diimpor.');
    }
    public function uploadPhoto(Request $request)
{
    $request->validate([
        'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $photoName = time() . '.' . $request->photo->extension();  
    $request->photo->move(public_path('photos'), $photoName);

    return back()
        ->with('success', 'Photo successfully uploaded.')
        ->with('photo', $photoName);
}
}

