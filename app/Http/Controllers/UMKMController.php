<?php
// File: app/Http/Controllers/UMKMController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class UMKMController extends Controller
{
    /**
     * Menampilkan daftar semua UMKM dengan paginasi dan fungsionalitas pencarian.
     */
    public function index(Request $request): View
    {
        $umkmItems = [
            ['id' => 1, 'image' => 'https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=400&h=300&fit=crop', 'category' => 'Makanan', 'title' => 'Kue Basah Alika', 'description' => 'Usaha kue tradisional yang dikelola oleh Alika, alumni Jurusan Tata Boga tahun 2020.', 'location' => 'Cimahi', 'owner' => 'Alika Sari'],
            ['id' => 2, 'image' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400&h=300&fit=crop', 'category' => 'Teknologi', 'title' => 'Cimahi Tech Solution', 'description' => 'Jasa pembuatan website dan aplikasi mobile oleh tim siswa Jurusan RPL.', 'location' => 'Online', 'owner' => 'Tim RPL 2021'],
            ['id' => 3, 'image' => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w=400&h=300&fit=crop', 'category' => 'Kerajinan', 'title' => 'Kayu Kreatif', 'description' => 'Produk kerajinan kayu dengan desain modern oleh siswa Jurusan Teknik Furnitur.', 'location' => 'Bandung', 'owner' => 'Rudi Hartono'],
            ['id' => 4, 'image' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?w=400&h=300&fit=crop', 'category' => 'Makanan', 'title' => 'Bakso Elektronik', 'description' => 'Warung bakso dengan sistem pemesanan digital oleh alumni Teknik Elektronika.', 'location' => 'Cimahi', 'owner' => 'Ahmad Fauzi'],
            ['id' => 5, 'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=300&fit=crop', 'category' => 'Fashion', 'title' => 'Cimahi Apparel', 'description' => 'Brand clothing lokal dengan desain unik karya siswa Jurusan Tata Busana.', 'location' => 'Cimahi', 'owner' => 'Siti Nurhaliza'],
            ['id' => 6, 'image' => 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?w=400&h=300&fit=crop', 'category' => 'Teknologi', 'title' => 'Smart Home Solutions', 'description' => 'Solusi rumah pintar dengan IoT oleh siswa Teknik Elektronika.', 'location' => 'Bandung', 'owner' => 'Dedi Kurniawan']
        ];

        $searchTerm = $request->get('search', '');
        $currentPage = $request->get('page', 1);
        $itemsPerPage = 6;

        if ($searchTerm) {
            $umkmItems = array_filter($umkmItems, function($item) use ($searchTerm) {
                return stripos($item['title'], $searchTerm) !== false || 
                       stripos($item['description'], $searchTerm) !== false ||
                       stripos($item['category'], $searchTerm) !== false;
            });
        }

        $totalItems = count($umkmItems);
        $totalPages = ceil($totalItems / $itemsPerPage);
        $offset = ($currentPage - 1) * $itemsPerPage;
        $paginatedItems = array_slice(array_values($umkmItems), $offset, $itemsPerPage);

        // Menggunakan path view 'users.umkm.index' sesuai kode Anda
        return view('users.umkm.index', compact('paginatedItems', 'searchTerm', 'currentPage', 'totalPages', 'totalItems'));
    }

    /**
     * Menampilkan halaman detail dari sebuah UMKM.
     * Saya menggunakan nama method 'detail' sesuai kode yang Anda berikan.
     */
    public function detail(string $id): View
    {
        // Data dummy ini digunakan untuk memastikan halaman detail sama persis dengan desain awal
        $umkm = [
            'id' => $id,
            'name' => 'Kue Basah Alika',
            'category' => 'Makanan',
            'images' => [
                'https://images.unsplash.com/photo-1558961363-fa8fdf82db35?w=600&h=400&fit=crop',
                'https://images.unsplash.com/photo-1567620905732-2d1ec7ab7445?w=600&h=400&fit=crop',
                'https://images.unsplash.com/photo-1571091718767-18b5b1457add?w=600&h=400&fit=crop'
            ],
            'description' => 'Kue Basah Alika adalah usaha kuliner tradisional yang didirikan oleh Alika Sari, alumni Jurusan Tata Boga SMKN 1 Cimahi tahun 2020. Kami menghadirkan berbagai kue basah tradisional Indonesia dengan cita rasa autentik dan kualitas terbaik.',
            'owner' => 'Alika Sari',
            'ownerProfile' => 'Alumni Tata Boga 2020',
            'established' => '2021',
            'location' => 'Cimahi, Jawa Barat',
            'phone' => '+62 812 3456 7890',
            'email' => 'kuebasahalika@gmail.com',
            'website' => 'https://instagram.com/kuebasahalika',
            'rating' => 4.8,
            'products' => [
                ['name' => 'Klepon', 'price' => 'Rp 15.000/box', 'description' => 'Klepon isi gula merah dan kelapa parut'],
                ['name' => 'Onde-onde', 'price' => 'Rp 20.000/box', 'description' => 'Onde-onde isi kacang hijau']
            ],
            'achievements' => [
                'Juara 1 Lomba Kuliner Tradisional Cimahi 2022',
                'Sertifikat Halal MUI',
            ],
            'operatingHours' => 'Senin - Sabtu: 08.00 - 18.00 WIB',
            'deliveryAreas' => ['Cimahi', 'Bandung']
        ];

        // Mengarahkan ke view 'users.umkm.detail' sesuai kode Anda.
        return view('users.umkm.detail', [
            'umkm' => $umkm
        ]);
    }
}