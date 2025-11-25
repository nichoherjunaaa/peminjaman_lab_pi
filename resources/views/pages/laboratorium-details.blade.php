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
                                    <h1 class="text-3xl font-bold text-gray-900">{{ $lab->nama_laboratorium }}</h1>
                                    <p class="mt-2 text-gray-600">{{ $lab->lokasi }}</p>
                                    <div class="mt-3 flex items-center space-x-3">
                                        <span
                                            class="capitalize px-3 py-1 text-sm font-semibold rounded-full status-{{ $lab->status === "tersedia" ? "available" : "rejected" }}">
                                            <i class="fas fa-check-circle mr-1"></i>
                                            {{ $lab->status }}
                                        </span>
                                        <span class="text-sm text-gray-500">
                                            <i class="fas fa-clock mr-1"></i>
                                            Terakhir diperbarui: 30 Sep 2025
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-2 gap-4 mb-6">
                        <div class="bg-white rounded-lg shadow p-4 text-center">
                            <div class="text-3xl font-bold text-primary">{{ $lab->kapasitas }}</div>
                            <div class="text-sm text-gray-600 mt-1">Kapasitas</div>
                        </div>
                        <div class="bg-white rounded-lg shadow p-4 text-center">
                            <div class="text-3xl font-bold text-primary">{{ $peminjaman_bulan}}</div>
                            <div class="text-sm text-gray-600 mt-1">Peminjaman Bulan Ini</div>
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
                                {{ $lab->deskripsi }}
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
                                                <div class="font-medium text-gray-900">{{ $lab->lokasi }}</div>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center mr-3">
                                                <i class="fas fa-users text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm text-gray-500">Kapasitas Maksimal</div>
                                                <div class="font-medium text-gray-900">{{ $lab->kapasitas }} Orang</div>
                                            </div>
                                        </div>
                                        <div class="flex items-center">
                                            <div
                                                class="w-10 h-10 rounded-lg bg-primary/10 flex items-center justify-center mr-3">
                                                <i class="fas fa-ruler-combined text-primary"></i>
                                            </div>
                                            <div>
                                                <div class="text-sm text-gray-500">Luas Ruangan</div>
                                                <div class="font-medium text-gray-900">{{ $lab->luas }} m²</div>
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
                                                <div class="font-medium text-gray-900">lab.komp@usd.ac.id</div>
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
                                                <div class="font-medium text-gray-900">labkomp@usd.ac.id</div>
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

                                @foreach($fasilitas as $fas)
                                    @php
                                        $name = $fas->barang->nama_barang;

                                        $icons = [
                                            'pc' => ['icon' => 'fa-desktop', 'bg' => 'bg-blue-100', 'txt' => 'text-blue-600'],
                                            'proyektor' => ['icon' => 'fa-chalkboard', 'bg' => 'bg-green-100', 'txt' => 'text-green-600'],
                                            'ac' => ['icon' => 'fa-wind', 'bg' => 'bg-purple-100', 'txt' => 'text-purple-600'],
                                            'internet' => ['icon' => 'fa-wifi', 'bg' => 'bg-yellow-100', 'txt' => 'text-yellow-600'],
                                            'printer' => ['icon' => 'fa-print', 'bg' => 'bg-red-100', 'txt' => 'text-red-600'],
                                            'audio system' => ['icon' => 'fa-volume-up', 'bg' => 'bg-indigo-100', 'txt' => 'text-indigo-600'],
                                        ];

                                        $key = strtolower($name);

                                        $icon = $icons[$key]['icon'] ?? 'fa-cube';
                                        $bg = $icons[$key]['bg'] ?? 'bg-gray-100';
                                        $txt = $icons[$key]['txt'] ?? 'text-gray-600';
                                    @endphp

                                    <div class="border border-gray-200 rounded-lg p-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 rounded-lg {{ $bg }} flex items-center justify-center mr-3">
                                                <i class="fas {{ $icon }} {{ $txt }}"></i>
                                            </div>

                                            <div>
                                                <h3 class="font-semibold text-gray-900">{{ $name }}</h3>
                                                <p class="text-sm text-gray-600">Jumlah: {{ $fas->jumlah }}</p>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>


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
                            <div class="mt-6">
                                <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
                                    <div class="text-center text-gray-500">
                                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                                            <!-- Calendar Section -->
                                            <div class="lg:col-span-2">
                                                <div class="bg-white rounded-lg shadow">
                                                    <!-- Calendar Header -->
                                                    <div class="px-6 py-4 border-b border-gray-200">
                                                        <div class="flex items-center justify-between">
                                                            <div>
                                                                <h2 class="text-lg font-semibold text-gray-900"
                                                                    id="currentMonth">Oktober 2023</h2>
                                                            </div>
                                                            <div class="flex space-x-2">
                                                                <button id="prevMonth"
                                                                    class="p-2 rounded-lg hover:bg-gray-100">
                                                                    <i class="fas fa-chevron-left text-gray-600"></i>
                                                                </button>
                                                                <button
                                                                    class="p-2 rounded-lg hover:bg-gray-100 text-sm text-gray-600"
                                                                    id="todayButton">
                                                                    Hari Ini
                                                                </button>
                                                                <button id="nextMonth"
                                                                    class="p-2 rounded-lg hover:bg-gray-100">
                                                                    <i class="fas fa-chevron-right text-gray-600"></i>
                                                                </button>
                                                            </div>
                                                        </div>

                                                        <!-- Weekday Headers -->
                                                        <div class="grid grid-cols-7 mt-4">
                                                            <div class="text-center text-sm font-medium text-gray-500 py-2">
                                                                Min</div>
                                                            <div class="text-center text-sm font-medium text-gray-500 py-2">
                                                                Sen</div>
                                                            <div class="text-center text-sm font-medium text-gray-500 py-2">
                                                                Sel</div>
                                                            <div class="text-center text-sm font-medium text-gray-500 py-2">
                                                                Rab</div>
                                                            <div class="text-center text-sm font-medium text-gray-500 py-2">
                                                                Kam</div>
                                                            <div class="text-center text-sm font-medium text-gray-500 py-2">
                                                                Jum</div>
                                                            <div class="text-center text-sm font-medium text-gray-500 py-2">
                                                                Sab</div>
                                                        </div>
                                                    </div>

                                                    <!-- Calendar Grid -->
                                                    <div class="p-4">
                                                        <div class="grid grid-cols-7 gap-1" id="calendarGrid">
                                                            <!-- Calendar days will be populated by JavaScript -->
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Legend -->
                                                <div class="mt-4 bg-white rounded-lg shadow p-4">
                                                    <h3 class="text-sm font-medium text-gray-900 mb-3">Keterangan</h3>
                                                    <div class="flex flex-wrap gap-4">
                                                        <div class="flex items-center">
                                                            <div class="w-3 h-3 bg-primary rounded-full mr-2"></div>
                                                            <span class="text-sm text-gray-600">Tanggal Terpilih</span>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <div class="w-3 h-3 bg-secondary rounded-full mr-2"></div>
                                                            <span class="text-sm text-gray-600">Ada Peminjaman</span>
                                                        </div>
                                                        <div class="flex items-center">
                                                            <div class="w-3 h-3 bg-gray-300 rounded-full mr-2"></div>
                                                            <span class="text-sm text-gray-600">Tanggal Lain</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Booking List Section -->
                                            <div class="lg:col-span-1">
                                                <div class="bg-white rounded-lg shadow sticky top-4">
                                                    <div class="px-6 py-4 border-b border-gray-200">
                                                        <div class="flex items-center justify-between">
                                                            <h2 class="text-lg font-semibold text-gray-900">
                                                                <span id="selectedDateText">Peminjaman Hari Ini</span>
                                                            </h2>
                                                            <span id="bookingCount"
                                                                class="bg-primary text-white text-xs px-2 py-1 rounded-full">0</span>
                                                        </div>
                                                    </div>
                                                    <div class="p-4">
                                                        <div id="bookingList" class="space-y-4 max-h-96 overflow-y-auto">
                                                            <!-- Booking items will be populated by JavaScript -->
                                                            <div class="text-center py-8 text-gray-500">
                                                                <i class="fas fa-calendar-day text-3xl mb-2"></i>
                                                                <p>Pilih tanggal untuk melihat jadwal peminjaman</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Quick Stats -->
                                                <div class="mt-4 bg-white rounded-lg shadow p-4">
                                                    <h3 class="text-sm font-medium text-gray-900 mb-3">Statistik Bulan Ini
                                                    </h3>
                                                    <div class="space-y-3">
                                                        <div class="flex justify-between items-center">
                                                            <span class="text-sm text-gray-600">Total Peminjaman</span>
                                                            <span class="text-sm font-medium text-gray-900"
                                                                id="totalBookings">0</span>
                                                        </div>
                                                        <div class="flex justify-between items-center">
                                                            <span class="text-sm text-gray-600">Disetujui</span>
                                                            <span class="text-sm font-medium text-green-600"
                                                                id="approvedBookings">0</span>
                                                        </div>
                                                        <div class="flex justify-between items-center">
                                                            <span class="text-sm text-gray-600">Menunggu</span>
                                                            <span class="text-sm font-medium text-yellow-600"
                                                                id="pendingBookings">0</span>
                                                        </div>
                                                        <div class="flex justify-between items-center">
                                                            <span class="text-sm text-gray-600">Ditolak</span>
                                                            <span class="text-sm font-medium text-red-600"
                                                                id="rejectedBookings">0</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="grid md:grid-cols-1 gap-6 mt-3">
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
    <script>
        document.addEventListener('DOMContentLoaded', async function () {

            const labId = {{ $lab->id_laboratorium }};

            let bookingData = {};
            try {
                const response = await fetch(`/laboratorium/${labId}/booking`);
                bookingData = await response.json();
                console.log("Data booking berhasil dimuat:", bookingData);
            } catch (error) {
                console.error("Gagal memuat data booking:", error);
            }

            let currentDate = new Date();
            let selectedDate = new Date();

            function formatDate(date) {
                return date.toISOString().split('T')[0];
            }

            function formatDisplayDate(date) {
                const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
                return date.toLocaleDateString('id-ID', options);
            }

            function isSameDay(date1, date2) {
                return formatDate(date1) === formatDate(date2);
            }

            function hasBookings(date) {
                return bookingData[formatDate(date)] !== undefined;
            }

            function getBookingCount(date) {
                const bookings = bookingData[formatDate(date)];
                return bookings ? bookings.length : 0;
            }

            function calculateMonthlyStats() {
                let total = 0;
                let approved = 0;
                let pending = 0;
                let rejected = 0;

                Object.values(bookingData).forEach(bookings => {
                    bookings.forEach(booking => {
                        total++;
                        if (booking.status === 'approved') approved++;
                        if (booking.status === 'pending') pending++;
                        if (booking.status === 'rejected') rejected++;
                    });
                });

                return { total, approved, pending, rejected };
            }

            function renderCalendar() {
                const calendarGrid = document.getElementById('calendarGrid');
                const currentMonthElement = document.getElementById('currentMonth');

                const monthNames = [
                    "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                    "Juli", "Agustus", "September", "Oktober", "November", "Desember"
                ];
                currentMonthElement.textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;
                calendarGrid.innerHTML = '';

                const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
                const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
                const startingDay = firstDay.getDay();

                for (let i = 0; i < startingDay; i++) {
                    const emptyDay = document.createElement('div');
                    emptyDay.className = 'h-12';
                    calendarGrid.appendChild(emptyDay);
                }

                for (let day = 1; day <= lastDay.getDate(); day++) {
                    const dayElement = document.createElement('button');
                    dayElement.className = 'calendar-day h-12 rounded-lg flex items-center justify-center text-sm font-medium';

                    const dayDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
                    const bookingCount = getBookingCount(dayDate);

                    if (bookingCount > 0) {
                        dayElement.classList.add('has-booking');
                        if (bookingCount > 2) {
                            dayElement.classList.add('multiple-bookings');
                        }
                    }

                    if (isSameDay(dayDate, selectedDate)) {
                        dayElement.classList.add('selected');
                    }

                    if (isSameDay(dayDate, new Date())) {
                        dayElement.classList.add('font-bold');
                        if (!isSameDay(dayDate, selectedDate)) {
                            dayElement.classList.add('text-primary');
                        }
                    }

                    dayElement.textContent = day;
                    dayElement.addEventListener('click', () => selectDate(dayDate));
                    calendarGrid.appendChild(dayElement);
                }
            }

            function selectDate(date) {
                selectedDate = date;
                renderCalendar();
                renderBookingList();
            }

            function renderBookingList() {
                const bookingList = document.getElementById('bookingList');
                const selectedDateText = document.getElementById('selectedDateText');
                const bookingCount = document.getElementById('bookingCount');

                selectedDateText.textContent = formatDisplayDate(selectedDate);

                const bookings = bookingData[formatDate(selectedDate)];
                const count = bookings ? bookings.length : 0;
                bookingCount.textContent = count;

                if (bookings && bookings.length > 0) {
                    bookingList.innerHTML = '';
                    bookings.forEach(booking => {
                        const statusColors = {
                            'approved': 'bg-green-100 text-green-800',
                            'pending': 'bg-yellow-100 text-yellow-800',
                            'rejected': 'bg-red-100 text-red-800'
                        };

                        const statusText = {
                            'approved': 'Disetujui',
                            'pending': 'Menunggu',
                            'rejected': 'Ditolak'
                        };

                        const jenisIcon = {
                            'dosen': 'fas fa-user-tie',
                            'mahasiswa': 'fas fa-user-graduate'
                        };

                        const bookingElement = document.createElement('div');
                        bookingElement.className = 'booking-card bg-gray-50 p-4 rounded-lg border-l-4 border-secondary';

                        bookingElement.innerHTML = `
                                <div class="flex justify-between items-start mb-2">
                                    <div class="flex items-center">
                                        <i class="${jenisIcon[booking.jenis]} text-gray-500 mr-2"></i>
                                        <h3 class="font-medium text-sm text-gray-900 text-start">${booking.lab}</h3>
                                    </div>
                                    <span class="status-badge font-medium rounded-full ${statusColors[booking.status]}">
                                        ${statusText[booking.status]}
                                    </span>
                                </div>
                                <p class="text-sm text-start text-gray-600 mb-2">${booking.kegiatan}</p>
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-gray-500 flex items-center">
                                        <i class="fas fa-clock mr-1"></i>
                                        ${booking.waktu}
                                    </span>
                                    <span class="text-gray-500">${booking.peminjam}</span>
                                </div>
                            `;
                        bookingList.appendChild(bookingElement);
                    });
                } else {
                    bookingList.innerHTML = `
                            <div class="text-center py-8 text-gray-500">
                                <i class="fas fa-calendar-times text-3xl mb-2"></i>
                                <p>Tidak ada peminjaman</p>
                                <p class="text-sm mt-1">pada tanggal ini</p>
                            </div>
                        `;
                }
            }

            function updateStats() {
                const stats = calculateMonthlyStats();
                document.getElementById('totalBookings').textContent = stats.total;
                document.getElementById('approvedBookings').textContent = stats.approved;
                document.getElementById('pendingBookings').textContent = stats.pending;
                document.getElementById('rejectedBookings').textContent = stats.rejected;
            }

            // Initialize calendar
            renderCalendar();
            renderBookingList();
            updateStats();

            // Navigasi bulan
            document.getElementById('prevMonth').addEventListener('click', function () {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar();
            });

            document.getElementById('nextMonth').addEventListener('click', function () {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar();
            });

            document.getElementById('todayButton').addEventListener('click', function () {
                currentDate = new Date();
                selectedDate = new Date();
                renderCalendar();
                renderBookingList();
            });
        });
    </script>
    <script src="{{ asset('js/laboratorium-details.js') }}"></script>
@endsection