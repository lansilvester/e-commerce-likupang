<?php

namespace App\Http\Controllers;

use App\Models\Kuliner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KulinerAdminController extends Controller
{
    public function index()
    {
        $data_kuliner = Kuliner::paginate(10);
        $kuliner_by_user = Kuliner::where('user_id', Auth::user()->id)->get();

        return view('admin.pages.kuliner.all', compact('data_kuliner','kuliner_by_user'));
    }
    
    public function create()
    {
        return view('admin.pages.kuliner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'NamaKuliner' => 'required|string|max:255',
            'Harga' => 'required|numeric',
            'Alamat' => 'required|string|max:255',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('kuliner', 'public');
        } else {
            $fotoPath = null;
        }

        Kuliner::create([
            'NamaKuliner' => $request->input('NamaKuliner'),
            'Harga' => $request->input('Harga'),
            'Alamat' => $request->input('Alamat'),
            'foto' => $fotoPath,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('dashboard_kuliner.index')->with('success', 'Kuliner berhasil ditambahkan');
    }

    public function show($id)
    {
        $kuliner = Kuliner::findOrFail($id);
        $kuliner_by_user = Kuliner::where('user_id', Auth::user()->id)->get();
        return view('admin.pages.kuliner.show', compact('kuliner','kuliner_by_user'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
        $kuliner = Kuliner::find($id);

        if (!$kuliner) {
            return redirect()->route('dashboard_kuliner.index')->with('error', 'Kuliner tidak ditemukan.');
        }

        // Hapus file foto dari penyimpanan sebelum menghapus data
        if ($kuliner->foto && file_exists(storage_path("app/public/{$kuliner->foto}"))) {
            unlink(storage_path("app/public/{$kuliner->foto}"));
        }

        $kuliner->delete();

        return redirect()->route('dashboard_kuliner.index')->with('success', 'Kuliner berhasil dihapus.');
    }
}
