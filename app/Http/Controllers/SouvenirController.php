<?php

namespace App\Http\Controllers;

use App\Models\Souvenir;
use Illuminate\Http\Request;

class SouvenirController extends Controller
{
    public function index()
    {
        $data_souvenir = Souvenir::all();
        return view('sovenir.all', compact('data_souvenir'));
    }

    public function show($id)
    {
        $souvenir = Souvenir::findOrFail($id);
        return view('sovenir.show', compact('souvenir'));
    }

}
