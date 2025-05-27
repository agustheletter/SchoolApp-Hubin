<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HUBIN SMKN 1 Cimahi | Hubungan Industri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary: #38b6ff;
            /* biru muda yang lebih modern */
            --secondary: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }

        .hero-bg {
            background: linear-gradient(135deg, rgba(56, 182, 255, 0.3) 0%, rgba(255, 255, 255, 1) 100%);
            /* background: linear-gradient(135deg, rgba(56, 182, 255, 0.05) 0%, rgba(240, 248, 255, 0.5) 50%, rgba(255, 255, 255, 1) 100%); */
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: -1;
        }

        .grid-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image:
                linear-gradient(rgba(113, 113, 113, 0.458) 1px, transparent 1px),
                linear-gradient(90deg, rgba(150, 150, 150, 0.395) 1px, transparent 1px);
            background-size: 40px 40px;
            z-index: -3;
            opacity: 0.5;
        }

        .floating-dots {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            opacity: 0.3;
        }

        .dot {
            position: absolute;
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background-color: #000000);
            animation: float 15s infinite linear;
        }

        @keyframes float {
            0% {
                transform: translate(0, 0) scale(1);
                opacity: 0.8;
            }

            50% {
                transform: translate(100px, -50px) scale(1.5);
                opacity: 0.3;
            }

            100% {
                transform: translate(200px, 0) scale(1);
                opacity: 0.8;
            }
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .fade-in {
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .slide-up {
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }

            100% {
                transform: scale(1);
            }
        }

        .scroll-down {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            color: var(--primary);
            font-size: 2rem;
            animation: bounce 2s infinite;
            cursor: pointer;
            z-index: 10;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0) translateX(-50%);
            }

            40% {
                transform: translateY(-20px) translateX(-50%);
            }

            60% {
                transform: translateY(-10px) translateX(-50%);
            }
        }

        .icon-container {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 48px;
            height: 48px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .feature-icon {
            font-size: 1.25rem;
        }

        /* Style untuk Notifikasi Toast */
        .toast-notification {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            padding: 1rem 1.5rem;
            border-radius: 0.5rem;
            background-color: #28a745;
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: flex;
            align-items: center;
            opacity: 0;
            transform: translateX(100%);
            transition: all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .toast-notification.show {
            opacity: 1;
            transform: translateX(0);
        }

        /* Logo Carousel Styles */
        .logo-carousel {
            width: 100%;
            /* Match parent container width */
            margin: 0;
            /* Remove default margins if any */
            padding: 0;
            /* Remove default paddings if any */
            overflow-x: hidden;
            /* Hide the horizontal scrollbar */
            position: relative;
            /* For potential absolute positioning of controls */
            height: 120px;
            /* Adjust height as needed */
            display: flex;
            /* Use flex to align items vertically */
            align-items: center;
            /* Center logos vertically */
        }

        .logo-track {
            display: flex;
            flex-wrap: nowrap;
            animation: scroll 40s linear infinite;
            will-change: transform;
            /* Tambahan potensial untuk smoothing */
            transform-style: preserve-3d;
            backface-visibility: hidden;
        }

        .logo-item {
            width: 140px;
            height: 100px;
            margin: 0 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: transparent;
            padding: 10px;
            box-sizing: border-box;
        }

        .logo-item:hover {
            transform: scale(1.1);
            /* Slight scale on hover */
        }

        /* Pause animation on logo track hover (optional, but good for UX) */
        /* .logo-carousel:hover .logo-track {
            animation-play-state: paused;
        } */
        /* Pause animation on individual logo hover */
        /* .logo-item:hover ~ .logo-track,
        .logo-track:hover {
            animation-play-state: paused;
        } */


        .logo-img {
            max-height: 80px;
            /* boleh dinaikkan */
            max-width: 100%;
            width: auto;
            height: auto;
            object-fit: contain;
            filter: grayscale(100%);
            opacity: 0.7;
            transition: all 0.3s ease;
        }

        .logo-item:hover .logo-img {
            filter: grayscale(0%);
            opacity: 1;
        }

        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
                /* Move half the track for seamless loop with duplicated content */
            }
        }
    </style>
</head>

