@extends('layouts.app')

@section('title', 'Laboratorium - Sistem Peminjaman Laboratorium')

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
                    @if (Auth::check() && Auth::user()->isAdmin())
                        <button class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-plus mr-2"></i>
                            Tambah Lab
                        </button>
                    @endif
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
                                        <div class="text-lg font-medium text-gray-900">
                                            {{ $laboratorium->total()}}
                                        </div>
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
                                        <div class="text-lg font-medium text-gray-900">
                                            {{ $jumlah_tersedia }}
                                        </div>
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
                                        <div class="text-lg font-medium text-gray-900">
                                            {{ $laboratorium->where('status', 'dalam perawatan')->count() }}
                                        </div>
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
                                        <div class="text-lg font-medium text-gray-900">
                                            {{ $laboratorium->where('status', 'tidak tersedia')->count() }}
                                        </div>
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
                            @foreach($lokasiOnly as $lab)
                                <option value="{{ $lab->lokasi }}">{{ $lab->lokasi }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Laboratorium Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                @foreach ($laboratorium as $lab)
                    <div class="bg-white rounded-lg shadow card-hover">
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-900">{{ $lab->nama_laboratorium }}</h3>

                                    @php
                                        $statusClass = match ($lab->status) {
                                            'Tersedia' => 'status-available',
                                            'Tidak Tersedia' => 'status-unavailable',
                                            'Dalam Perawatan' => 'status-maintenance',
                                            default => 'status-available',
                                        };
                                    @endphp

                                    <span
                                        class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }} mt-1">
                                        Tersedia
                                    </span>
                                </div>

                                <div class="h-12 w-12 rounded-lg bg-primary flex items-center justify-center">
                                    <i class="fas {{ $lab->ikon ?? 'fa-desktop' }} text-white text-xl"></i>
                                </div>
                            </div>

                            <div class="space-y-2 text-sm text-gray-600">
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2 text-primary"></i>
                                    <span>{{ $lab->lokasi }}</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-users mr-2 text-primary"></i>
                                    <span>Kapasitas: {{ $lab->kapasitas }} orang</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-tools mr-2 text-primary"></i>
                                    <div>
                                        @if($lab->fasilitas->isNotEmpty())
                                            <ul class="list-disc list-inside text-sm text-gray-600">
                                                @foreach($lab->fasilitas as $fas)
                                                    <span>{{ $fas->jumlah }}
                                                        {{ $fas->barang->nama_barang ?? 'Barang tidak ditemukan' }}, </span>
                                                @endforeach
                                            </ul>
                                        @else
                                            <span>Tidak ada fasilitas</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <p class="mt-4 text-sm text-gray-500 line-clamp-2">
                                {{ $lab->deskripsi }}
                            </p>

                            <div class="mt-6 flex space-x-3">
                                <a href="{{ route('detail-laboratorium', $lab->id_laboratorium) }}"
                                    class="flex-1 bg-primary text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary-dark inline-flex items-center justify-center">
                                    <i class="fas fa-eye mr-1"></i> Detail
                                </a>

                                @if(Auth::check() && Auth::user()->isAdmin())
                                    <a href="{{ route("edit.laboratorium") }}"
                                        class="flex-1 border border-primary text-primary text-center py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary hover:text-white">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <a href="{{ route('delete.laboratorium', $lab->id_laboratorium) }}"
                                        class="btn-delete flex-1 bg-primary text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary-dark inline-flex items-center justify-center">
                                        <i class="fas fa-trash mr-1"></i> Hapus
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div
                class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6 rounded-lg shadow">
                <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm text-gray-700">
                            Menampilkan
                            <span class="font-medium">{{ $laboratorium->firstItem() }}</span>
                            sampai
                            <span class="font-medium">{{ $laboratorium->lastItem() }}</span>
                            dari
                            <span class="font-medium">{{ $laboratorium->total() }}</span>
                            laboratorium
                        </p>
                    </div>
                    <div>
                        <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                            {{-- Tombol Previous --}}
                            @if ($laboratorium->onFirstPage())
                                <span
                                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-gray-100 text-sm font-medium text-gray-400 cursor-not-allowed">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            @else
                                <a href="{{ $laboratorium->previousPageUrl() }}"
                                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <i class="fas fa-chevron-left"></i>
                                </a>
                            @endif

                            {{-- Nomor Halaman --}}
                            @foreach ($laboratorium->getUrlRange(1, $laboratorium->lastPage()) as $page => $url)
                                @if ($page == $laboratorium->currentPage())
                                    <span
                                        class="z-10 bg-primary border-primary text-white relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $url }}"
                                        class="bg-white border-gray-300 text-gray-500 hover:bg-gray-50 relative inline-flex items-center px-4 py-2 border text-sm font-medium">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach

                            {{-- Tombol Next --}}
                            @if ($laboratorium->hasMorePages())
                                <a href="{{ $laboratorium->nextPageUrl() }}"
                                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <i class="fas fa-chevron-right"></i>
                                </a>
                            @else
                                <span
                                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-gray-100 text-sm font-medium text-gray-400 cursor-not-allowed">
                                    <i class="fas fa-chevron-right"></i>
                                </span>
                            @endif
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- Delete Confirmation Modal -->
        <div id="deleteModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-2">Konfirmasi Hapus</h3>
                    <p class="text-gray-600" id="modalMessage">Apakah Anda yakin ingin menghapus laboratorium ini?</p>

                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" id="cancelDelete"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                            Batal
                        </button>
                        <button type="button" id="confirmDelete" class="px-4 py-2 bg-primary text-white rounded-lg">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(function () {
            var labIdToDelete = null;
            var $cardToDelete = null;

            // Set CSRF token
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' }
            });

            // Klik tombol Hapus → tampilkan modal
            $('.btn-delete').on('click', function (e) {
                e.preventDefault();

                $cardToDelete = $(this).closest('.bg-white');
                labIdToDelete = $(this).attr('href').split('/').pop();
                var labName = $cardToDelete.find('h3').text().trim();

                // Ubah teks modal
                $('#modalMessage').text(`Apakah Anda yakin ingin menghapus laboratorium "${labName}"?`);

                // Tampilkan modal
                $('#deleteModal').removeClass('hidden').addClass('flex');
            });

            // Klik Batal → tutup modal
            $('#cancelDelete').on('click', function () {
                $('#deleteModal').removeClass('flex').addClass('hidden');
                labIdToDelete = null;
                $cardToDelete = null;
            });

            // Klik Hapus → kirim AJAX
            $('#confirmDelete').on('click', function () {
                if (!labIdToDelete) return;

                $.ajax({
                    url: '/delete-laboratorium/' + labIdToDelete,
                    type: 'DELETE',
                    success: function (response) {
                        // Hapus card lab
                        if ($cardToDelete) $cardToDelete.remove();

                        // Tutup modal
                        $('#deleteModal').removeClass('flex').addClass('hidden');

                        // Reset
                        labIdToDelete = null;
                        $cardToDelete = null;

                        // Reload daftar peminjaman (jika ada)
                        $('#booking-list').load('/booking #booking-list > *');
                    },
                    error: function (xhr) {
                        alert('Gagal menghapus laboratorium.');
                        console.log(xhr.responseText);
                    }
                });
            });
        });
    </script>


@endsection