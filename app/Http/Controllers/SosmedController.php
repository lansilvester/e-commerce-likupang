<?php

namespace App\Http\Controllers;

use App\Models\Sosmed;
use Illuminate\Http\Request;

class SosmedController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sosmed = Sosmed::FindOrFail($id);
        return view('admin.pages.edit_sosmed', compact('sosmed'));
    }
    
    public function update(Request $request, $id)
    {
        $sosmed = sosmed::findOrFail($id);

        $request->validate([
            'facebook' => 'required|string',
            'whatsapp' => 'required|string',
            'instagram' => 'required|string',

        ]);
        $sosmed->update($request->all());

        return redirect()->route('dashboard')->with('success_edit_sosmed','Berhasil update social media');
    }

    public function destroy($id)
    {
        $sosmed = Sosmed::FindOrFail($id);
        $sosmed->delete();
    }
}
