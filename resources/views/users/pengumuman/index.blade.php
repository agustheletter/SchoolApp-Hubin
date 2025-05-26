@extends('layouts.app')

@section('title', 'Semua Pengumuman')

@section('content')
<div class="min-h-screen bg-gray-50">
    <div class="container mx-auto px-6 py-8">
        <!-- Back Button -->
        <x-button variant="ghost" href="{{ route('landingpage') }}" class="inline-flex items-center mb-6 px-4 py-2 text-gray-600 hover:text-gray-800 transition">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Kembali ke Beranda
        </x-button>

        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800 mb-4">Semua Pengumuman</h1>
            <div class="w-20 h-1 bg-blue-400 mx-auto mb-4"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Temukan semua informasi terbaru seputar kegiatan hubungan industri, lowongan kerja, dan peluang pengembangan karir.
            </p>
        </div>

        <!-- Search and Filter -->
        <div class="flex flex-col md:flex-row gap-4 mb-8">
            <div class="relative flex-1">
                <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <input type="text" id="search" placeholder="Cari pengumuman..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>
            <button class="flex items-center px-4 py-2 border border-gray-300 rounded-md hover:bg-gray-50 transition">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.414A1 1 0 013 6.707V4z"></path>
                </svg>
                Filter
            </button>
        </div>

        <!-- Announcements Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12" id="announcements-grid">
            @foreach($announcements as $announcement)
            <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-2 announcement-card"
            data-title="{{ strtolower($announcement->judul_pengumuman) }}"
            data-description="{{ strtolower(strip_tags($announcement->isi_pengumuman)) }}"
            data-category="{{ strtolower($announcement->kategori) }}">
                <div class="p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-blue-100 text-blue-400 rounded-full flex items-center justify-center mr-4">
                            @if($announcement->kategori == 'Lowongan Kerja')
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                </svg>
                            @elseif($announcement->kategori == 'Workshop' || $announcement->kategori == 'Pelatihan' || $announcement->kategori == 'Seminar')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                </svg>
                            @endif
                        </div>
                        <div>
                            <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded-full">
                                {{ $announcement->kategori }}
                            </span>
                            <p class="text-sm text-gray-500 mt-1">{{ \Carbon\Carbon::parse($announcement->tanggal_pengumuman)->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $announcement->judul_pengumuman }}</h3>
                    <p class="text-gray-600 mb-4">{{ Str::limit(strip_tags($announcement->isi_pengumuman), 100) }}</p>
                    <a href="{{ route('pengumumandetail', $announcement->id) }}" class="text-blue-400 hover:text-blue-500 inline-flex items-center">
                        Selengkapnya 
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        <div id="loading-indicator" class="text-center text-gray-500 py-6 hidden">
            <svg class="mx-auto animate-spin h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
            </svg>
            Memuat pengumuman...
        </div>
        <!-- Pagination -->
        {{-- <div class="flex justify-center" id="pagination">
            {{ $announcements->links('components.pagination') }}
        </div> --}}
    </div>
</div>

<script>
// Search functionality
document.getElementById('search').addEventListener('input', function(e) {
    const searchTerm = e.target.value.toLowerCase();
    const cards = document.querySelectorAll('.announcement-card');
    
    cards.forEach(card => {
        const title = card.dataset.title;
        const description = card.dataset.description;
        const category = card.dataset.category;
        
        if (title.includes(searchTerm) || description.includes(searchTerm) || category.includes(searchTerm)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});

let page = 2;
let isLoading = false;
let hasMore = true;

window.addEventListener('scroll', () => {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 100 && !isLoading && hasMore) {
        isLoading = true;
        document.getElementById('loading-indicator').classList.remove('hidden');

        fetch(`/pengumuman/load?page=${page}`)
            .then(response => response.json())
            .then(data => {
                data.data.forEach(item => {
                    const card = document.createElement('div');
                    card.className = 'bg-white rounded-lg shadow-md hover:shadow-lg transition-all duration-300 hover:-translate-y-2 announcement-card';
                    card.dataset.title = item.title.toLowerCase();
                    card.dataset.description = item.description.toLowerCase();
                    card.dataset.category = item.category.toLowerCase();
                    card.innerHTML = `
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="w-10 h-10 bg-blue-100 text-blue-400 rounded-full flex items-center justify-center mr-4">
                                    ${getIcon(item.category)}
                                </div>
                                <div>
                                    <span class="text-xs bg-blue-100 text-blue-600 px-2 py-1 rounded-full">${item.category}</span>
                                    <p class="text-sm text-gray-500 mt-1">${item.date}</p>
                                </div>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">${item.title}</h3>
                            <p class="text-gray-600 mb-4">${item.description}</p>
                            <a href="/pengumuman/${item.id}" class="text-blue-400 hover:text-blue-500 inline-flex items-center">
                                Selengkapnya 
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    `;
                    document.getElementById('announcements-grid').appendChild(card);
                });

                hasMore = data.has_more;
                page++;
                isLoading = false;
                document.getElementById('loading-indicator').classList.add('hidden');
            });
    }
});

function getIcon(category) {
    if (category === 'Lowongan Kerja') {
        return `<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                </svg>`;
    } else if (['Workshop', 'Pelatihan', 'Seminar'].includes(category)) {
        return `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>`;
    } else {
        return `<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                </svg>`;
    }
}
</script>
@endsection