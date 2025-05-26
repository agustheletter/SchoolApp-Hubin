@extends('layouts.app')

@section('title', $umkm['name'])

@section('content')
<div class="container mx-auto px-6 py-8">
    <x-button variant="ghost" as="a" href="{{ route('umkm') }}" class="mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
        Kembali ke Semua UMKM
    </x-button>

    <x-card class="mb-8">
        <div class="p-8">
            <div class="flex flex-col md:flex-row items-start gap-6">
                <img src="{{ $umkm['images'][0] }}" alt="{{ $umkm['name'] }}" class="w-full md:w-1/3 h-64 object-cover rounded-lg shadow-lg"/>
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-3">
                        <h1 class="text-3xl font-bold text-gray-800">{{ $umkm['name'] }}</h1>
                        <div class="bg-blue-400 text-white px-3 py-1 rounded-full text-sm font-medium flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-3 h-3 mr-1"><path d="M12 2H2v10l9.29 9.29c.94.94 2.48.94 3.42 0l6.58-6.58c.94-.94.94-2.48 0-3.42L12 2Z"/><path d="M7 7h.01"/></svg>
                            {{ $umkm['category'] }}
                        </div>
                    </div>
                    <div class="flex items-center flex-wrap gap-4 text-gray-600 mb-4">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            {{ $umkm['owner'] }} - {{ $umkm['ownerProfile'] }}
                        </div>
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M8 2v4"/><path d="M16 2v4"/><rect width="18" height="18" x="3" y="4" rx="2"/><path d="M3 10h18"/></svg>
                            Didirikan {{ $umkm['established'] }}
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="flex items-center">
                            @for ($i = 1; $i <= 5; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 {{ $i <= round($umkm['rating']) ? 'text-yellow-400 fill-current' : 'text-gray-300' }}"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                            @endfor
                        </div>
                        <span class="text-gray-600">({{ number_format($umkm['rating'], 1) }}/5.0)</span>
                    </div>
                    <div class="flex gap-4">
                        <x-button as="a" href="tel:{{ $umkm['phone'] }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            Hubungi
                        </x-button>
                        <x-button variant="outline" as="a" href="{{ $umkm['website'] }}" target="_blank">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" x2="21" y1="14" y2="3"/></svg>
                            Lihat Instagram
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Konten Utama --}}
        <div class="lg:col-span-2 space-y-8">
            <x-card>
              <x-card-header><x-card-title class="text-xl">Galeri Produk</x-card-title></x-card-header>
              <x-card-content>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                  @foreach($umkm['images'] as $image)
                    <img src="{{ $image }}" alt="Produk {{ $umkm['name'] }}" class="w-full h-48 object-cover rounded-lg"/>
                  @endforeach
                </div>
              </x-card-content>
            </x-card>

            <x-card>
              <x-card-header><x-card-title class="text-xl">Tentang Usaha</x-card-title></x-card-header>
              <x-card-content>
                <p class="text-gray-600 leading-relaxed">{{ $umkm['description'] }}</p>
              </x-card-content>
            </x-card>

            <x-card>
              <x-card-header><x-card-title class="text-xl">Produk Unggulan</x-card-title></x-card-header>
              <x-card-content>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                  @foreach($umkm['products'] as $product)
                    <div class="border rounded-lg p-4">
                      <div class="flex justify-between items-start mb-2">
                        <h3 class="font-semibold text-gray-800">{{ $product['name'] }}</h3>
                        <span class="text-blue-600 font-semibold">{{ $product['price'] }}</span>
                      </div>
                      <p class="text-gray-600 text-sm">{{ $product['description'] }}</p>
                    </div>
                  @endforeach
                </div>
              </x-card-content>
            </x-card>

            <x-card>
              <x-card-header><x-card-title class="text-xl">Prestasi & Sertifikasi</x-card-title></x-card-header>
              <x-card-content>
                <div class="space-y-3">
                  @foreach($umkm['achievements'] as $achievement)
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-yellow-400 mr-3 flex-shrink-0 fill-current"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                      <span class="text-gray-600">{{ $achievement }}</span>
                    </div>
                  @endforeach
                </div>
              </x-card-content>
            </x-card>
        </div>

        {{-- Sidebar --}}
        <div class="space-y-6">
            <x-card>
              <x-card-header><x-card-title class="text-xl">Informasi Kontak</x-card-title></x-card-header>
              <x-card-content class="space-y-4">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-blue-400 mr-3"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    <span class="text-gray-600">{{ $umkm['phone'] }}</span>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-blue-400 mr-3"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    <span class="text-gray-600 break-all">{{ $umkm['email'] }}</span>
                </div>
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-blue-400 mr-3"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                    <span class="text-gray-600">{{ $umkm['location'] }}</span>
                </div>
              </x-card-content>
            </x-card>

            <x-card>
              <x-card-header><x-card-title class="text-xl">Jam Operasional</x-card-title></x-card-header>
              <x-card-content><p class="text-gray-600">{{ $umkm['operatingHours'] }}</p></x-card-content>
            </x-card>

            <x-card>
              <x-card-header><x-card-title class="text-xl">Area Pengiriman</x-card-title></x-card-header>
              <x-card-content>
                <ul class="space-y-2">
                  @foreach($umkm['deliveryAreas'] as $area)
                    <li class="flex items-center">
                      <div class="w-2 h-2 bg-blue-400 rounded-full mr-3"></div>
                      <span class="text-gray-600">{{ $area }}</span>
                    </li>
                  @endforeach
                </ul>
              </x-card-content>
            </x-card>
        </div>
    </div>
</div>
@endsection