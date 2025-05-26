<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'HUBIN SMKN 1 Cimahi')</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Custom CSS untuk animasi -->
    <style>
        .animate-fade-in {
            animation: fadeIn 1s ease-in;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .bg-grid-pattern {
            background-image: radial-gradient(circle, #e5e7eb 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
</head>
<body class="min-h-screen bg-white">
    
    <main>
        @yield('content')
    </main>

    <footer class="bg-white mt-12 py-6">
        <div class="container mx-auto px-6 text-center text-gray-600">
            &copy; {{ date('Y') }} HUBIN SMKN 1 Cimahi. All rights reserved.
        </div>
    </footer>
    
    <!-- JavaScript untuk smooth scrolling -->
    <script>
        function scrollToSection(sectionId) {
            document.querySelector(sectionId).scrollIntoView({ behavior: 'smooth' });
        }
    </script>
</body>
</html>