<?php

use App\Http\Controllers\DspController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenisBayarDetailController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\KelasDetailController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokerController;
use App\Http\Controllers\MutasiKelasController;
use App\Http\Controllers\PengumumanAdminController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\ProgramKeahlianController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SiswaKelasController;
use App\Http\Controllers\SppController;
use App\Http\Controllers\TahunAjaranController;
use App\Http\Controllers\UMKMAdminController;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

Route::get('/', [LandingController::class, 'index'])->name('landingpage');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/umkm', [UMKMController::class, 'index'])->name('umkm');
Route::get('/umkm/detail/{idumkm}', [UMKMController::class, 'detail'])->name('umkmdetail');
Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman');
Route::get('/pengumuman/load', [PengumumanController::class, 'loadMore']);
Route::get('/pengumuman/detail/{idpengumuman}', [PengumumanController::class, 'detail'])->name('pengumumandetail');

//=========================AWAL ROUTE LOGIN=========================
Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('loginaksi', [LoginController::class,'loginaksi'])->name('loginaksi');
Route::get('logoutaksi', [LoginController::class,'logoutaksi'])->name('logoutaksi')->middleware('auth');
//=========================AWAL ROUTE LOGIN=========================


Route::middleware('auth')->prefix('admin')->group(function () {

    //=========================AWAL ROUTE HOME=========================
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/about', [HomeController::class, 'about']);
    //=========================AKHIR ROUTE HOME=========================

    //=========================AWAL ROUTE PROGRAM KEAHLIAN=========================
    Route::get('/programkeahlian', [ProgramKeahlianController::class,'programkeahlian']);
    Route::post('/programkeahlian/tambah',[ProgramKeahlianController::class,'programkeahliantambah']);
    Route::get('/programkeahlian/hapus/{idprogramkeahlian}',[ProgramKeahlianController::class,'programkeahlianhapus']);
    Route::put('/programkeahlian/edit/{idprogramkeahlian}', [ProgramKeahlianController::class,'programkeahlianedit']);
    //=========================AKHIR ROUTE PROGRAM KEAHLIAN=========================

    //=========================AWAL ROUTE JURUSAN=========================
    Route::get('/jurusan', [JurusanController::class,'jurusan']);
    Route::post('/jurusan/tambah',[JurusanController::class,'jurusantambah']);
    Route::get('/jurusan/hapus/{idjurusan}',[JurusanController::class,'jurusanhapus']);
    Route::put('/jurusan/edit/{idjurusan}', [JurusanController::class,'jurusanedit']);
    //=========================AKHIR ROUTE JURUSAN=========================

    //=========================AWAL ROUTE KELAS=========================
    Route::get('/kelas', [KelasController::class,'kelas']);
    Route::post('/kelas/tambah',[KelasController::class,'kelastambah']);
    Route::get('/kelas/hapus/{idkelas}',[KelasController::class,'kelashapus']);
    Route::put('/kelas/edit/{idkelas}', [KelasController::class,'kelasedit']);
    //=========================AKHIR ROUTE KELAS=========================

    //=========================AWAL ROUTE RUANGAN=========================
    Route::get('/ruangan', [RuanganController::class,'ruangan']);
    Route::post('/ruangan/tambah',[RuanganController::class,'ruangantambah']);
    Route::get('/ruangan/hapus/{idruang}',[RuanganController::class,'ruanganhapus']);
    Route::put('/ruangan/edit/{idruang}', [RuanganController::class,'ruanganedit']);
    //=========================AKHIR ROUTE RUANGAN=========================

    //=========================AWAL ROUTE KELAS DETAIL=========================
    Route::get('/kelasdetail', [KelasDetailController::class,'kelasdetail']);
    Route::post('/kelasdetail/tambah',[KelasDetailController::class,'kelasdetailtambah']);
    Route::get('/kelasdetail/hapus/{idkelasdetail}',[KelasDetailController::class,'kelasdetailhapus']);
    Route::put('/kelasdetail/edit/{idkelasdetail}', [KelasDetailController::class,'kelasdetailedit']);
    //=========================AKHIR ROUTE KELAS DETAIL=========================

    //=========================AWAL ROUTE TAHUN AJARAN=========================
    Route::get('/thnajaran', [TahunAjaranController::class,'thnajaran']);
    Route::post('/thnajaran/tambah',[TahunAjaranController::class,'thnajarantambah']);
    Route::get('/thnajaran/hapus/{idthnajaran}',[TahunAjaranController::class,'thnajaranhapus']);
    Route::put('/thnajaran/edit/{idthnajaran}', [TahunAjaranController::class,'thnajaranedit']);
    //=========================AKHIR ROUTE TAHUN AJARAN=========================

    //=========================AWAL ROUTE SISWA=========================
    Route::get('/siswa', [SiswaController::class,'siswa']);
    Route::post('/siswa/tambah',[SiswaController::class,'siswatambah']);
    Route::get('/siswa/hapus/{nis}',[SiswaController::class,'siswahapus']);
    Route::put('/siswa/edit/{nis}', [SiswaController::class,'siswaedit']);

    Route::get('/siswadetail', [SiswaController::class,'siswadetail']);
    Route::get('/siswadetail/cari', [SiswaController::class,'siswadetailcari']);
    //=========================AKHIR ROUTE SISWA=========================

    //=========================AWAL ROUTE MUTASI KELAS=========================
    Route::get('/mutasikelas',[MutasiKelasController::class,'mutasikelas']);
    Route::get('/mutasikelas/cari',[MutasiKelasController::class,'mutasikelascari']);
    Route::post('/mutasikelas/proses',[MutasiKelasController::class,'mutasikelasproses']);
    //=========================AKHIR ROUTE MUTASI KELAS=========================

    //=========================AWAL ROUTE SISWA KELAS=========================
    Route::get('/siswakelas', [SiswaKelasController::class,'siswakelas']);
    Route::get('/siswakelas/cari',[SiswaKelasController::class,'siswakelascari']);
    Route::post('/siswakelas/tambah',[SiswaKelasController::class,'siswakelastambah']);
    Route::get('/siswakelas/hapus/{idsiswakelas}',[SiswaKelasController::class,'siswakelashapus']);
    Route::put('/siswakelas/edit/{idsiswakelas}', [SiswaKelasController::class,'siswakelasedit']);
    //=========================AKHIR ROUTE SISWA KELAS=========================

    //=========================AWAL ROUTE BAYAR SPP=========================
    Route::get('/spp', [SppController::class,'spp']);
    Route::get('/spp/cari',[SppController::class,'sppcari']);
    Route::post('/spp/tambah',[SppController::class,'spptambah']);
    //=========================AKHIR ROUTE BAYAR SPP=========================

    //=========================AWAL ROUTE BAYAR DSP=========================
    Route::get('/dsp',[DspController::class,'dsp']);
    Route::get('/dsp/cari',[DspController::class,'dspcari']);
    Route::post('/dsp/tambah',[DspController::class,'dsptambah']);
    //=========================AKHIR ROUTE BAYAR DSP=========================

    //=========================AWAL ROUTE LAPORAN=========================
    Route::get('/laporan',[LaporanController::class,'laporan']);
    Route::get('/laporan/cari',[LaporanController::class,'laporancari']);
    Route::get('/laporan/cetakpdf',[LaporanController::class,'laporancetakpdf']);
    //=========================AKHIR ROUTE LAPORAN=========================

    //=========================AWAL ROUTE JENIS BAYAR DETAIL=========================
    Route::get('/jenisbayardetail',[JenisBayarDetailController::class,'tampil']);
    Route::post('/jenisbayardetail/tambah',[JenisBayarDetailController::class,'tambah']);
    Route::get('/jenisbayardetail/hapus/{idjenisbayardetail}',[JenisBayarDetailController::class,'hapus']);
    Route::put('/jenisbayardetail/edit/{idjenisbayardetail}',[JenisBayarDetailController::class,'edit']);
    //=========================AKHIR ROUTE JENIS BAYAR DETAIL=========================

    //=========================AWAL ROUTE PERUSAHAAN & LOKER=========================
    Route::resource('/perusahaan', PerusahaanController::class);
    Route::put('/perusahaan/update/{id}', [PerusahaanController::class, 'update'])->name('perusahaan.update');

    Route::resource('pengumuman', PengumumanAdminController::class);

    Route::resource('/umkm', UMKMAdminController::class);

    //=========================AKHIR ROUTE PERUSAHAAN & LOKER=========================
});
