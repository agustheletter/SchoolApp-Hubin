<?php

namespace App\Http\Controllers;

use App\Models\UsahaSiswaModel;
use Illuminate\Http\Request;

class UMKMAdminController extends Controller
{
  
    public function index()
    {
        $data = UsahaSiswaModel::latest()->get();
        return view('admin.pages.hubin.umkm.index', compact('data'));
    }
    public function create()
    {
        return view('admin.pages.hubin.umkm.create');
    }

    public function edit($id)
    {
        $usaha = UsahaSiswaModel::findOrFail($id);
        return view('admin.pages.hubin.umkm.edit', compact('usaha'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama_usaha' => 'required',
            'nama_pemilik' => 'nullable|string|max:255',
            'deskripsi_usaha' => 'required',
            'kontak_usaha' => 'required',
            'alamat_usaha' => 'required',
            'kategori_usaha' => 'required',
            'gambar_usaha' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar_usaha')) {
            $file = $request->file('gambar_usaha');
            $filename = time() . '_' . 'usaha_siswa' . "_" . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/umkm'), $filename);
            $gambar = 'uploads/umkm/' . $filename;
        }

        UsahaSiswaModel::create([
            'nama_usaha' => $request->nama_usaha,
            'nama_pemilik' => $request->nama_pemilik,
            'deskripsi_usaha' => $request->deskripsi_usaha,
            'kontak_usaha' => $request->kontak_usaha,
            'alamat_usaha' => $request->alamat_usaha,
            'kategori_usaha' => $request->kategori_usaha,
            'sosmed_usaha' => $request->sosmed_usaha,
            'gambar_usaha' => $gambar,
        ]);

        return redirect()->route('umkm.index')->with('success', 'Data UMKM berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $usaha = UsahaSiswaModel::findOrFail($id);
        
        $request->validate([
            'nama_usaha' => 'required',
            'nama_pemilik' => 'nullable|string|max:255',
            'deskripsi_usaha' => 'required',
            'kontak_usaha' => 'required',
            'alamat_usaha' => 'required',
            'kategori_usaha' => 'required',
            'gambar_usaha' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = $usaha->gambar_usaha;
        if ($request->hasFile('gambar_usaha')) {
            if ($gambar) {
                unlink(public_path($gambar));
            }
            $file = $request->file('gambar_usaha');
            $filename = time() . '_' . 'usaha_siswa' . "_" . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/umkm'), $filename);
            $gambar = 'uploads/umkm/' . $filename;
        }

        $usaha->update([
            'nama_usaha' => $request->nama_usaha,
            'nama_pemilik' => $request->nama_pemilik,
            'deskripsi_usaha' => $request->deskripsi_usaha,
            'kontak_usaha' => $request->kontak_usaha,
            'alamat_usaha' => $request->alamat_usaha,
            'kategori_usaha' => $request->kategori_usaha,
            'sosmed_usaha' => $request->sosmed_usaha,
            'gambar_usaha' => $gambar,
        ]);

        return redirect()->route('umkm.index')->with('success', 'Data UMKM berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $usaha = UsahaSiswaModel::findOrFail($id);
        if ($usaha->gambar_usaha) {
            unlink(public_path($usaha->gambar_usaha));
        }
        $usaha->delete();
        return redirect()->route('umkm.index')->with('success', 'Data UMKM berhasil dihapus.');
    }
}
