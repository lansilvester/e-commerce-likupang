<?php

namespace App\Http\Controllers;

use App\Models\Destinasi_Wisata;
use App\Models\Feedback;
use App\Models\Homestay;
use App\Models\Kuliner;
use App\Models\Souvenir;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $data_users = User::all();
        $data_destinasi_wisata = Destinasi_Wisata::all();
        $data_souvenir = Souvenir::all();
        $data_homestay = Homestay::all();
        $data_kuliner= Kuliner::all();
        $data_feedback = Feedback::all();

        if(Auth::user()->role == 'SA'){
            return view('admin.pages.dashboard', compact('data_users','data_destinasi_wisata','data_souvenir','data_homestay','data_feedback','data_kuliner'));
        }
        if(Auth::user()->role == 'admin_objek_wisata'){
            return redirect()->route('dashboard_destinasi_wisata.index');
        }
        if(Auth::user()->role == 'admin_homestay'){
            return redirect()->route('dashboard_homestay.index');
        }
        if(Auth::user()->role == 'admin_kuliner'){
            return redirect()->route('dashboard_kuliner.index');
        }
        if(Auth::user()->role == 'admin_souvenir'){
            return redirect()->route('dashboard_souvenir.index');
        }
    }
    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->route('dashboard')->with('success_delete_feedback', 'Feedback telah dihapus');
    }

}
