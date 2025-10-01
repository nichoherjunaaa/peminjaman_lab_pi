@extends('layouts.app')

@section('title', 'Peminjaman - Sistem Peminjaman Laboratorium')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <!-- Header -->
            <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Kalender Peminjaman</h1>
                    <p class="mt-2 text-gray-600">Lihat jadwal peminjaman laboratorium</p>
                </div>
                <a href={{ url('/create') }}
                    class="mt-4 sm:mt-0 bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Ajukan Peminjaman
                </a>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Calendar Section -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-lg shadow">
                        <!-- Calendar Header -->
                        <div class="px-6 py-4 border-b border-gray-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-lg font-semibold text-gray-900" id="currentMonth">Oktober 2023</h2>
                                </div>
                                <div class="flex space-x-2">
                                    <button id="prevMonth" class="p-2 rounded-lg hover:bg-gray-100">
                                        <i class="fas fa-chevron-left text-gray-600"></i>
                                    </button>
                                    <button class="p-2 rounded-lg hover:bg-gray-100 text-sm text-gray-600" id="todayButton">
                                        Hari Ini
                                    </button>
                                    <button id="nextMonth" class="p-2 rounded-lg hover:bg-gray-100">
                                        <i class="fas fa-chevron-right text-gray-600"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Weekday Headers -->
                            <div class="grid grid-cols-7 mt-4">
                                <div class="text-center text-sm font-medium text-gray-500 py-2">Min</div>
                                <div class="text-center text-sm font-medium text-gray-500 py-2">Sen</div>
                                <div class="text-center text-sm font-medium text-gray-500 py-2">Sel</div>
                                <div class="text-center text-sm font-medium text-gray-500 py-2">Rab</div>
                                <div class="text-center text-sm font-medium text-gray-500 py-2">Kam</div>
                                <div class="text-center text-sm font-medium text-gray-500 py-2">Jum</div>
                                <div class="text-center text-sm font-medium text-gray-500 py-2">Sab</div>
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
                        <h3 class="text-sm font-medium text-gray-900 mb-3">Statistik Bulan Ini</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Total Peminjaman</span>
                                <span class="text-sm font-medium text-gray-900" id="totalBookings">0</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Disetujui</span>
                                <span class="text-sm font-medium text-green-600" id="approvedBookings">0</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Menunggu</span>
                                <span class="text-sm font-medium text-yellow-600" id="pendingBookings">0</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">Ditolak</span>
                                <span class="text-sm font-medium text-red-600" id="rejectedBookings">0</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('partials.script-peminjaman')
@endsection