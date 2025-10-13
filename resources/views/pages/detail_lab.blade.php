@extends('layouts.app')

@section('title', 'Detail Laboratorium - Sistem Peminjaman Laboratorium')

@section("content")

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
                                <a href="laboratorium.html" class="text-gray-400 hover:text-gray-600">Laboratorium</a>
                            </li>
                            <li>
                                <i class="fas fa-chevron-right text-gray-400 text-xs"></i>
                            </li>
                            <li>
                                <span class="text-gray-700 font-medium">Detail Laboratorium</span>
                            </li>
                        </ol>
                    </nav>

                    <!-- Header Section -->
                    <div class="bg-white rounded-lg shadow-md p-6 mb-6">
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
                                    Pinjam Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6">
                        <div class="bg-white rounded-lg shadow p-4 text-center">
                            <div class="text-3xl font-bold text-primary">30</div>
                            <div class="text-sm text-gray-600 mt-1">Kapasitas</div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-4 text-center">
                            <div class="text-3xl font-bold text-primary">15</div>
                            <div class="text-sm text-gray-600 mt-1">Peminjaman Bulan Ini</div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-4 text-center">
                            <div class="text-3xl font-bold text-primary">98%</div>
                            <div class="text-sm text-gray-600 mt-1">Tingkat Ketersediaan</div>
                        </div>
                    </div>

                    <!-- Tabs Section -->
                    <div class="bg-white rounded-lg shadow-md">
                        <div class="border-b border-gray-200">
                            <nav class="flex space-x-8 px-6" aria-label="Tabs">
                                <button
                                    class="tab-button active py-4 px-1 text-sm font-medium text-gray-500 whitespace-nowrap"
                                    data-tab="overview">
                                    <i class="fas fa-info-circle mr-2"></i>
                                    Gambaran Umum
                                </button>
                                <button class="tab-button py-4 px-1 text-sm font-medium text-gray-500 whitespace-nowrap"
                                    data-tab="facilities">
                                    <i class="fas fa-list mr-2"></i>
                                    Fasilitas
                                </button>
                                <button class="tab-button py-4 px-1 text-sm font-medium text-gray-500 whitespace-nowrap"
                                    data-tab="schedule">
                                    <i class="fas fa-calendar mr-2"></i>
                                    Jadwal
                                </button>
                                <button class="tab-button py-4 px-1 text-sm font-medium text-gray-500 whitespace-nowrap"
                                    data-tab="rules">
                                    <i class="fas fa-gavel mr-2"></i>
                                    Peraturan
                                </button>
                            </nav>
                        </div>

                        <!-- Tab Content: Overview -->
                        <div id="overview" class="tab-content active p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-4">Tentang Laboratorium</h2>
                            <p class="text-gray-700 leading-relaxed mb-6">
                                Laboratorium Komputer Dasar A adalah fasilitas modern yang dirancang khusus untuk mendukung
                                kegiatan pembelajaran pemrograman, desain grafis, dan multimedia. Dilengkapi dengan 30 unit
                                komputer dengan spesifikasi tinggi dan berbagai software development tools terkini,
                                laboratorium ini menyediakan lingkungan yang ideal untuk praktikum mahasiswa.
                            </p>
                            <p class="text-gray-700 leading-relaxed mb-6">
                                Setiap workstation dilengkapi dengan monitor layar lebar, keyboard ergonomis, dan mouse
                                gaming untuk kenyamanan maksimal. Ruangan ber-AC dengan pencahayaan yang optimal membuat
                                suasana belajar menjadi lebih kondusif. Koneksi internet berkecepatan tinggi tersedia di
                                seluruh area laboratorium.
                            </p>

                            <div class="grid md:grid-cols-2 gap-6 mt-8">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Informasi Umum</h3>
                                    <div class="space-y-3">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center mr-3">
                                                <i class="fas fa-map-marker-alt text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm text-gray-500">Lokasi</div>
                                                <div class="font-medium text-gray-900">Gedung B, Lantai 1, Ruang 101</div>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center mr-3">
                                                <i class="fas fa-users text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm text-gray-500">Kapasitas Maksimal</div>
                                                <div class="font-medium text-gray-900">30 Orang</div>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center mr-3">
                                                <i class="fas fa-ruler-combined text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm text-gray-500">Luas Ruangan</div>
                                                <div class="font-medium text-gray-900">72 m²</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Kontak & Pengelola</h3>
                                    <div class="space-y-3">
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center mr-3">
                                                <i class="fas fa-user-tie text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm text-gray-500">Pengelola</div>
                                                <div class="font-medium text-gray-900">Budi Santoso, S.Kom.</div>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center mr-3">
                                                <i class="fas fa-phone text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm text-gray-500">Telepon</div>
                                                <div class="font-medium text-gray-900">0274-123456 ext. 101</div>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center mr-3">
                                                <i class="fas fa-envelope text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm text-gray-500">Email</div>
                                                <div class="font-medium text-gray-900">labkomp.a@usd.ac.id</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Content: Facilities -->
                        <div id="facilities" class="tab-content p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-4">Fasilitas Lengkap</h2>

                            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                                <div class="border border-gray-200 rounded-lg p-4">
                                    <div class="flex items-center mb-2">
                                        <div class="w-10 h-10 rounded-lg bg-blue-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-desktop text-blue-600"></i>
                                        </div>
                                        <h3 class="font-semibold text-gray-900">Komputer</h3>
                                    </div>
                                    <p class="text-sm text-gray-600">30 unit PC dengan spesifikasi Intel Core i7, RAM 16GB,
                                        SSD 512GB</p>
                                </div>

                                <div class="border border-gray-200 rounded-lg p-4">
                                    <div class="flex items-center mb-2">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-green-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-chalkboard text-green-600"></i>
                                        </div>
                                        <h3 class="font-semibold text-gray-900">Proyektor</h3>
                                    </div>
                                    <p class="text-sm text-gray-600">Proyektor HD 1080p dengan layar tarik otomatis</p>
                                </div>

                                <div class="border border-gray-200 rounded-lg p-4">
                                    <div class="flex items-center mb-2">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-wind text-purple-600"></i>
                                        </div>
                                        <h3 class="font-semibold text-gray-900">AC</h3>
                                    </div>
                                    <p class="text-sm text-gray-600">4 unit AC inverter untuk kenyamanan optimal</p>
                                </div>

                                <div class="border border-gray-200 rounded-lg p-4">
                                    <div class="flex items-center mb-2">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-yellow-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-wifi text-yellow-600"></i>
                                        </div>
                                        <h3 class="font-semibold text-gray-900">Internet</h3>
                                    </div>
                                    <p class="text-sm text-gray-600">Koneksi internet fiber 100 Mbps dedicated</p>
                                </div>

                                <div class="border border-gray-200 rounded-lg p-4">
                                    <div class="flex items-center mb-2">
                                        <div class="w-10 h-10 rounded-lg bg-red-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-print text-red-600"></i>
                                        </div>
                                        <h3 class="font-semibold text-gray-900">Printer</h3>
                                    </div>
                                    <p class="text-sm text-gray-600">2 unit printer laser untuk keperluan praktikum</p>
                                </div>

                                <div class="border border-gray-200 rounded-lg p-4">
                                    <div class="flex items-center mb-2">
                                        <div
                                            class="w-10 h-10 rounded-lg bg-indigo-100 flex items-center justify-center mr-3">
                                            <i class="fas fa-volume-up text-indigo-600"></i>
                                        </div>
                                        <h3 class="font-semibold text-gray-900">Audio System</h3>
                                    </div>
                                    <p class="text-sm text-gray-600">Speaker aktif dan microphone wireless</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Content: Schedule -->
                        <div id="schedule" class="tab-content p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-4">Jadwal Ketersediaan</h2>

                            <div class="bg-blue-50 border-l-4 border-blue-500 p-4 mb-6">
                                <div class="flex">
                                    <i class="fas fa-info-circle text-blue-500 mt-1 mr-3"></i>
                                    <div>
                                        <p class="text-sm text-blue-700">
                                            Untuk peminjaman di luar jam operasional, silakan hubungi pengelola laboratorium
                                            minimal 3 hari sebelumnya.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <div class="border border-gray-200 rounded-lg p-4">
                                    <h3 class="font-semibold text-gray-900 mb-4 flex items-center">
                                        <i class="fas fa-clock text-primary mr-2"></i>
                                        Jam Operasional
                                    </h3>
                                    <div class="space-y-3">
                                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                            <span class="text-gray-600">Senin - Jumat</span>
                                            <span class="font-medium text-gray-900">08:00 - 17:00</span>
                                        </div>
                                        <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                            <span class="text-gray-600">Sabtu</span>
                                            <span class="font-medium text-gray-900">08:00 - 12:00</span>
                                        </div>
                                        <div class="flex justify-between items-center py-2">
                                            <span class="text-gray-600">Minggu</span>
                                            <span class="font-medium text-red-600">Tutup</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="border border-gray-200 rounded-lg p-4">
                                    <h3 class="font-semibold text-gray-900 mb-4 flex items-center">
                                        <i class="fas fa-calendar-check text-primary mr-2"></i>
                                        Jadwal Minggu Ini
                                    </h3>
                                    <div class="space-y-2">
                                        <div class="bg-green-50 rounded p-2 text-sm">
                                            <div class="flex justify-between">
                                                <span class="font-medium text-green-800">Senin, 30 Sep</span>
                                                <span class="text-green-600">Tersedia</span>
                                            </div>
                                        </div>
                                        <div class="bg-red-50 rounded p-2 text-sm">
                                            <div class="flex justify-between">
                                                <span class="font-medium text-red-800">Selasa, 1 Okt</span>
                                                <span class="text-red-600">Terpakai</span>
                                            </div>
                                            <div class="text-xs text-red-600 mt-1">09:00 - 12:00: Praktikum Algoritma</div>
                                        </div>
                                        <div class="bg-yellow-50 rounded p-2 text-sm">
                                            <div class="flex justify-between">
                                                <span class="font-medium text-yellow-800">Rabu, 2 Okt</span>
                                                <span class="text-yellow-600">Sebagian Tersedia</span>
                                            </div>
                                            <div class="text-xs text-yellow-600 mt-1">13:00 - 15:00: Terpakai</div>
                                        </div>
                                        <div class="bg-green-50 rounded p-2 text-sm">
                                            <div class="flex justify-between">
                                                <span class="font-medium text-green-800">Kamis, 3 Okt</span>
                                                <span class="text-green-600">Tersedia</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6">
                                <h3 class="font-semibold text-gray-900 mb-3">Kalender Peminjaman</h3>
                                <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                                    <div class="text-center text-gray-500">
                                        <i class="fas fa-calendar-alt text-4xl mb-2"></i>
                                        <p>Kalender peminjaman interaktif akan ditampilkan di sini</p>
                                        <button class="mt-3 text-primary hover:text-primary/80 font-medium">
                                            Lihat Kalender Lengkap <i class="fas fa-arrow-right ml-1"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tab Content: Rules -->
                        <div id="rules" class="tab-content p-6">
                            <h2 class="text-xl font-bold text-gray-900 mb-4">Peraturan Penggunaan</h2>

                            <div class="space-y-6">
                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-3 flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center mr-2">
                                            <span class="text-primary font-bold">1</span>
                                        </div>
                                        Tata Tertib Umum
                                    </h3>
                                    <ul class="space-y-2 ml-10">
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                            <span class="text-gray-700">Pengunjung wajib mengisi buku tamu atau sistem
                                                check-in digital</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                            <span class="text-gray-700">Menjaga kebersihan dan kerapian laboratorium</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                            <span class="text-gray-700">Dilarang membawa makanan dan minuman ke dalam
                                                laboratorium</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                            <span class="text-gray-700">Menjaga ketenangan selama praktikum
                                                berlangsung</span>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-3 flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center mr-2">
                                            <span class="text-primary font-bold">2</span>
                                        </div>
                                        Penggunaan Peralatan
                                    </h3>
                                    <ul class="space-y-2 ml-10">
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                            <span class="text-gray-700">Gunakan peralatan sesuai dengan fungsi dan petunjuk
                                                yang diberikan</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                            <span class="text-gray-700">Laporkan segera jika terjadi kerusakan atau masalah
                                                pada peralatan</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                            <span class="text-gray-700">Dilarang mengubah konfigurasi sistem tanpa
                                                izin</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                            <span class="text-gray-700">Matikan komputer dengan prosedur yang benar setelah
                                                selesai</span>
                                        </li>
                                    </ul>
                                </div>

                                <div>
                                    <h3 class="font-semibold text-gray-900 mb-3 flex items-center">
                                        <div
                                            class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center mr-2">
                                            <span class="text-primary font-bold">3</span>
                                        </div>
                                        Keamanan dan Privasi
                                    </h3>
                                    <ul class="space-y-2 ml-10">
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                            <span class="text-gray-700">Tidak diperkenankan mengakses situs yang tidak
                                                berkaitan dengan pembelajaran</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                            <span class="text-gray-700">Dilarang mengunduh atau menginstall software tanpa
                                                izin</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                            <span class="text-gray-700">Simpan data pribadi di media penyimpanan sendiri,
                                                bukan di komputer lab</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check text-green-600 mr-2 mt-1"></i>
                                            <span class="text-gray-700">Jaga kerahasiaan password dan data pribadi</span>
                                        </li>
                                    </ul>
                                </div>

                                <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4">
                                    <div class="flex">
                                        <i class="fas fa-exclamation-triangle text-yellow-500 mt-1 mr-3"></i>
                                        <div>
                                            <h4 class="font-semibold text-yellow-800 mb-1">Sanksi Pelanggaran</h4>
                                            <p class="text-sm text-yellow-700">
                                                Pelanggaran terhadap peraturan akan dikenakan sanksi berupa teguran,
                                                penangguhan hak akses, atau sanksi administratif sesuai tingkat pelanggaran.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                </div>
            </div>
        </main>
    </div>
    @include('partials.script-detail')
@endsection