<body class="bg-white text-gray-800">
    <!-- Navigation -->
    @include('components.navigation')

    <!-- Hero Section (without image) -->
    <section id="home" class="hero-bg min-h-screen flex items-center relative overflow-hidden">

        <div id="particles-js"></div>
        <div class="grid-pattern"></div>
        <div class="floating-dots" id="floating-dots"></div>

        <div class="container mx-auto px-6 text-center md:text-left">
            <div class="max-w-3xl mx-auto fade-in">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight mb-4">
                    <span class="text-blue-400">HUBIN</span> SMKN 1 Cimahi
                </h1>
                <p class="text-lg md:text-xl text-gray-600 mb-8">
                    Menghubungkan industri dengan dunia pendidikan untuk menciptakan lulusan yang kompeten dan siap
                    kerja.
                </p>
                <div
                    class="flex flex-col sm:flex-row justify-center md:justify-start space-y-4 sm:space-y-0 sm:space-x-4">
                    <a href="#pengumuman"
                        class="bg-blue-400 hover:bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg transition transform hover:scale-105">
                        Lihat Pengumuman
                    </a>
                    <a href="#kontak"
                        class="border border-blue-400 text-blue-400 hover:bg-blue-50 px-6 py-3 rounded-lg shadow-lg transition transform hover:scale-105">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
        <div class="scroll-down" onclick="scrollToNextSection()">
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    <!-- Fitur Section -->
    <section id="fitur" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Fitur Unggulan</h2>
                <div class="w-20 h-1 bg-blue-400 mx-auto"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                    Layanan yang kami sediakan untuk mendukung hubungan antara sekolah, siswa, dan industri.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Fitur 1 -->
                <div class="bg-white rounded-lg shadow-md p-6 text-center card-hover">
                    <div class="icon-container bg-blue-100 text-blue-400 mx-auto mb-4">
                        <i class="fas fa-bullhorn feature-icon"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Informasi Lowongan</h3>
                    <p class="text-gray-600">
                        Akses informasi lowongan kerja terbaru dari berbagai perusahaan mitra.
                    </p>
                </div>

                <!-- Fitur 2 -->
                <div class="bg-white rounded-lg shadow-md p-6 text-center card-hover">
                    <div class="icon-container bg-blue-100 text-blue-400 mx-auto mb-4">
                        <i class="fas fa-calendar-check feature-icon"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Jadwal Magang</h3>
                    <p class="text-gray-600">
                        Informasi lengkap tentang program magang dan jadwal pelaksanaannya.
                    </p>
                </div>

                <!-- Fitur 3 -->
                <div class="bg-white rounded-lg shadow-md p-6 text-center card-hover">
                    <div class="icon-container bg-blue-100 text-blue-400 mx-auto mb-4">
                        <i class="fas fa-handshake feature-icon"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Kemitraan</h3>
                    <p class="text-gray-600">
                        Fasilitas kerjasama antara sekolah dengan dunia industri.
                    </p>
                </div>

                <!-- Fitur 4 -->
                <div class="bg-white rounded-lg shadow-md p-6 text-center card-hover">
                    <div class="icon-container bg-blue-100 text-blue-400 mx-auto mb-4">
                        <i class="fas fa-store feature-icon"></i>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">UMKM Siswa</h3>
                    <p class="text-gray-600">
                        Wadah untuk mempromosikan usaha siswa dan alumni SMKN 1 Cimahi.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Pengumuman Section -->
    <section id="pengumuman" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Pengumuman Terbaru</h2>
                <div class="w-20 h-1 bg-blue-400 mx-auto"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                    Informasi terbaru seputar kegiatan hubungan industri dan peluang kerja bagi siswa SMKN 1 Cimahi.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($pengumuman as $item)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden card-hover">
                        <div class="p-6">
                            <div class="flex items-center mb-4">
                                <div class="icon-container bg-blue-100 text-blue-400 mr-4">
                                @if($item->kategori == 'Lowongan Kerja')
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                @elseif($item->kategori == 'Workshop' || $item->kategori == 'Pelatihan' || $item->kategori == 'Seminar')
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                @else
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                                    </svg>
                                @endif
                                </div>
                                <span class="text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($item->tanggal_pengumuman)->translatedFormat('d F Y') }}
                                </span>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-2">
                                {{ $item->judul_pengumuman }}
                            </h3>
                            <p class="text-gray-600 mb-4">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->isi_pengumuman), 120) }}
                            </p>
                            <a href="{{ route('pengumumandetail', $item->id) }}" class="text-blue-400 hover:text-blue-500 font-medium flex items-center">
                                Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a href="{{ route('pengumuman') }}"
                    class="inline-block bg-blue-400 hover:bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg transition transform hover:scale-105">
                    Lihat Semua Pengumuman
                </a>
            </div>
        </div>
    </section>

    <!-- Kerjasama Section -->
    <section id="kerjasama" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Mitra Kerjasama</h2>
                <div class="w-20 h-1 bg-blue-400 mx-auto"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                    Perusahaan-perusahaan yang telah bekerja sama dengan SMKN 1 Cimahi dalam program magang dan
                    rekrutmen.
                </p>
            </div>
        </div>
        <div class="full-width-carousel">
            <div class="logo-carousel mb-12">
                <div class="logo-track">
                    @foreach ($perusahaan as $ps)
                        <div class="logo-item">
                            <a href="{{ $ps->website ?? '#' }}" target="_blank">
                                <img src="{{ asset($ps->logo) }}" alt="{{ $ps->nama }}" class="logo-img">
                            </a>
                        </div>
                    @endforeach

                    @foreach ($perusahaan as $ps)
                        <div class="logo-item">
                            <a href="{{ $ps->website ?? '#' }}" target="_blank">
                                <img src="{{ asset($ps->logo) }}" alt="{{ $ps->nama }}" class="logo-img">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container mx-auto px-6">
            <div class="bg-blue-50 rounded-xl p-8 md:p-12 shadow-inner">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 mb-8 md:mb-0 md:pr-8">
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">Ingin Bermitra dengan Kami?</h3>
                        <p class="text-gray-600 mb-6">
                            SMKN 1 Cimahi membuka peluang kerjasama dengan berbagai perusahaan untuk program magang,
                            rekrutmen, dan pengembangan kurikulum berbasis industri.
                        </p>
                        <a href="#kontak"
                            class="inline-block bg-blue-400 hover:bg-blue-500 text-white px-6 py-3 rounded-lg shadow-lg transition transform hover:scale-105">
                            Hubungi Tim HUBIN
                        </a>
                    </div>
                    <div class="md:w-1/2">
                        <div class="bg-white p-6 rounded-lg shadow-md">
                            <h4 class="text-lg font-semibold text-gray-800 mb-4">Keuntungan Bermitra:</h4>
                            <ul class="space-y-3">
                                <li class="flex items-start">
                                    <div class="icon-container bg-blue-100 text-blue-400 mr-3">
                                        <i class="fas fa-users feature-icon"></i>
                                    </div>
                                    <span class="text-gray-600">Rekrutmen langsung siswa berkualitas sesuai kebutuhan
                                        perusahaan</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="icon-container bg-blue-100 text-blue-400 mr-3">
                                        <i class="fas fa-graduation-cap feature-icon"></i>
                                    </div>
                                    <span class="text-gray-600">Pelatihan khusus untuk siswa sesuai standar
                                        industri</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="icon-container bg-blue-100 text-blue-400 mr-3">
                                        <i class="fas fa-book feature-icon"></i>
                                    </div>
                                    <span class="text-gray-600">Kesempatan menyusun kurikulum berbasis kompetensi
                                        industri</span>
                                </li>
                                <li class="flex items-start">
                                    <div class="icon-container bg-blue-100 text-blue-400 mr-3">
                                        <i class="fas fa-chart-line feature-icon"></i>
                                    </div>
                                    <span class="text-gray-600">Branding perusahaan di lingkungan sekolah dan komunitas
                                        pendidikan</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- UMKM Section -->
    <section id="umkm" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">UMKM Siswa & Alumni</h2>
                <div class="w-20 h-1 bg-blue-400 mx-auto"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                    Dukung usaha kecil menengah yang dikelola oleh siswa dan alumni SMKN 1 Cimahi.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($usaha as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-all duration-300 hover:-translate-y-2">
                    <div class="relative h-48">
                        <img 
                            src="{{ asset($item->gambar_usaha) }}" 
                            alt="{{ $item['title'] }}" 
                            class="w-full h-full object-cover"
                        />
                        <div class="absolute top-4 right-4 bg-blue-400 text-white px-3 py-1 rounded-full text-xs font-medium flex items-center">
                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                            </svg>
                            {{ $item->kategori_usaha ?? 'Lainnya' }}
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $item->nama_usaha }}</h3>
                        <p class="text-gray-600 mb-4 text-sm">{{ strip_tags($item->deskripsi_usaha) }}</p>
                        <div class="flex justify-between items-center mb-4">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-blue-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-sm text-gray-600">{{ $item->alamat_usaha }}</span>
                            </div>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                <span class="text-sm text-gray-600">{{ $item->pemilik_usaha }}</span>
                            </div>
                            @if ($item->sosmed_usaha)
                                <a href="{{ $item->sosmed_usaha }}" class="text-blue-400 hover:text-blue-500 text-sm font-medium flex items-center">
                                Kunjungi 
                                    <svg class="w-3 h-3 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                                    </svg>
                                </a>
                            @endif
                            
                        </div>
                    </div>
                </div>
                @endforeach
            </div>


            <div class="text-center mt-12">
                <a href="{{ route('umkm') }}"
                    class="inline-block border border-blue-400 text-blue-400 hover:bg-blue-50 px-6 py-3 rounded-lg shadow-lg transition transform hover:scale-105">
                    Lihat Semua UMKM
                </a>
            </div>
        </div>
    </section>

    @php
        $contactInfo = [
            [
                'icon' =>
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>',
                'title' => 'Alamat',
                'content' => 'Jl. Mahar Martanegara No.48, Utama, Kec. Cimahi Sel., Kota Cimahi, Jawa Barat 40533',
                'color' => 'bg-blue-100 text-blue-600',
            ],
            [
                'icon' =>
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>',
                'title' => 'Telepon',
                'content' => '(022) 667 2664',
                'color' => 'bg-green-100 text-green-600',
            ],
            [
                'icon' =>
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>',
                'title' => 'Email',
                'content' => 'hubin@smkn1cimahi.sch.id',
                'color' => 'bg-purple-100 text-purple-600',
            ],
            [
                'icon' =>
                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
                'title' => 'Jam Operasional',
                'content' => "Senin - Jumat: 08.00 - 16.00 WIB\nSabtu: 08.00 - 12.00 WIB",
                'color' => 'bg-orange-100 text-orange-600',
            ],
        ];

        $faqItems = [
            [
                'question' => 'Bagaimana cara mendaftar program magang?',
                'answer' =>
                    'Siswa dapat mendaftar melalui koordinator HUBIN di sekolah atau menghubungi kami langsung melalui kontak yang tersedia.',
            ],
            [
                'question' => 'Apakah ada biaya untuk program kerjasama?',
                'answer' =>
                    'Program kerjasama dengan perusahaan tidak dikenakan biaya. Justru kami memberikan fasilitas dan dukungan penuh.',
            ],
            [
                'question' => 'Bagaimana cara mendaftarkan UMKM siswa?',
                'answer' =>
                    'Siswa atau alumni dapat mendaftarkan usahanya melalui formulir yang tersedia di website atau datang langsung ke kantor HUBIN.',
            ],
        ];
    @endphp

    <section id="kontak" class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 fade-in">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Hubungi Kami</h2>
                <div class="w-20 h-1 bg-blue-400 mx-auto"></div>
                <p class="text-gray-600 mt-4 max-w-2xl mx-auto">
                    Kami siap membantu Anda dalam berbagai kebutuhan terkait hubungan industri, program magang,
                    kerjasama, dan pengembangan UMKM.
                </p>
            </div>

            {{-- =================================================================== --}}
            {{-- AWAL DARI BAGIAN KARTU INFORMASI KONTAK YANG DIPINDAHKAN DAN DIPERBAIKI --}}
            {{-- =================================================================== --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-16">
                @foreach ($contactInfo as $info)
                    {{-- Pastikan variabel ini adalah $contactInfo --}}
                    <x-card class="hover:shadow-lg transition-all duration-300 bg-white"> {{-- Tambahkan bg-white jika diinginkan --}}
                        <x-card-content-desc class="p-6 text-center">
                            <div
                                class="w-16 h-16 {{ $info['color'] }} rounded-full flex items-center justify-center mx-auto mb-4">
                                {!! $info['icon'] !!}
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $info['title'] }}</h3>
                            <p class="text-gray-600 text-sm whitespace-pre-line">{{ $info['content'] }}</p>
                        </x-card-content-desc>
                    </x-card>
                @endforeach
            </div>
            {{-- =================================================================== --}}
            {{-- AKHIR DARI BAGIAN KARTU INFORMASI KONTAK --}}
            {{-- =================================================================== --}}

            {{-- Grid untuk Form Kontak dan Info Tambahan (Media Sosial, FAQ, Aksi Cepat) --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                {{-- Kolom Kiri: Form Kontak --}}
                <x-card class="shadow-lg">
                    <x-card-header>
                        <x-card-title class="flex items-center text-2xl">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 mr-3 text-blue-400">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            </svg>
                            Kirim Pesan
                        </x-card-title>
                    </x-card-header>
                    <x-card-content class="pt-6">
                        <form method="POST" action="{{ route('contact.store') }}" class="space-y-6">
                            @csrf
                            {{-- ... (Input Nama Lengkap) ... --}}
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-label for="name" class="flex items-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="w-4 h-4 mr-2">
                                            <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2" />
                                            <circle cx="12" cy="7" r="4" />
                                        </svg>
                                        Nama Lengkap
                                    </x-label>
                                    <x-input id="name" name="name" placeholder="Masukkan nama Anda"
                                        value="{{ old('name') }}" required />
                                    @error('name')
                                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <x-label for="email" class="flex items-center mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="w-4 h-4 mr-2">
                                            <rect width="20" height="16" x="2" y="4" rx="2" />
                                            <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                                        </svg>
                                        Email
                                    </x-label>
                                    <x-input id="email" name="email" type="email"
                                        placeholder="Masukkan email Anda" value="{{ old('email') }}" required />
                                    @error('email')
                                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- ... (Input Subjek) ... --}}
                            <div>
                                <x-label for="subject" class="flex items-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                        <path d="M15 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V7Z" />
                                        <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                                        <path d="M10 9H8" />
                                        <path d="M16 13H8" />
                                        <path d="M16 17H8" />
                                    </svg>
                                    Subjek
                                </x-label>
                                <select id="subject" name="subject"
                                    class="flex h-10 w-full items-center justify-between rounded-md border border-gray-300 bg-white px-3 py-2 text-sm ring-offset-background placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-400 disabled:cursor-not-allowed disabled:opacity-50"
                                    required>
                                    <option value="">Pilih subjek</option>
                                    <option value="kerjasama" @if (old('subject') == 'kerjasama') selected @endif>
                                        Permohonan Kerjasama</option>
                                    <option value="magang" @if (old('subject') == 'magang') selected @endif>Informasi
                                        Magang</option>
                                    <option value="rekrutmen" @if (old('subject') == 'rekrutmen') selected @endif>
                                        Informasi Rekrutmen</option>
                                    <option value="umkm" @if (old('subject') == 'umkm') selected @endif>
                                        Pendaftaran UMKM</option>
                                    <option value="lainnya" @if (old('subject') == 'lainnya') selected @endif>Lainnya
                                    </option>
                                </select>
                                @error('subject')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- ... (Input Pesan) ... --}}
                            <div>
                                <x-label for="message" class="flex items-center mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                    </svg>
                                    Pesan
                                </x-label>
                                <x-textarea id="message" name="message" rows="5"
                                    placeholder="Tulis pesan Anda di sini" required>{{ old('message') }}</x-textarea>
                                @error('message')
                                    <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- ... (Tombol Kirim) ... --}}
                            <x-button type="submit" class="w-full bg-blue-400 hover:bg-blue-500">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                    <line x1="22" x2="11" y1="2" y2="13" />
                                    <polygon points="22 2 15 22 11 13 2 9 22 2" />
                                </svg>
                                Kirim Pesan
                            </x-button>
                        </form>
                    </x-card-content>
                </x-card>

                {{-- Kolom Kanan: Info Tambahan (Media Sosial, FAQ, Aksi Cepat) --}}
                <div class="space-y-8">
                    {{-- ... (Kartu Media Sosial) ... --}}
                    <x-card class="shadow-lg">
                        <x-card-header><x-card-title>Media Sosial Kami</x-card-title></x-card-header>
                        <x-card-content class="pt-6 grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach ($socialMedia as $social)
                                <div class="flex items-center space-x-3">
                                    <div
                                        class="w-10 h-10 {{ $social['color'] }} text-white rounded-full flex items-center justify-center transition-colors">
                                        {!! $social['icon'] !!}
                                    </div>
                                    <div>
                                        <p class="font-medium text-gray-800">{{ $social['name'] }}</p>
                                        <p class="text-sm text-gray-600">{{ $social['handle'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </x-card-content>
                    </x-card>
                    {{-- ... (Kartu FAQ) ... --}}
                    <x-card class="shadow-lg">
                        <x-card-header><x-card-title>Pertanyaan Umum</x-card-title></x-card-header>
                        <x-card-content class="pt-6 space-y-4">
                            @foreach ($faqItems as $faq)
                                <div class="border-b border-gray-200 pb-4 last:border-b-0 last:pb-0">
                                    <h4 class="font-medium text-gray-800 mb-2">{{ $faq['question'] }}</h4>
                                    <p class="text-sm text-gray-600">{{ $faq['answer'] }}</p>
                                </div>
                            @endforeach
                        </x-card-content>
                    </x-card>
                    {{-- ... (Kartu Aksi Cepat) ... --}}
                    <x-card class="shadow-lg bg-blue-50 border-blue-200">
                        <x-card-header><x-card-title class="text-blue-800">Aksi Cepat</x-card-title></x-card-header>
                        <x-card-content class="pt-6 space-y-3">
                            <x-button variant="outline"
                                class="w-full justify-start border-blue-200 text-blue-700 hover:bg-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                    <path
                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                </svg>
                                Telepon Langsung
                            </x-button>
                            <x-button variant="outline"
                                class="w-full justify-start border-blue-200 text-blue-700 hover:bg-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                    <rect width="20" height="16" x="2" y="4" rx="2" />
                                    <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7" />
                                </svg>
                                Kirim Email
                            </x-button>
                            <x-button variant="outline"
                                class="w-full justify-start border-blue-200 text-blue-700 hover:bg-blue-100">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                    <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                </svg>
                                Chat WhatsApp
                            </x-button>
                        </x-card-content>
                    </x-card>
                </div>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <div class="h-96 bg-gray-200">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7921.809091749626!2d107.540062!3d-6.902018!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e5a529094097%3A0x5d638aee4fd75b1d!2sSMKN%201%20Cimahi!5e0!3m2!1sen!2sus!4v1748231748136!5m2!1sen!2sus" 
            width="100%"
            height="100%"
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade"
            title="Peta Lokasi SMKN 1 Cimahi">
        </iframe>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">HUBIN SMKN 1 Cimahi</h3>
                    <p class="text-gray-400">
                        Menghubungkan dunia pendidikan dengan industri untuk menciptakan lulusan yang kompeten dan siap
                        kerja.
                    </p>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="#home" class="text-gray-400 hover:text-blue-400 transition">Beranda</a></li>
                        <li><a href="#fitur" class="text-gray-400 hover:text-blue-400 transition">Fitur</a></li>
                        <li><a href="#pengumuman" class="text-gray-400 hover:text-blue-400 transition">Pengumuman</a>
                        </li>
                        <li><a href="#kerjasama" class="text-gray-400 hover:text-blue-400 transition">Kerjasama</a>
                        </li>
                        <li><a href="#umkm" class="text-gray-400 hover:text-blue-400 transition">UMKM</a></li>
                    </ul>
                </div>

                @php
                    $jurusanSekolah = [
                        ['nama' => 'Teknik Mekatronika', 'url' => 'https://www.smkn1-cmi.sch.id/teknik-mekatronika/'],
                        [
                            'nama' => 'Teknik Elektronika Industri',
                            'url' => 'https://www.smkn1-cmi.sch.id/teknik-elektronika-industri/',
                        ],
                        [
                            'nama' => 'Teknik Otomasi Industri',
                            'url' => 'https://www.smkn1-cmi.sch.id/teknik-otomasi-industri/',
                        ],
                        [
                            'nama' => 'Teknik Elektronika Daya dan Komunikasi',
                            'url' => 'https://www.smkn1-cmi.sch.id/teknik-elektronika-daya-dan-komunikasi/',
                        ],
                        [
                            'nama' => 'Instrumentasi dan Otomatisasi Proses',
                            'url' => 'https://www.smkn1-cmi.sch.id/instrumentasi-dan-otomatisasi-proses/',
                        ],
                        [
                            'nama' => 'Teknik Pendingin dan Tata Udara',
                            'url' => 'https://www.smkn1-cmi.sch.id/teknik-pendingin-dan-tata-udara/',
                        ],
                        [
                            'nama' => 'Rekayasa Perangkat Lunak',
                            'url' => 'https://www.smkn1-cmi.sch.id/rekayasa-perangkat-lunak/',
                        ],
                        [
                            'nama' => 'Sistem Informasi Jaringan dan Aplikasi',
                            'url' => 'https://www.smkn1-cmi.sch.id/sistem-informasi-jaringan-dan-aplikasi/',
                        ],
                        [
                            'nama' => 'Produksi Film dan Program Televisi',
                            'url' => 'https://www.smkn1-cmi.sch.id/produksi-film-dan-program-televisi/',
                        ],
                    ];
                @endphp

                <div>
                    <h4 class="text-lg font-semibold mb-4">Jurusan</h4>
                    <ul class="space-y-2">
                        @if (!empty($jurusanSekolah))
                            @foreach ($jurusanSekolah as $jurusan)
                                <li><a href="{{ $jurusan['url'] }}" target="_blank"
                                        class="text-gray-400 hover:text-blue-400 transition">{{ $jurusan['nama'] }}</a>
                                </li>
                            @endforeach
                        @else
                            <li>
                                <p class="text-gray-400">Data jurusan tidak tersedia.</p>
                            </li>
                        @endif
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Berlangganan</h4>
                    <p class="text-gray-400 mb-4">
                        Dapatkan informasi terbaru tentang lowongan kerja dan kegiatan HUBIN langsung ke email Anda.
                    </p>
                    <form class="flex">
                        <input type="email" placeholder="Email Anda"
                            class="px-4 py-2 w-full rounded-l-lg focus:outline-none text-gray-800">
                        <button type="submit"
                            class="bg-blue-400 hover:bg-blue-500 px-4 py-2 rounded-r-lg transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-12 pt-8 flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm mb-4 md:mb-0">
                    © <span id="currentYear"></span> HUBIN SMKN 1 Cimahi. All rights reserved.
                </p>
                <div class="flex space-x-6">
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button id="back-to-top"
        class="fixed bottom-8 right-8 bg-blue-400 text-white p-3 rounded-full shadow-lg opacity-0 invisible transition-all duration-300 z-50">
        <i class="fas fa-arrow-up"></i>
    </button>

    @if (session('success'))
        <div id="toast-success" class="toast-notification">
            <i class="fas fa-check-circle mr-3"></i>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    <script>
        // Mobile Menu Toggle
        const menuBtn = document.getElementById('menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');

        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for all navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return; // Ignore empty hashes

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });

                    // Close mobile menu if open and it's a mobile view
                    if (window.innerWidth < 768 && !mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });

        // Scroll to next section function for hero scroll down button
        function scrollToNextSection() {
            const fiturSection = document.querySelector('#fitur');
            if (fiturSection) {
                fiturSection.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }

        // Back to Top Button
        const backToTopBtn = document.getElementById('back-to-top');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopBtn.classList.remove('opacity-0', 'invisible');
                backToTopBtn.classList.add('opacity-100', 'visible');
            } else {
                backToTopBtn.classList.remove('opacity-100', 'visible');
                backToTopBtn.classList.add('opacity-0', 'invisible');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        const animatedElements = document.querySelectorAll('.fade-in, .slide-up');
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    if (entry.target.classList.contains('slide-up')) {
                        entry.target.style.transform = 'translateY(0)';
                    }
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1
        });

        animatedElements.forEach(el => {
            // Set initial styles for JS-driven animation
            el.style.opacity = '0';
            if (el.classList.contains('slide-up')) {
                el.style.transform = 'translateY(30px)';
            }
            observer.observe(el);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const toast = document.getElementById('toast-success');
            if (toast) {
                setTimeout(() => {
                    toast.classList.add('show');
                }, 100);

                setTimeout(() => {
                    toast.classList.remove('show');
                }, 5000);
            }
        });

        // Dynamic Year for Footer
        document.getElementById('currentYear').textContent = new Date().getFullYear();

        // Logo carousel hover effect
        const logoTrack = document.querySelector('.logo-track');
        const logoCarousel = document.querySelector('.logo-carousel');

        if (logoCarousel && logoTrack) {
            logoCarousel.addEventListener('mouseenter', () => {
                logoTrack.style.animationPlayState = 'paused';
            });

            logoCarousel.addEventListener('mouseleave', () => {
                logoTrack.style.animationPlayState = 'running';
            });
        }

        // Create floating dots
        function createFloatingDots() {
            const container = document.getElementById('floating-dots');
            const dotCount = 30;

            for (let i = 0; i < dotCount; i++) {
                const dot = document.createElement('div');
                dot.classList.add('dot');

                // Random position
                const left = Math.random() * 100;
                const top = Math.random() * 100;
                dot.style.left = `${left}%`;
                dot.style.top = `${top}%`;

                // Random animation duration and delay
                const duration = Math.random() * 20 + 10;
                const delay = Math.random() * -20;
                dot.style.animationDuration = `${duration}s`;
                dot.style.animationDelay = `${delay}s`;

                container.appendChild(dot);
            }
        }

        // Initialize particles.js
        function initParticles() {
            particlesJS('particles-js', {
                "particles": {
                    "number": {
                        "value": 80,
                        "density": {
                            "enable": true,
                            "value_area": 800
                        }
                    },
                    "color": {
                        "value": "#000000"
                    },
                    "shape": {
                        "type": "circle",
                        "stroke": {
                            "width": 0,
                            "color": "#000000"
                        },
                        "polygon": {
                            "nb_sides": 5
                        }
                    },
                    "opacity": {
                        "value": 0.5,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": 1,
                            "opacity_min": 0.1,
                            "sync": false
                        }
                    },
                    "size": {
                        "value": 3,
                        "random": true,
                        "anim": {
                            "enable": true,
                            "speed": 2,
                            "size_min": 0.1,
                            "sync": false
                        }
                    },
                    "line_linked": {
                        "enable": true,
                        "distance": 150,
                        "color": "#000000",
                        "opacity": 0.3,
                        "width": 1
                    },
                    "move": {
                        "enable": true,
                        "speed": 1,
                        "direction": "none",
                        "random": true,
                        "straight": false,
                        "out_mode": "out",
                        "bounce": false,
                        "attract": {
                            "enable": true,
                            "rotateX": 600,
                            "rotateY": 1200
                        }
                    }
                },
                "interactivity": {
                    "detect_on": "canvas",
                    "events": {
                        "onhover": {
                            "enable": true,
                            "mode": "grab"
                        },
                        "onclick": {
                            "enable": true,
                            "mode": "push"
                        },
                        "resize": true
                    },
                    "modes": {
                        "grab": {
                            "distance": 140,
                            "line_linked": {
                                "opacity": 0.7
                            }
                        },
                        "bubble": {
                            "distance": 400,
                            "size": 40,
                            "duration": 2,
                            "opacity": 8,
                            "speed": 3
                        },
                        "repulse": {
                            "distance": 200,
                            "duration": 0.4
                        },
                        "push": {
                            "particles_nb": 4
                        },
                        "remove": {
                            "particles_nb": 2
                        }
                    }
                },
                "retina_detect": true
            });
        }

        // Initialize all effects when page loads
        window.addEventListener('load', () => {
            createFloatingDots();
            initParticles();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
</body>

</html>
