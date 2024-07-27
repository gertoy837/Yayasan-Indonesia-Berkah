<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        $query = Nilai::where('user_id', Auth()->id())->get();
        return view('santrii.nilai.index', compact('request', 'query'));
    }
}
