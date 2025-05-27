<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// panggil model
use App\Models\JurusanModel;
use App\Models\KelasModel;
use App\Models\TahunAjaranModel;
use App\Models\SiswaKelasModel;
use App\Models\BayarModel;
use App\Models\BayarDetailModel;
use App\Models\PerusahaanModel;
use App\Models\PengumumanModel;
use App\Models\UsahaSiswaModel;
use Session;

class HomeController extends Controller
{
    public function home()
    {
        // Ambil idtahun ajaran dari session
        $idthnajaran = Session::get('idthnajaran');
        
        // Ambil data tahun ajaran aktif
        $tahunajaran = TahunAjaranModel::select("*")
            ->where('tbl_thnajaran.idthnajaran', $idthnajaran)
            ->get();

        // Hitung jumlah master data
        $datajurusan    = JurusanModel::count();
        $datakelas      = KelasModel::count();
        $dataperusahaan = PerusahaanModel::count();
        $datapengumuman = PengumumanModel::count();
        $dataumkm       = UsahaSiswaModel::count();
        
        // Hitung jumlah transaksi berdasarkan tahun ajaran
        $databayar      = BayarDetailModel::select("*")
            ->join('tbl_bayar','tbl_bayar.idbayar','=','tbl_bayardetail.idbayar')
            ->where('tbl_bayar.idthnajaran', $idthnajaran)
            ->count();

        // Menghitung jumlah siswa pada tahun ajaran aktif
        $datasiswa      = SiswaKelasModel::select("*")
            ->join('tbl_kelasdetail','tbl_kelasdetail.idkelasdetail','=','tbl_siswakelas.idkelasdetail')
            ->where('tbl_kelasdetail.idthnajaran', $idthnajaran)
            ->count();

        // Kirim data ke view
        return view('admin/pages/v_home', [
            'jurusan'     => $datajurusan,
            'kelas'       => $datakelas,
            'bayar'       => $databayar,
            'siswa'       => $datasiswa, 
            'perusahaan'  => $dataperusahaan,
            'pengumuman'  => $datapengumuman,
            'umkm'        => $dataumkm,
            'tahunajaran' => $tahunajaran
        ]);
    }

    //====================AWAL METHODE UNTUK TAMPIL TENTANG=================
    public function about()
    {
        // mengirim data ke view tentang
        return view('admin.pages.v_about');
    }
    //===================AKHIR METHODE UNTUK TAMPIL TENTANG================
}