<?php

namespace App\Http\Controllers;

use App\Models\Destinasi_Wisata;
use App\Models\Homestay;
use App\Models\Souvenir;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        $data_destinasi_wisata = Destinasi_Wisata::paginate(4);
        $data_homestay = Homestay::paginate(3);
        $data_souvenir = Souvenir::paginate(3);
        return view('home', compact('data_homestay', 'data_souvenir','data_destinasi_wisata'));
    }
}
