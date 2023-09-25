<?php

namespace App\Http\Controllers;

use App\Models\Ulasan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UlasanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        // Validasi data ulasan
        $request->validate([
            'kuliner_id' => 'required|exists:kuliner,id',
            'rating' => 'required|integer|min:1|max:5',
            'ulasan' => 'required|string',
        ]);
    
        // Simpan ulasan ke database
        $data = Ulasan::create([
            'kuliner_id' => $request->input('kuliner_id'),
            'rating' => $request->input('rating'),
            'ulasan' => $request->input('ulasan'), // Ubah ini
            'user_id' => auth()->id(),
        ]);
        
        return redirect()->back()->with('success', 'Ulasan berhasil disimpan.');
    }
    public function show($id)
    {
        
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
