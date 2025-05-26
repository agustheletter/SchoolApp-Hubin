<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PengumumanModel;
use Illuminate\Support\Facades\Storage;

class PengumumanAdminController extends Controller
{
    public function index()
    {
        $data = PengumumanModel::latest()->get();
        return view('admin.pages.hubin.pengumuman.index', compact('data'));
    }

    public function create()
    {
        $kategoriDB = PengumumanModel::select('kategori')
            ->whereNotNull('kategori')
            ->distinct()
            ->pluck('kategori')
            ->toArray(); 

        $kategoriList = array_unique(array_merge(['Lowongan Kerja', 'Seminar'], $kategoriDB));
        return view('admin.pages.hubin.pengumuman.create', compact('kategoriList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul_pengumuman' => 'required|string|max:255',
            'isi_pengumuman' => 'required|string',
            'tanggal_pengumuman' => 'required|date',
            'tanggal_berakhir' => 'nullable|date',
            'gambar' => 'nullable|file|image|max:2048',
            'lampiran' => 'nullable|file|max:4096',
        ]);

        $gambar = $request->file('gambar')?->store('gambar', 'public');
        $lampiran = $request->file('lampiran')?->store('lampiran', 'public');

        PengumumanModel::create([
            ...$validated,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'kontak_email' => $request->kontak_email,
            'kontak_telepon' => $request->kontak_telepon,
            'gambar' => $gambar,
            'lampiran' => $lampiran,
            'berkas_dibutuhkan' => $request->berkas_dibutuhkan
                ? array_map(fn($item) => $item['value'], json_decode($request->berkas_dibutuhkan, true))
                : null,
            'posisi' => $request->posisi
                ? array_map(fn($item) => $item['value'], json_decode($request->posisi, true))
                : null,
            'persyaratan' => $request->persyaratan
                ? array_map(fn($item) => $item['value'], json_decode($request->persyaratan, true))
                : null,
        ]);


        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan.');
    }

    public function show($id)
    {
        $pengumuman = PengumumanModel::findOrFail($id);
        return view('pengumuman.show', compact('pengumuman'));
    }

    public function edit($id)
    {
        $announcement = PengumumanModel::findOrFail($id);
        return view('admin.pages.hubin.pengumuman.edit', compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        $pengumuman = PengumumanModel::findOrFail($id);

        $validated = $request->validate([
            'judul_pengumuman' => 'required|string|max:255',
            'isi_pengumuman' => 'required|string',
            'tanggal_pengumuman' => 'required|date',
            'tanggal_berakhir' => 'nullable|date',
            'gambar' => 'nullable|file|image|max:2048',
            'lampiran' => 'nullable|file|max:4096',
        ]);

        if ($request->hasFile('gambar')) {
            if ($pengumuman->gambar) Storage::disk('public')->delete($pengumuman->gambar);
            $file = $request->file('gambar');

            $filename = time() . '_' . 'pengumuman_gambar' . "_" . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/pengumuman'), $filename);
            $validated['gambar'] = 'uploads/pengumuman/' . $filename;
        }

        if ($request->hasFile('lampiran')) {
            if ($pengumuman->lampiran) Storage::disk('public')->delete($pengumuman->lampiran);
            $validated['lampiran'] = $request->file('lampiran')->store('lampiran', 'public');
        }

        $pengumuman->update([
            ...$validated,
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'kontak_email' => $request->kontak_email,
            'kontak_telepon' => $request->kontak_telepon,
            'gambar' => $validated['gambar'] ?? $pengumuman->gambar,
            'lampiran' => $validated['lampiran'] ?? $pengumuman->lampiran,
            'berkas_dibutuhkan' => $request->berkas_dibutuhkan
                ? array_map(fn($item) => $item['value'], json_decode($request->berkas_dibutuhkan, true))
                : null,
            'posisi' => $request->posisi
                ? array_map(fn($item) => $item['value'], json_decode($request->posisi, true))
                : null,
            'persyaratan' => $request->persyaratan
                ? array_map(fn($item) => $item['value'], json_decode($request->persyaratan, true))
                : null,
        ]);

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil diupdate.');
    }

    public function destroy($id)
    {
        $pengumuman = PengumumanModel::findOrFail($id);
        $pengumuman->delete();

        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dihapus.');
    }
}
