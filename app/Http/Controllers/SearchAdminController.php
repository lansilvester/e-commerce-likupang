<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi_Wisata;
use App\Models\Souvenir;

class SearchAdminController extends Controller
{
    public function destinasi_wisata(Request $request){
        
        $request->validate([
            'search' => 'string|max:255',
        ]);
        $searchTerm = $request->input('search');

        $results = Destinasi_Wisata::where('nama_destinasi', 'like', '%' . $searchTerm . '%')->paginate(10);

        return view('admin.pages.destinasi_wisata.search', compact('results', 'searchTerm'));
    }
    public function sovenir(Request $request){
        
        $request->validate([
            'search' => 'string|max:255',
        ]);
        $searchTerm = $request->input('search');

        $results = Souvenir::where('nama_souvenir', 'like', '%' . $searchTerm . '%')->paginate(10);

        return view('admin.pages.souvenir.search', compact('results', 'searchTerm'));
    }
}
