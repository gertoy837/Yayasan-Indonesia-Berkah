<?php

namespace App\Http\Controllers\Santri;

use App\Http\Controllers\Controller;
use App\Models\mutabaah;
use App\Models\Santri;
use Illuminate\Http\Request;

class MutabaahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $mutabaah = mutabaah::all();
        return view('santrii.mutabaah.index', compact('mutabaah'));
    }
    public function detail(Request $request)
    {



    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(request $request)
    {
        $querysantri = Santri::where("user_id", Auth()->id());
        return view('santrii.mutabaah.tambah', compact('querysantri'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
        ]);

        $mutabaah = new Mutabaah([
            'user_id' => Auth()->id(),
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

        return redirect()->route('mutabaah')->with('success', 'Data mutabaah berhasil disimpan.');
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
        $mutabaah = Mutabaah::findOrFail($id);
        return view('santrii.mutabaah.edit', compact('mutabaah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(request $request, $id)
    {
        $mutabaah = Mutabaah::findOrFail($id);

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


        return redirect()->route('mutabaah')->with('success', 'Data updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mutabaah = Mutabaah::findOrFail($id);
        $mutabaah->delete();

        return redirect()->route('mutabaah')->with('success', 'Mutabaah deleted successfully.');
    }
}

