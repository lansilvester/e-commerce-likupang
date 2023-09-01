<?php

namespace App\Http\Controllers;

use App\Models\Homestay;
use Illuminate\Http\Request;

class HomestayController extends Controller
{
    public function index()
    {
        $data_homestay = Homestay::all();
        return view('homestay.all', compact('data_homestay'));
    }

    public function show($id)
    {
        $homestay = Homestay::findOrFail($id);
        return view('homestay.show', compact('homestay'));
    }

}
