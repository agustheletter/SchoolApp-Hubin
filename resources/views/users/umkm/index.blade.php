@extends('layouts.app')

@section('title', 'Semua UMKM - HUBIN SMKN 1 Cimahi')

@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Header -->
    <div class="bg-white shadow-sm">
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
            <h1 class="text-4xl font-bold text-gray-800 mb-4">UMKM Siswa & Alumni</h1>
            <div class="w-20 h-1 bg-blue-400 mx-auto mb-4"></div>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Dukung usaha kecil menengah yang dikelola oleh siswa dan alumni SMKN 1 Cimahi.
            </p>
        </div>

            <!-- Search and Filter -->
            <div class="flex flex-col md:flex-row gap-4 mb-8">
                <div class="flex-1">
                    <form method="GET" action="{{ route('umkm') }}" class="relative">
                        <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <input 
                            type="text" 
                            name="search"
                            value="{{ $searchTerm }}"
                            placeholder="Cari UMKM..."
                            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        />
                        <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-blue-500 text-white px-4 py-1 rounded-md hover:bg-blue-600 transition-colors">
                            Cari
                        </button>
                    </form>
                </div>
                <button class="flex items-center px-4 py-2 border border-gray-300 rounded-lg hover:bg-gray-50 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.207A1 1 0 013 6.5V4z"></path>
                    </svg>
                    Filter
                </button>
            </div>
        </div>
    </div>

    <!-- UMKM Grid -->
    <div class="container mx-auto px-6 py-8">
        @if(count($paginatedItems) > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($paginatedItems as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-48">
                        <img 
                            src="{{ $item['image'] }}" 
                            alt="{{ $item['title'] }}" 
                            class="w-full h-full object-cover"
                        />
                        <div class="absolute top-4 right-4 bg-blue-400 text-white px-3 py-1 rounded-full text-xs font-medium flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            {{ $item['category'] }}
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $item['title'] }}</h3>
                        <p class="text-gray-600 mb-4 text-sm">{{ $item['description'] }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-blue-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-sm text-gray-600">{{ $item['location'] }}</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="text-sm text-gray-600">{{ $item['owner'] }}</span>
                            </div>
                            <a href="{{ route('umkmdetail', $item['id']) }}" class="text-blue-400 hover:text-blue-500 text-sm font-medium flex items-center">
                                Kunjungi 
                                <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            @if($totalPages > 1)
            <div class="mt-12">
                <nav class="flex justify-center">
                    <ul class="flex flex-row items-center gap-1">
                        @if($currentPage > 1)
                        <li>
                            <a href="{{ route('umkm.index', ['page' => $currentPage - 1, 'search' => $searchTerm]) }}" 
                               class="flex items-center justify-center px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                                Previous
                            </a>
                        </li>
                        @endif
                        
                        @for($i = 1; $i <= $totalPages; $i++)
                        <li>
                            <a href="{{ route('umkm.index', ['page' => $i, 'search' => $searchTerm]) }}" 
                               class="flex items-center justify-center px-3 py-2 text-sm font-medium {{ $i == $currentPage ? 'text-blue-600 bg-blue-50 border border-blue-300' : 'text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700' }}">
                                {{ $i }}
                            </a>
                        </li>
                        @endfor
                        
                        @if($currentPage < $totalPages)
                        <li>
                            <a href="{{ route('umkm.index', ['page' => $currentPage + 1, 'search' => $searchTerm]) }}" 
                               class="flex items-center justify-center px-3 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700">
                                Next
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
            @endif
        @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.291-1.1-5.5-2.709"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada UMKM ditemukan</h3>
                <p class="mt-1 text-sm text-gray-500">Coba ubah kata kunci pencarian Anda.</p>
            </div>
        @endif
    </div>
</div>
@endsection