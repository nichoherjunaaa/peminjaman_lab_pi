@extends('layouts.app')

@section('title', 'Beranda - Sistem Peminjaman Laboratorium')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-2xl font-bold font-segoe text-gray-900">Universitas Sanata Dharma</h1>
            <p class="mt-2 text-gray-600">Selamat datang di Sistem Peminjaman Laboratorium</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
            <x-stats-card 
                icon="fas fa-calendar-check" 
                title="Total Peminjaman" 
                value="24"
                color="primary"
            />
            
            <x-stats-card 
                icon="fas fa-clock" 
                title="Peminjaman Aktif" 
                value="8"
                color="secondary"
            />
            
            <x-stats-card 
                icon="fas fa-building" 
                title="Laboratorium Tersedia" 
                value="12"
                color="primary"
            />
            
            <x-stats-card 
                icon="fas fa-hourglass-half" 
                title="Menunggu Persetujuan" 
                value="5"
                color="secondary"
            />
        </div>

        <!-- Quick Actions -->
        <div class="mb-8">
            <h2 class="text-lg font-medium text-gray-900 mb-4">Aksi Cepat</h2>
            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-3">
                <x-quick-action 
                    href="{{ url('/peminjaman') }}"
                    icon="fas fa-plus-circle"
                    title="Ajukan Peminjaman"
                    description="Buat permintaan peminjaman baru"
                />
                
                <x-quick-action 
                    href="{{ url('/laboratorium') }}"
                    icon="fas fa-calendar-alt"
                    title="Lihat Jadwal"
                    description="Cek ketersediaan laboratorium"
                />
                
                <x-quick-action 
                    href="{{ url('/riwayat') }}"
                    icon="fas fa-history"
                    title="Riwayat"
                    description="Lihat riwayat peminjaman"
                />
            </div>
        </div>

        <!-- Recent Peminjaman -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Peminjaman Terbaru</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Daftar peminjaman laboratorium terbaru</p>
            </div>
            <div class="bg-white overflow-hidden">
                <ul class="divide-y divide-gray-200">
                    <x-recent-booking-item 
                        activity="Praktikum Basis Data"
                        location="Lab. Basis Data B"
                        date="15 Sep 2025, 08:00-10:00"
                        status="approved"
                        statusText="Disetujui"
                    />
                    
                    <x-recent-booking-item 
                        activity="Workshop Pemrograman"
                        location="Lab. Komputer"
                        date="16 Sep 2025, 13:00-15:00"
                        status="pending"
                        statusText="Pending"
                    />
                    
                    <x-recent-booking-item 
                        activity="Praktikum Jaringan Dasar"
                        location="Lab. Komputer Jaringan"
                        date="17 Sep 2025, 10:00-12:00"
                        status="approved"
                        statusText="Disetujui"
                    />
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection