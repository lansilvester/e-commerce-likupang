<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destinasi_Wisata;

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
}
