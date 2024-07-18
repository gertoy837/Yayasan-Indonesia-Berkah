<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\mutabaah;
use Illuminate\Http\Request;

class AdminMutabaahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view ('admin.mutabaah.index');

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

