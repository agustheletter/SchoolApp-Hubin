<?php

namespace App\Http\Controllers;

use App\Models\LokerModel;
use App\Models\PengumumanModel;
use App\Models\PerusahaanModel;
use Illuminate\Http\Request;

class LokerController extends Controller
{
    public function index()
    {
        $pengumuman = PengumumanModel::latest()->get();
        return view('admin.pages.hubin.v_loker', compact('pengumuman'));
    }

}
