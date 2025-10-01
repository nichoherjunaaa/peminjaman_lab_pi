@extends('layouts.app')

@section('title', 'Kesalahan Server - Sistem Peminjaman Laboratorium')

@section('content')
    <div class="min-h-screen bg-gray-50 flex flex-col justify-center py-12 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10 text-center">
                <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-red-100 mb-6">
                    <i class="fas fa-server text-red-600 text-3xl"></i>
                </div>

                <h1 class="text-6xl font-bold text-gray-900 mb-4">500</h1>
                <h2 class="text-2xl font-bold text-gray-900 mb-4">Kesalahan Server</h2>
                <p class="text-gray-600 mb-8">
                    Maaf, terjadi kesalahan pada server. Tim kami telah diberitahu dan sedang memperbaikinya.
                </p>

                <div class="space-y-4">
                    <a href="{{ url('/') }}"
                        class="w-full flex justify-center items-center px-4 py-3 border border-transparent text-base font-medium rounded-lg text-white bg-primary hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-200">
                        <i class="fas fa-home mr-2"></i>
                        Kembali ke Beranda
                    </a>

                    <button onclick="window.location.reload()"
                        class="w-full flex justify-center items-center px-4 py-3 border border-gray-300 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-colors duration-200">
                        <i class="fas fa-redo mr-2"></i>
                        Muat Ulang Halaman
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection