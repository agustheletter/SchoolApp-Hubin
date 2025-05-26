<?php

namespace App\Http\Controllers;

use App\Models\PerusahaanModel;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $perusahaan = PerusahaanModel::where('status', 'aktif')->get();

        $socialMedia = [
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/></svg>',
                'name' => "Instagram",
                'handle' => "@hubin_smkn1cimahi",
                'color' => "bg-pink-500 hover:bg-pink-600"
            ],
            [
                'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>',
                'name' => "Facebook",
                'handle' => "HUBIN SMKN 1 Cimahi",
                'color' => "bg-blue-600 hover:bg-blue-700"
            ],
            // ... (Tambahkan data sosial media lainnya jika ada)
        ];

        $faqItems = [
            [
                'question' => "Bagaimana cara mendaftar program magang?",
                'answer' => "Siswa dapat mendaftar melalui koordinator HUBIN di sekolah atau menghubungi kami langsung."
            ],
            [
                'question' => "Apakah ada biaya untuk program kerjasama?",
                'answer' => "Program kerjasama dengan perusahaan tidak dikenakan biaya. Kami memberikan fasilitas dan dukungan penuh."
            ],
             [
                'question' => "Bagaimana cara mendaftarkan UMKM siswa?",
                'answer' => "Siswa atau alumni dapat mendaftarkan usahanya melalui formulir yang tersedia di website."
            ]
        ];

        // Kirim semua data yang dibutuhkan ke view 'index'
        return view('users.index', compact('perusahaan', 'socialMedia', 'faqItems'));

    }
}
