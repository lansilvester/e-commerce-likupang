<?php

namespace App\Http\Controllers;

use App\Models\Souvenir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SouvenirAdminController extends Controller
{
    public function index()
    {
        $data_sovenir = Souvenir::paginate(7);
        return view('admin.pages.sovenir.all', compact('data_sovenir'));
    }

    public function create()
    {
        return view('admin.pages.sovenir.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_souvenir' => 'string|max:255',
            'alamat' => 'string|max:255',
            'harga' => 'string',
            'kontak' => 'string|max:15',
            'deskripsi' => 'string|max:1000',
            'foto' => 'image|max:5024',
        ]);

        $data = $request->only([
            'nama_souvenir',
            'alamat',
            'harga',
            'kontak',
            'deskripsi',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/souvenir', $filename);
            $data['foto'] = $filename;
        }

        Souvenir::create($data);
        return redirect()->route('dashboard_souvenir.index')->with('success', 'Data souvenir berhasil ditambahkan');
    }

    public function show($id)
    {
        $souvenir = Souvenir::findOrFail($id);
        return view('admin.pages.sovenir.show', compact('souvenir'));
    }

    public function edit($id)
    {
        $data_sovenir = Souvenir::findOrFail($id);
        return view('admin.pages.sovenir.edit', compact('data_sovenir'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_souvenir' => 'required|max:255',
            'alamat' => 'required|max:255',
            'harga' => 'required',
            'kontak' => 'required|max:15',
            'deskripsi' => 'required|max:1000',
            'foto' => 'image|max:5024',
        ]);

        $souvenir = Souvenir::findOrFail($id);
        $data = $request->only([
            'nama_souvenir',
            'alamat',
            'harga',
            'kontak',
            'deskripsi',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/souvenir', $filename);
            $data['foto'] = $filename;

            // Hapus foto lama jika ada
            if (!empty($souvenir->foto)) {
                Storage::delete('public/souvenir/' . $souvenir->foto);
            }
        }

        $souvenir->update($data);
        return redirect()->route('dashboard_souvenir.index')->with('success', 'Data souvenir berhasil diperbarui');
    }

    public function destroy($id)
    {
        $souvenir = Souvenir::findOrFail($id);

        // Hapus foto jika ada
        if (!empty($souvenir->foto)) {
            Storage::delete('public/souvenir/' . $souvenir->foto);
        }

        $souvenir->delete();
        return redirect()->route('dashboard_souvenir.index')->with('success', 'Data souvenir berhasil dihapus');
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'string|max:255',
        ]);

        $searchTerm = $request->input('search');

        $results = Souvenir::where('nama_souvenir', 'like', '%' . $searchTerm . '%')->paginate(10);

        return view('admin.pages.sovenir.search', compact('results', 'searchTerm'));
    }
}
