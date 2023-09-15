<?php

namespace App\Http\Controllers;

use App\Models\Homestay; // Ubah model menjadi Homestay
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HomestayAdminController extends Controller
{
    public function index()
    {
        $data_homestay = Homestay::paginate(7);
        return view('admin.pages.homestay.all', compact('data_homestay')); // Sesuaikan dengan view Homestay
    }

    public function create()
    {
        return view('admin.pages.homestay.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_homestay' => 'string|max:255',
            'alamat' => 'string|max:255',
            'harga' => 'string',
            'kontak' => 'string|max:15',
            'deskripsi' => 'string',
            'foto' => 'image|max:5024',
            'map' => 'string',
            'user_id' => 'required'
        ]);

        $data = $request->only([
            'nama_homestay',
            'alamat',
            'harga',
            'kontak',
            'deskripsi',
            'foto',
            'map',
            'user_id'
        ]);
        $data['user_id'] = Auth::user()->id;
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/homestay', $filename);
            $data['foto'] = $filename;
        }

        Homestay::create($data);
        return redirect()->route('dashboard_homestay.index')->with('success', 'Data homestay berhasil ditambahkan');
    }

    public function show($id)
    {
        $homestay = Homestay::findOrFail($id);
        return view('admin.pages.homestay.show', compact('homestay'));
    }

    public function edit($id)
    {
        $homestay = Homestay::findOrFail($id);
        return view('admin.pages.homestay.edit', compact('homestay'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_homestay' => 'required|max:255',
            'alamat' => 'required|max:255',
            'harga' => 'required',
            'kontak' => 'required|max:15',
            'deskripsi' => 'required|max:1000',
            'map' => 'string',
            'foto' => 'image|max:5024',
        ]);

        $homestay = Homestay::findOrFail($id);
        $data = $request->only([
            'nama_homestay',
            'alamat',
            'harga',
            'kontak',
            'deskripsi',
            'map'
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/homestay', $filename);
            $data['foto'] = $filename;

            // Hapus foto lama jika ada
            if (!empty($homestay->foto)) {
                Storage::delete('public/homestay/' . $homestay->foto);
            }
        }

        $homestay->update($data);
        return redirect()->route('dashboard_homestay.index')->with('success', 'Data homestay berhasil diperbarui');
    }

    public function destroy($id)
    {
        $homestay = Homestay::findOrFail($id);

        // Hapus foto jika ada
        if (!empty($homestay->foto)) {
            Storage::delete('public/homestay/' . $homestay->foto);
        }

        $homestay->delete();
        return redirect()->route('dashboard_homestay.index')->with('success', 'Data homestay berhasil dihapus');
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'string|max:255',
        ]);

        $searchTerm = $request->input('search');

        $results = Homestay::where('nama_homestay', 'like', '%' . $searchTerm . '%')->paginate(10);

        return view('admin.pages.homestay.search', compact('results', 'searchTerm')); // Sesuaikan dengan view Homestay
    }
}