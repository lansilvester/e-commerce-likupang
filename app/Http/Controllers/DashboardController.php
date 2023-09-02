<?php

namespace App\Http\Controllers;

use App\Models\Destinasi_Wisata;
use App\Models\Feedback;
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
        $data_feedback = Feedback::all();

        return view('admin.pages.dashboard', compact('data_users','data_destinasi_wisata','data_souvenir','data_homestay','data_feedback'));
    }
    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        $feedback->delete();
        return redirect()->route('dashboard')->with('success_delete_feedback', 'Feedback telah dihapus');
    }

}
