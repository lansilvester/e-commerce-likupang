<?php

namespace App\Http\Controllers;

use App\Models\Destinasi_Wisata;
use Illuminate\Http\Request;

class DestinasiWisataController extends Controller
{
    public function index()
    {
        $data_destinasi = Destinasi_Wisata::all();
        return view('destinasi_wisata.all', compact('data_destinasi'));
    }

    public function show($id)
    {
        $destinasi = Destinasi_Wisata::findOrFail($id);
        return view('destinasi_wisata.show', compact('destinasi'));
    }
}
