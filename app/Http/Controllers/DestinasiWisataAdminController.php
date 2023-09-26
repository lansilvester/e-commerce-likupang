<?php

namespace App\Http\Controllers;

use App\Models\Destinasi_Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DestinasiWisataAdminController extends Controller
{
    public function index()
    {
        $data_destinasi_wisata = Destinasi_Wisata::all();
        return view('admin.pages.destinasi_wisata.all', compact('data_destinasi_wisata'));
        
    }
    public function create()
    {
        return view('admin.pages.destinasi_wisata.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_destinasi' => 'string|max:100',
            'alamat' => 'string|max:255',
            'map' => 'string',
            'harga_masuk_roda_dua' => 'string',
            'harga_masuk_roda_empat' => 'string',
            'deskripsi' => 'string',
            'foto' => 'image|max:5024',
        ]);
    
        $data = $request->only([
            'nama_destinasi',
            'alamat',
            'map',
            'harga_masuk_roda_dua',
            'harga_masuk_roda_empat',
            'deskripsi',
            'user_id'
        ]);
        $data['user_id'] = Auth::user()->id;
        
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/destinasi_wisata', $filename);
            $data['foto'] = $filename;
        }
    
        Destinasi_Wisata::create($data);
        return redirect()->route('dashboard_destinasi_wisata.index')->with('success', 'Data berhasil ditambahkan');
    }
    
    public function show($id)
    {
        $destinasi = Destinasi_Wisata::findOrFail($id);
        return view('admin.pages.destinasi_wisata.show', compact('destinasi'));
    }

    public function edit($id)
    {
        $data_destinasi_wisata = Destinasi_Wisata::findOrFail($id);
        return view('admin.pages.destinasi_wisata.edit', compact('data_destinasi_wisata'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_destinasi' => 'required|max:255',
            'alamat' => 'required|max:255',
            'map' => 'max:1000',
            'harga_masuk_roda_dua' => 'required|max:255',
            'harga_masuk_roda_empat' => 'required|max:255',
            'deskripsi' => 'required|max:1000',
            'foto' => 'image|max:5024'
        ]);

        $destinasiWisata = Destinasi_Wisata::findOrFail($id);
        $data = $request->only([
            'nama_destinasi',
            'alamat',
            'map',
            'harga_masuk_roda_dua',
            'harga_masuk_roda_empat',
            'deskripsi',
            'kontak',
            'user_id'
        ]);
        $data['user_id'] = Auth::user()->id;

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/destinasi_wisata', $filename);
            $data['foto'] = $filename; // Simpan nama file gambar
        
            // Hapus foto lama jika ada
            if (!empty($destinasiWisata->foto)) {
                \Storage::delete('public/destinasi_wisata/' . $destinasiWisata->foto); // Perubahan path di sini
            }
        }

        
        // Update data ke database menggunakan mass assignment
        $destinasiWisata->update($data);

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('dashboard_destinasi_wisata.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id){
        $destinasiWisata = Destinasi_Wisata::findOrFail($id);

        // Hapus foto jika ada
        if (!empty($destinasiWisata->foto)) {
            \Storage::delete('public/destinasi_wisata/' . $destinasiWisata->foto); // Perubahan path di sini
        }

        // Hapus data dari database
        $destinasiWisata->delete();

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('dashboard_destinasi_wisata.index')->with('success', 'Data berhasil dihapus');
    }
    public function search(Request $request)
    {
        $request->validate([
            'search' => 'string|max:255',
        ]);

        $searchTerm = $request->input('search');

        $results = Destinasi_Wisata::where('nama_destinasi', 'like', '%' . $searchTerm . '%')->paginate(10);

        return view('admin.pages.destinasi_wisata.search', compact('results', 'searchTerm'));
    }

}
