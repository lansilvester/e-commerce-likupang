<?php

namespace App\Http\Controllers;

use App\Models\Destinasi_Wisata;
use App\Models\Homestay;
use App\Models\Souvenir;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data_users = User::all();
        $data_destinasi_wisata = Destinasi_Wisata::all();
        $data_souvenir = Souvenir::all();
        $data_homestay = Homestay::all();

        return view('admin.pages.dashboard', compact('data_users','data_destinasi_wisata','data_souvenir','data_homestay'));
    }

}
