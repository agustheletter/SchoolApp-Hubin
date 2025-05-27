<?php
// File: app/Http/Controllers/UMKMController.php

namespace App\Http\Controllers;

use App\Models\UsahaSiswaModel;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UMKMController extends Controller
{
    /**
     * Menampilkan daftar semua UMKM dengan paginasi dan fungsionalitas pencarian.
     */
    public function index(Request $request): View
    {
        $searchTerm = $request->get('search', '');
        $itemsPerPage = 6;

        // Start query
        $query = UsahaSiswaModel::query();

        // Apply search if present
        if (!empty($searchTerm)) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('nama_usaha', 'like', '%' . $searchTerm . '%')
                  ->orWhere('deskripsi_usaha', 'like', '%' . $searchTerm . '%')
                  ->orWhere('kategori_usaha', 'like', '%' . $searchTerm . '%');
            });
        }

        // Paginate the results
        $usaha = $query->orderBy('created_at', 'desc')->paginate($itemsPerPage)->withQueryString();

        // Pass pagination data
        return view('users.umkm.index', [
            'usaha' => $usaha,
            'paginatedItems' => $usaha->items(),
            'searchTerm' => $searchTerm,
            'currentPage' => $usaha->currentPage(),
            'totalPages' => $usaha->lastPage(),
            'totalItems' => $usaha->total()
        ]);
    }

}