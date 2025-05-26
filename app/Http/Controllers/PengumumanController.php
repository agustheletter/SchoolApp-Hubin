<?php

namespace App\Http\Controllers;

use App\Models\PengumumanModel as Pengumuman;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PengumumanController extends Controller
{
    public function index(Request $request): View
    {
        $searchTerm = $request->input('search');

        $query = Pengumuman::query();

        if ($searchTerm) {
            $query->where(function ($q) use ($searchTerm) {
                $q->where('judul_pengumuman', 'like', '%' . $searchTerm . '%')
                  ->orWhere('isi_pengumuman', 'like', '%' . $searchTerm . '%')
                  ->orWhere('kategori', 'like', '%' . $searchTerm . '%');
            });
        }

        $announcements = $query->orderBy('tanggal_pengumuman', 'desc')->paginate(6);

        return view('users.pengumuman.index', [
            'paginatedItems' => $announcements,
            'searchTerm' => $searchTerm,
            'currentPage' => $announcements->currentPage(),
            'totalPages' => $announcements->lastPage(),
            'totalItems' => $announcements->total(),
            'announcements' => $announcements->items(),
        ]);
    }

    public function detail(string $id): View
    {
        $announcement = Pengumuman::findOrFail($id);

        return view('users.pengumuman.detail', compact('announcement'));
    }

    public function loadMore(Request $request)
    {
        $currentPage = $request->input('page', 1);
        $itemsPerPage = 6;

        $query = Pengumuman::orderBy('tanggal_pengumuman', 'desc');

        $announcements = $query->paginate($itemsPerPage, ['*'], 'page', $currentPage);

        return response()->json([
            'data' => $announcements->items(),
            'next_page' => $announcements->currentPage() + 1,
            'has_more' => $announcements->hasMorePages(),
        ]);
    }
}
