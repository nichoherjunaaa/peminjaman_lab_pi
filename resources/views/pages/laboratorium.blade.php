@extends('layouts.app')

@section('title', 'Peminjaman - Sistem Peminjaman Laboratorium')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <!-- Header -->
        <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Laboratorium</h1>
                <p class="mt-2 text-gray-600">Daftar laboratorium yang tersedia</p>
            </div>
            <div class="mt-4 sm:mt-0 flex space-x-3">
                <button
                    class="bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg flex items-center hover:bg-gray-50">
                    <i class="fas fa-filter mr-2"></i>
                    Filter
                </button>
                <button class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Tambah Lab
                </button>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
            <!-- Total Laboratorium -->
            <div class="bg-white overflow-hidden shadow rounded-lg card-hover">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-building text-primary text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total Laboratorium</dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">12</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tersedia -->
            <div class="bg-white overflow-hidden shadow rounded-lg card-hover">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-green-500 text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Tersedia</dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">8</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Dalam Perawatan -->
            <div class="bg-white overflow-hidden shadow rounded-lg card-hover">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-tools text-yellow-500 text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Dalam Perawatan</dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">2</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tidak Tersedia -->
            <div class="bg-white overflow-hidden shadow rounded-lg card-hover">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <i class="fas fa-times-circle text-red-500 text-2xl"></i>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Tidak Tersedia</dt>
                                <dd>
                                    <div class="text-lg font-medium text-gray-900">2</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search and Filter -->
        <div class="bg-white p-4 rounded-lg shadow mb-6">
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Cari Laboratorium</label>
                    <div class="relative">
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-3 py-2 pl-10"
                            placeholder="Cari laboratorium...">
                        <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                    </div>
                </div>
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option value="">Semua Status</option>
                        <option value="available">Tersedia</option>
                        <option value="maintenance">Dalam Perawatan</option>
                        <option value="unavailable">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="flex-1">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                    <select class="w-full border border-gray-300 rounded-lg px-3 py-2">
                        <option value="">Semua Lokasi</option>
                        <option value="gedung-a">Gedung A</option>
                        <option value="gedung-b">Gedung B</option>
                        <option value="gedung-c">Gedung C</option>
                        <option value="gedung-d">Gedung D</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Laboratorium Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <!-- Lab 1 -->
            <div class="bg-white rounded-lg shadow card-hover">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Lab. Komputer Dasar A</h3>
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full status-available mt-1">
                                Tersedia
                            </span>
                        </div>
                        <div class="h-12 w-12 rounded-lg bg-primary flex items-center justify-center">
                            <i class="fas fa-desktop text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                            <span>Gedung B, Lantai 1</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-users mr-2 text-primary"></i>
                            <span>Kapasitas: 30 orang</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-microchip mr-2 text-primary"></i>
                            <span>30 PC, Proyektor, AC</span>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-gray-500 line-clamp-2">
                        Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis.
                    </p>
                    <div class="mt-6 flex space-x-3">
                        <button
                            class="flex-1 bg-primary text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary-dark">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </button>
                        <button
                            class="flex-1 border border-primary text-primary py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary hover:text-white">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </button>
                    </div>
                </div>
            </div>
            <!-- Lab 2 -->
            <div class="bg-white rounded-lg shadow card-hover">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Lab. Komputer Dasar B</h3>
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full status-available mt-1">
                                Tersedia
                            </span>
                        </div>
                        <div class="h-12 w-12 rounded-lg bg-primary flex items-center justify-center">
                            <i class="fas fa-desktop text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                            <span>Gedung B, Lantai 1</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-users mr-2 text-primary"></i>
                            <span>Kapasitas: 30 orang</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-microchip mr-2 text-primary"></i>
                            <span>30 PC, Proyektor, AC</span>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-gray-500 line-clamp-2">
                        Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis.
                    </p>
                    <div class="mt-6 flex space-x-3">
                        <button
                            class="flex-1 bg-primary text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary-dark">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </button>
                        <button
                            class="flex-1 border border-primary text-primary py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary hover:text-white">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </button>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow card-hover">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Lab. Komputer Dasar C</h3>
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full status-maintenance mt-1">
                                Dalam Perawatan
                            </span>
                        </div>
                        <div class="h-12 w-12 rounded-lg bg-primary flex items-center justify-center">
                            <i class="fas fa-desktop text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                            <span>Gedung B, Lantai 1</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-users mr-2 text-primary"></i>
                            <span>Kapasitas: 30 orang</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-microchip mr-2 text-primary"></i>
                            <span>30 PC, Proyektor, AC</span>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-gray-500 line-clamp-2">
                        Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis.
                    </p>
                    <div class="mt-6 flex space-x-3">
                        <button
                            class="flex-1 bg-primary text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary-dark">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </button>
                        <button
                            class="flex-1 border border-primary text-primary py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary hover:text-white">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </button>
                    </div>
                </div>
            </div>



            <!-- Lab 3 -->
            <div class="bg-white rounded-lg shadow card-hover">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Lab. Komputer Jaringan A</h3>
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full status-maintenance mt-1">
                                Dalam Perawatan
                            </span>
                        </div>
                        <div class="h-12 w-12 rounded-lg bg-primary flex items-center justify-center">
                            <i class="fas fa-microscope text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                            <span>Gedung C, Lantai 3</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-users mr-2 text-primary"></i>
                            <span>Kapasitas: 20 orang</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-seedling mr-2 text-primary"></i>
                            <span>Mikroskop, Specimen, Alat bedah</span>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-gray-500 line-clamp-2">
                        Laboratorium biologi untuk penelitian mikrobiologi, genetika, dan biologi molekuler.
                    </p>
                    <div class="mt-6 flex space-x-3">
                        <button
                            class="flex-1 bg-primary text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary-dark">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </button>
                        <button
                            class="flex-1 border border-primary text-primary py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary hover:text-white">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </button>
                    </div>
                </div>
            </div>

            <!-- Lab 4 -->
            <div class="bg-white rounded-lg shadow card-hover">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Lab. Komputer Jaringan E</h3>
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full status-available mt-1">
                                Tersedia
                            </span>
                        </div>
                        <div class="h-12 w-12 rounded-lg bg-primary flex items-center justify-center">
                            <i class="fas fa-atom text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                            <span>Gedung D, Lantai 2</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-users mr-2 text-primary"></i>
                            <span>Kapasitas: 28 orang</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-balance-scale mr-2 text-primary"></i>
                            <span>Alat ukur, Osiloskop, Generator</span>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-gray-500 line-clamp-2">
                        Laboratorium fisika dengan peralatan eksperimen mekanika, listrik, dan optik.
                    </p>
                    <div class="mt-6 flex space-x-3">
                        <button
                            class="flex-1 bg-primary text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary-dark">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </button>
                        <button
                            class="flex-1 border border-primary text-primary py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary hover:text-white">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </button>
                    </div>
                </div>
            </div>

            <!-- Lab 5 -->
            <div class="bg-white rounded-lg shadow card-hover">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Lab. Basis Data A</h3>
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full status-unavailable mt-1">
                                Tidak Tersedia
                            </span>
                        </div>
                        <div class="h-12 w-12 rounded-lg bg-primary flex items-center justify-center">
                            <i class="fas fa-language text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                            <span>Gedung B, Lantai 3</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-users mr-2 text-primary"></i>
                            <span>Kapasitas: 24 orang</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-headphones mr-2 text-primary"></i>
                            <span>Audio system, Computer, Software</span>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-gray-500 line-clamp-2">
                        Laboratorium bahasa modern untuk pembelajaran listening dan speaking berbagai bahasa asing.
                    </p>
                    <div class="mt-6 flex space-x-3">
                        <button
                            class="flex-1 bg-primary text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary-dark">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </button>
                        <button
                            class="flex-1 border border-primary text-primary py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary hover:text-white">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </button>
                    </div>
                </div>
            </div>

            <!-- Lab 6 -->
            <div class="bg-white rounded-lg shadow card-hover">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">Lab. Jaringan</h3>
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full status-available mt-1">
                                Tersedia
                            </span>
                        </div>
                        <div class="h-12 w-12 rounded-lg bg-primary flex items-center justify-center">
                            <i class="fas fa-network-wired text-white text-xl"></i>
                        </div>
                    </div>
                    <div class="space-y-2 text-sm text-gray-600">
                        <div class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                            <span>Gedung E, Lantai 1</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-users mr-2 text-primary"></i>
                            <span>Kapasitas: 15 orang</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-server mr-2 text-primary"></i>
                            <span>Router, Switch, Server, Tools</span>
                        </div>
                    </div>
                    <p class="mt-4 text-sm text-gray-500 line-clamp-2">
                        Laboratorium khusus untuk praktikum jaringan komputer dan administrasi server.
                    </p>
                    <div class="mt-6 flex space-x-3">
                        <button
                            class="flex-1 bg-primary text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary-dark">
                            <i class="fas fa-eye mr-1"></i> Detail
                        </button>
                        <button
                            class="flex-1 border border-primary text-primary py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary hover:text-white">
                            <i class="fas fa-edit mr-1"></i> Edit
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div
            class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 rounded-lg shadow">
            <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                <div>
                    <p class="text-sm text-gray-700">
                        Menampilkan
                        <span class="font-medium">1</span>
                        sampai
                        <span class="font-medium">6</span>
                        dari
                        <span class="font-medium">12</span>
                        laboratorium
                    </p>
                </div>
                <div>
                    <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Previous</span>
                            <i class="fas fa-chevron-left"></i>
                        </a>
                        <a href="#" aria-current="page"
                            class="z-10 bg-primary border-primary text-white relative inline-flex items-center px-4 py-2 border text-sm font-medium">1</a>
                        <a href="#"
                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">2</a>
                        <a href="#"
                            class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">3</a>
                        <a href="#"
                            class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                            <span class="sr-only">Next</span>
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
    {{-- @include('partials.script-peminjaman') --}}
@endsection