<?php

namespace App\Http\Controllers;

use App\Models\Kuliner;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class KulinerController extends Controller
{
    public function index()
    {
        $data_kuliner = Kuliner::orderBy('created_at', 'desc')->get();
        return view('kuliner.all', compact('data_kuliner'));
    }
    
    public function show($id)
    {
        $kuliner = Kuliner::findOrFail($id);
        $ulasan = Ulasan::where('kuliner_id', $id)            
                        ->orderBy('created_at', 'desc')
                        ->get();
        return view('kuliner.show', compact('kuliner', 'ulasan'));
    }
    
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
