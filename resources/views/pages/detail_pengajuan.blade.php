@extends('layouts.app')

@section('title', 'Peminjaman - Sistem Peminjaman Laboratorium')

@section('content')
<div class="flex flex-col flex-1">
    <main class="flex-1">
        <div class="py-6">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                <!-- Breadcrumb -->
                <nav class="flex mb-6" aria-label="Breadcrumb">
                    <ol class="flex items-center space-x-2">
                        <li>
                            <a href="beranda.html" class="text-gray-400 hover:text-gray-600">
                                <i class="fas fa-home"></i>
                            </a>
                        </li>
                        <li>
                            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                        </li>
                        <li>
                            <a href="laboratorium.html" class="text-gray-400 hover:text-gray-600">Pengajuan</a>
                        </li>
                        <li>
                            <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                        </li>
                        <li>
                            <span class="text-gray-700 font-medium">Detail Pengajuan</span>
                        </li>
                    </ol>
                </nav>

                <div class="bg-white rounded-lg shadow-md p-6 mt-4 mb-6">
                    <div class="flex flex-col md:flex-row md:items-start md:justify-between">
                        <div class="flex items-start space-x-4">
                            <div class="h-16 w-16 rounded-lg bg-primary flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-desktop text-white text-3xl"></i>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900">Lab. Komputer Dasar A</h1>
                                <p class="mt-2 text-gray-600">Gedung B, Lantai 1, Ruang 101</p>
                                <div class="mt-3 flex items-center space-x-3">
                                    <span class="px-3 py-1 text-sm font-semibold rounded-full status-available">
                                        <i class="fas fa-check-circle mr-1"></i>
                                        Tersedia
                                    </span>
                                    <span class="text-sm text-gray-500">
                                        <i class="fas fa-clock mr-1"></i>
                                        Terakhir diperbarui: 30 Sep 2025
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 md:mt-0 flex space-x-3">
                            <button
                                class="px-6 py-3 bg-primary text-white rounded-lg font-medium hover:bg-opacity-90 transition-colors">
                                <i class="fas fa-calendar-plus mr-2"></i>
                                Edit
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Tabs Section -->
                <div class="bg-white rounded-lg shadow-md">
                    <div class="border-b border-gray-200">
                        <nav class="flex space-x-8 px-6 justify-center" aria-label="Tabs">
                            <button
                                class="tab-button active py-4 px-1 text-sm font-medium text-gray-500 whitespace-nowrap"
                                data-tab="overview">
                                <i class="fas fa-info-circle mr-2"></i>
                                Detail Peminjam
                            </button>
                    </div>
                </div>

                <!-- form pengajuan -->

                <!-- row 1 -->
                 
    </main>
</div>

@endsection