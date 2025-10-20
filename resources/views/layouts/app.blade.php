<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Peminjaman Laboratorium')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="/images/USD500.png">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#800000',
                        secondary: '#E0862F',
                        white: '#FFFFFF'
                    },
                    fontFamily: {
                        segoe: ['"Segoe UI"', 'Roboto', 'Arial', 'sans-serif'],
                    },
                }
            }
        }
    </script>

</head>

<body class="bg-gray-50 flex flex-col min-h-screen">
    @include('layouts.nav')

    <div class="flex flex-col flex-1">
        <main class="flex-1">
            @yield('content')
        </main>
    </div>
    
    @include("layouts.footer")

    <!-- Mobile Bottom Navigation -->
    <div class="md:hidden fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200">
        <div class="flex justify-around">
            <a href="{{ url('/') }}"
                class="flex flex-col items-center py-2 px-3 {{ request()->is('/') ? 'text-primary' : 'text-gray-500' }}">
                <i class="fas fa-home text-lg"></i>
                <span class="text-xs mt-1">Beranda</span>
            </a>
            <a href="{{ url('/peminjaman') }}"
                class="flex flex-col items-center py-2 px-3 {{ request()->is('peminjaman') ? 'text-primary' : 'text-gray-500' }}">
                <i class="fas fa-calendar-alt text-lg"></i>
                <span class="text-xs mt-1">Peminjaman</span>
            </a>
            <a href="{{ url('/laboratorium') }}"
                class="flex flex-col items-center py-2 px-3 {{ request()->is('laboratorium') ? 'text-primary' : 'text-gray-500' }}">
                <i class="fas fa-building text-lg"></i>
                <span class="text-xs mt-1">Laboratorium</span>
            </a>
            <a href="{{ url('/riwayat') }}"
                class="flex flex-col items-center py-2 px-3 {{ request()->is('riwayat') ? 'text-primary' : 'text-gray-500' }}">
                <i class="fas fa-history text-lg"></i>
                <span class="text-xs mt-1">Riwayat</span>
            </a>
        </div>
    </div>

    @include('partials.scripts')
    @stack('scripts')
</body>

</html>