@extends('layouts.app')

@section('title', 'Peminjaman - Sistem Peminjaman Laboratorium')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg ">
            <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Daftar Pengajuan Peminjaman</h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Semua pengajuan peminjaman laboratorium</p>
            </div>

            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Keperluan</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Laboratorium</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Tanggal & Waktu</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Peminjam</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Status</th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <!-- tabel daftar pengajuan  -->
                <tbody class="bg-white divide-y divide-gray-200">

                    <!-- row 1 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Kelas Algoritma
                            </div>
                            <div class="text-sm text-gray-500">Keperluan: Kelas
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-lg bg-primary flex items-center justify-center mr-3">
                                    <i class="fas fa-desktop text-white text-sm"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-900">Lab. Komputer Dasar B</div>
                                    <div class="text-sm text-gray-500">Gedung B Lt. 1</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 font-bold">16 Okt 2025</div>
                            <div class="text-sm text-gray-500">13:00 - 15:00</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Albert Santus </div>
                            <div class="text-sm text-gray-500">MahaDosen</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full status-approved">
                                Disetujui
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-primary hover:text-primary-dark mr-3" onclick="openDetailModal()">
                                 <a href="{{route('detail-peminjaman')}}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </button>

                        </td>
                    </tr>
                    <!-- row 2 -->

                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Kelas Algoritma
                            </div>
                            <div class="text-sm text-gray-500">Keperluan: Kelas
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-lg bg-primary flex items-center justify-center mr-3">
                                    <i class="fas fa-desktop text-white text-sm"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-900">Lab. Komputer Dasar B</div>
                                    <div class="text-sm text-gray-500">Gedung B Lt. 1</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 font-bold">16 Okt 2025</div>
                            <div class="text-sm text-gray-500">13:00 - 15:00</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Albert Santus </div>
                            <div class="text-sm text-gray-500">MahaDosen</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full status-rejected">
                                Ditolak
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-primary hover:text-primary-dark mr-3" onclick="openDetailModal()">
                                <a href="{{route('detail-peminjaman')}}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </button>

                        </td>
                    </tr>
                    <!-- row 3-->
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Kelas Algoritma
                            </div>
                            <div class="text-sm text-gray-500">Keperluan: Kelas
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-lg bg-primary flex items-center justify-center mr-3">
                                    <i class="fas fa-desktop text-white text-sm"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-900">Lab. Komputer Dasar B</div>
                                    <div class="text-sm text-gray-500">Gedung B Lt. 1</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 font-bold">16 Okt 2025</div>
                            <div class="text-sm text-gray-500">13:00 - 15:00</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Albert Santus </div>
                            <div class="text-sm text-gray-500">MahaDosen</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span
                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full status-cancelled">
                                dibatalkan
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-primary hover:text-primary-dark mr-3" onclick="openDetailModal()">
                                 <a href="{{route('detail-peminjaman')}}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </button>

                        </td>
                    </tr>

                    <!-- row 4 -->
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">Kelas Algoritma
                            </div>
                            <div class="text-sm text-gray-500">Keperluan: Kelas
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="h-8 w-8 rounded-lg bg-primary flex items-center justify-center mr-3">
                                    <i class="fas fa-desktop text-white text-sm"></i>
                                </div>
                                <div>
                                    <div class="text-sm text-gray-900">Lab. Komputer Dasar B</div>
                                    <div class="text-sm text-gray-500">Gedung B Lt. 1</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900 font-bold">16 Okt 2025</div>
                            <div class="text-sm text-gray-500">13:00 - 15:00</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">Albert Santus </div>
                            <div class="text-sm text-gray-500">MahaDosen</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full status-done">
                                Selesai
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <button class="text-primary hover:text-primary-dark mr-3" onclick="openDetailModal()">
                                 <a href="{{route('detail-peminjaman')}}">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </button>

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection