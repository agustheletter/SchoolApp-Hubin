@extends('layouts.app')

@section('title', $announcement->judul_pengumuman)

@section('content')
<div class="container mx-auto px-6 py-8">
    <x-button variant="ghost" as="a" href="{{ route('pengumuman') }}" class="mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg>
        Kembali ke Semua Pengumuman
    </x-button>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-6">
            <x-card>
                <img src="{{ asset($announcement->gambar) }}" alt="{{ $announcement->judul_pengumuman }}" class="w-full h-64 object-cover rounded-t-lg"/>
                <div class="p-8">
                  <div class="flex items-center flex-wrap gap-4 text-sm text-gray-600 mb-4">
                    <div class="flex items-center">
                        <!-- Ikon Kalender -->
                        {{ \Carbon\Carbon::parse($announcement->tanggal_pengumuman)->translatedFormat('d F Y') }}
                    </div>
                    <div class="flex items-center">
                        <!-- Ikon Penulis -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-1"><path d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0z"/><path d="M16.24 7.76a3.5 3.5 0 1 1-4.95-4.95"/></svg>
                        <!-- Penulis (bisa ganti ke 'Admin' atau kolom user jika ada) -->
                        Tim HUBIN SMKN 1 Cimahi
                    </div>
                    <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs font-medium">
                        {{ $announcement->kategori }}
                    </div>
                  </div>
                  <h1 class="text-3xl font-bold text-gray-800 mb-6">{{ $announcement->judul_pengumuman }}</h1>
                  <x-button variant="outline" size="sm">
                      <!-- Tombol Bagikan -->
                      Bagikan
                  </x-button>
                </div>
            </x-card>

            <x-card>
                <x-card-content-desc class="p-8">
                    <div class="prose prose-gray max-w-none">
                        {!! $announcement->isi_pengumuman !!}
                    </div>
                </x-card-content-desc>
            </x-card>

            @if(!empty($announcement->lampiran))
            <x-card>
                <x-card-header>
                    <x-card-title class="flex items-center text-xl">
                        Lampiran
                    </x-card-title>
                </x-card-header>
                <x-card-content>
                  <div class="space-y-3">
                    @foreach($announcement->lampiran as $file)
                      <div class="flex items-center justify-between p-4 border rounded-lg">
                        <div class="flex items-center">
                          <div>
                            <p class="font-medium text-gray-800">{{ $file['name'] }}</p>
                            <p class="text-sm text-gray-600">{{ $file['size'] }}</p>
                          </div>
                        </div>
                        <x-button size="sm" variant="outline" as="a" href="{{ $file['url'] }}" download>
                          Unduh
                        </x-button>
                      </div>
                    @endforeach
                  </div>
                </x-card-content>
            </x-card>
            @endif
        </div>

        <div class="space-y-6">
            <x-card>
              <x-card-header><x-card-title class="text-xl">Informasi Penting</x-card-title></x-card-header>
              <x-card-content class="space-y-4">
                <div class="flex items-center">
                  <div>
                    <p class="font-medium text-gray-800">Batas Waktu</p>
                    <p class="text-sm text-gray-600">
                      {{ \Carbon\Carbon::parse($announcement->tanggal_berakhir)->translatedFormat('d F Y') }}
                    </p>
                  </div>
                </div>
                <div class="flex items-center">
                  <div>
                    <p class="font-medium text-gray-800">Lokasi</p>
                    <p class="text-sm text-gray-600">{{ $announcement->lokasi }}</p>
                  </div>
                </div>
              </x-card-content>
            </x-card>

            <x-card>
              <x-card-header><x-card-title class="text-xl">Kontak</x-card-title></x-card-header>
              <x-card-content class="space-y-4">
                <div>
                  <p class="font-medium text-gray-800">Email</p>
                  <p class="text-sm text-blue-600 break-all">{{ $announcement->kontak_email }}</p>
                </div>
                <div>
                  <p class="font-medium text-gray-800">Telepon</p>
                  <p class="text-sm text-gray-600">{{ $announcement->kontak_telepon }}</p>
                </div>
              </x-card-content>
            </x-card>

            <x-card>
              <x-card-header><x-card-title class="text-xl">Berkas yang Dibutuhkan</x-card-title></x-card-header>
              <x-card-content>
              <ul class="space-y-2">
                @foreach($announcement->berkas_dibutuhkan as $req)
                  <li class="flex items-start">
                    <div class="w-2 h-2 bg-blue-400 rounded-full mt-2 mr-3 flex-shrink-0"></div>
                    <span class="text-sm text-gray-600">{{ $req }}</span>
                  </li>
                @endforeach
              </ul>
              </x-card-content>
            </x-card>
        </div>
    </div>
</div>
@endsection
