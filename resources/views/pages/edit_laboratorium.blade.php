@extends('layouts.app')

@section('title', 'Edit Laboratorium - Sistem Peminjaman Laboratorium')

@section('content')
    <div class="flex flex-col flex-1">
        <!-- Main Content Area -->
        <main class="flex-1">
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    <!-- Header -->
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <a href="laboratorium.html" class="text-primary hover:text-primary-dark mr-3">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <h1 class="text-2xl font-bold text-gray-900">Edit Laboratorium</h1>
                        </div>
                        <p class="text-gray-600">Ubah informasi laboratorium sesuai kebutuhan</p>
                    </div>

                    <!-- Form Edit Laboratorium -->
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Informasi Laboratorium</h3>
                            <p class="mt-1 text-sm text-gray-500">Lengkapi data laboratorium dengan benar</p>
                        </div>

                        <form class="p-6 space-y-6">
                            <!-- Nama Laboratorium -->
                            <div>
                                <label for="lab-name" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                    Laboratorium</label>
                                <input type="text" id="lab-name" name="lab-name"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    value="Lab. Komputer Dasar A" required>
                            </div>

                            <!-- Lokasi -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="building"
                                        class="block text-sm font-medium text-gray-700 mb-1">Gedung</label>
                                    <select id="building" name="building"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                        <option value="gedung-a">Gedung A</option>
                                        <option value="gedung-b" selected>Gedung B</option>
                                        <option value="gedung-c">Gedung C</option>
                                        <option value="gedung-d">Gedung D</option>
                                        <option value="gedung-e">Gedung E</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="floor" class="block text-sm font-medium text-gray-700 mb-1">Lantai</label>
                                    <select id="floor" name="floor"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                        <option value="1" selected>Lantai 1</option>
                                        <option value="2">Lantai 2</option>
                                        <option value="3">Lantai 3</option>
                                        <option value="4">Lantai 4</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Kapasitas -->
                            <div>
                                <label for="capacity" class="block text-sm font-medium text-gray-700 mb-1">Kapasitas
                                    (orang)</label>
                                <input type="number" id="capacity" name="capacity" min="1" max="100"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    value="30" required>
                            </div>

                            <!-- Status -->
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select id="status" name="status"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    <option value="available" selected>Tersedia</option>
                                    <option value="maintenance">Dalam Perawatan</option>
                                    <option value="unavailable">Tidak Tersedia</option>
                                </select>
                            </div>

                            <!-- Fasilitas -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-3">Fasilitas</label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                                    <div class="flex items-center">
                                        <input type="checkbox" id="facility-pc" name="facility-pc"
                                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" checked>
                                        <label for="facility-pc" class="ml-2 text-sm text-gray-700">Komputer PC</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="facility-projector" name="facility-projector"
                                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" checked>
                                        <label for="facility-projector" class="ml-2 text-sm text-gray-700">Proyektor</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="facility-ac" name="facility-ac"
                                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" checked>
                                        <label for="facility-ac" class="ml-2 text-sm text-gray-700">AC</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="facility-internet" name="facility-internet"
                                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" checked>
                                        <label for="facility-internet" class="ml-2 text-sm text-gray-700">Internet</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="facility-printer" name="facility-printer"
                                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded">
                                        <label for="facility-printer" class="ml-2 text-sm text-gray-700">Printer</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="checkbox" id="facility-whiteboard" name="facility-whiteboard"
                                            class="h-4 w-4 text-primary focus:ring-primary border-gray-300 rounded" checked>
                                        <label for="facility-whiteboard" class="ml-2 text-sm text-gray-700">Papan
                                            Tulis</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Jumlah PC -->
                            <div>
                                <label for="pc-count" class="block text-sm font-medium text-gray-700 mb-1">Jumlah PC</label>
                                <input type="number" id="pc-count" name="pc-count" min="0" max="50"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    value="30">
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                                <textarea id="description" name="description" rows="4"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">Laboratorium komputer dengan spesifikasi tinggi untuk praktikum pemrograman dan desain grafis. Dilengkapi dengan software development tools terbaru dan koneksi internet berkecepatan tinggi.</textarea>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="flex justify-end space-x-3 pt-6">
                                <a href="laboratorium.html"
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                    Batal
                                </a>
                                <button type="submit"
                                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors duration-200">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection