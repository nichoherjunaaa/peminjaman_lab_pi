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
                    <button class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-magnifying-glass mr-2"></i>
                        Quick Book
                    </button>
                    @if (Auth::check() && Auth::user()->isAdmin())
                        <a href="{{ route('laboratorium.create') }}">
                            <button
                                class="bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded-lg flex items-center">
                                <i class="fas fa-plus mr-2"></i>
                                Tambah Lab
                            </button>
                        </a>
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
                                            {{ $laboratorium->total() }}
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
                            @foreach ($lokasiOnly as $lab)
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
                                    <h3 class="text-lg font-semibold text-primary">{{ $lab->nama_laboratorium }}</h3>

                                    @php
                                        $statusClass = match ($lab->status) {
                                            'tersedia' => 'bg-green-100 text-green-800',
                                            'tidak tersedia' => 'bg-red-100 text-red-800',
                                            'dalam perawatan' => 'bg-yellow-100 text-yellow-800',
                                            default => 'bg-gray-100 text-gray-800',
                                        };

                                        $statusText = match ($lab->status) {
                                            'tersedia' => 'Tersedia',
                                            'tidak tersedia' => 'Tidak Tersedia',
                                            'dalam perawatan' => 'Dalam Perawatan',
                                            default => $lab->status,
                                        };
                                    @endphp

                                    <span
                                        class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusClass }} mt-1">
                                        {{ $statusText }}
                                    </span>
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
                                        @if ($lab->fasilitas->isNotEmpty())
                                            <ul class="list-disc list-inside text-sm text-gray-600">
                                                @foreach ($lab->fasilitas as $fas)
                                                    <span>{{ $fas->jumlah }}
                                                        {{ $fas->barang->nama_barang ?? 'Barang tidak ditemukan' }},
                                                    </span>
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

                                @if (Auth::check() && Auth::user()->isAdmin())
                                    <a href="{{ route('edit.laboratorium', $lab->id_laboratorium) }}"
                                        class="flex-1 bg-primary text-white py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary-dark inline-flex items-center justify-center">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <button type="button"
                                        class="btn-delete flex-1 border border-primary text-primary text-center py-2 px-4 rounded-lg text-sm font-medium hover:bg-primary hover:text-white"
                                        data-lab-id="{{ $lab->id_laboratorium }}"
                                        data-lab-name="{{ $lab->nama_laboratorium }}">
                                        <i class="fas fa-trash mr-1"></i> Hapus
                                    </button>
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
                        <button type="button" id="confirmDelete"
                            class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                            Ya, Hapus
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var labIdToDelete = null;

            // Set CSRF token untuk semua AJAX request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            // Klik tombol Hapus → tampilkan modal
            $(document).on('click', '.btn-delete', function() {
                labIdToDelete = $(this).data('lab-id');
                var labName = $(this).data('lab-name');

                // Update pesan modal
                $('#modalMessage').text(`Apakah Anda yakin ingin menghapus laboratorium "${labName}"?`);

                // Tampilkan modal
                $('#deleteModal').removeClass('hidden').addClass('flex');
            });

            // Klik Batal → tutup modal
            $('#cancelDelete').on('click', function() {
                $('#deleteModal').removeClass('flex').addClass('hidden');
                labIdToDelete = null;
            });

            // Klik Konfirmasi Hapus → kirim AJAX
            $('#confirmDelete').on('click', function() {
                if (!labIdToDelete) return;

                // Tampilkan loading state
                $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i> Menghapus...').prop('disabled',
                    true);

                $.ajax({
                    url: '/laboratorium/' + labIdToDelete,
                    type: 'DELETE',
                    success: function(response) {
                        // Tutup modal
                        $('#deleteModal').removeClass('flex').addClass('hidden');

                        // Tampilkan pesan sukses
                        showAlert('success', 'Laboratorium berhasil dihapus');

                        // Hapus card dari DOM
                        $(`[data-lab-id="${labIdToDelete}"]`).closest('.bg-white').fadeOut(300,
                            function() {
                                $(this).remove();
                                // Optional: reload halaman jika perlu
                                // location.reload();
                            });
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr);

                        // Reset button state
                        $('#confirmDelete').html('Ya, Hapus').prop('disabled', false);

                        // Tampilkan pesan error
                        let errorMessage = 'Gagal menghapus laboratorium.';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        showAlert('error', errorMessage);
                    },
                    complete: function() {
                        labIdToDelete = null;
                    }
                });
            });

            // Fungsi untuk menampilkan alert
            function showAlert(type, message) {
                const alertClass = type === 'success' ?
                    'bg-green-50 border-green-200 text-green-700' :
                    'bg-red-50 border-red-200 text-red-700';

                const icon = type === 'success' ?
                    '<i class="fas fa-check-circle mr-2"></i>' :
                    '<i class="fas fa-exclamation-circle mr-2"></i>';

                const alertHtml = `
                    <div class="fixed top-4 right-4 ${alertClass} border px-6 py-4 rounded-lg shadow-lg z-50 fade-in">
                        <div class="flex items-center">
                            ${icon}
                            <span>${message}</span>
                        </div>
                    </div>
                `;

                $('body').append(alertHtml);

                // Auto remove setelah 5 detik
                setTimeout(() => {
                    $('.fade-in').fadeOut(300, function() {
                        $(this).remove();
                    });
                }, 5000);
            }

            // Tutup modal ketika klik di luar modal
            $(document).on('click', function(e) {
                if ($(e.target).attr('id') === 'deleteModal') {
                    $('#deleteModal').removeClass('flex').addClass('hidden');
                    labIdToDelete = null;
                }
            });
        });
    </script>

    <style>
        .fade-in {
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .card-hover {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
    </style>
@endsection
