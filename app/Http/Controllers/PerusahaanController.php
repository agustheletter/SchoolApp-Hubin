<?php

namespace App\Http\Controllers;

use App\Models\PerusahaanModel;
use Illuminate\Http\Request;
use App\Models\PerusahaanModel as Persuhaan;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Persuhaan::all();
        return view('admin.pages.hubin.v_perusahaan', compact('perusahaan'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'         => 'required|string|max:255',
            'alamat'       => 'nullable|string',
            'kontak'       => 'nullable|string|max:50',
            'email'        => 'nullable|email|max:255',
            'website'      => 'nullable|url|max:255',
            'deskripsi'    => 'nullable|string',
            'bidang_kerja' => 'nullable|string|max:255',
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'       => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/logo'), $filename);
            $data['logo'] = 'uploads/logo/' . $filename;
        }

        PerusahaanModel::create($data);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $perusahaan = PerusahaanModel::findOrFail($id);

        $request->validate([
            'nama'         => 'required|string|max:255',
            'alamat'       => 'nullable|string',
            'kontak'       => 'nullable|string|max:50',
            'email'        => 'nullable|email|max:255',
            'website'      => 'nullable|url|max:255',
            'deskripsi'    => 'nullable|string',
            'bidang_kerja' => 'nullable|string|max:255',
            'logo'         => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status'       => 'required|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/logo'), $filename);
            $data['logo'] = 'uploads/logo/' . $filename;
        }

        $perusahaan->update($data);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $perusahaan = PerusahaanModel::findOrFail($id);
        $perusahaan->delete();

        return redirect()->back();
    }
}
