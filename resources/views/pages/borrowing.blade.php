@extends('layouts.app')

@section('title', 'Peminjaman - Sistem Peminjaman Laboratorium')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <div class="mb-8 flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h1 class="text-2xl font-bold text-gray-900">Daftar Pengajuan Peminjaman</h1>
                    <p class="mt-2 text-gray-600">Semua pengajuan peminjaman laboratorium</p>
                </div>
            </div>
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kegiatan</th>
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
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Row 1 -->
                            @foreach ($list_peminjaman as $book)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm">{{ $book->nama_kegiatan }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div>
                                                <div class="text-sm text-gray-900">{{ $book->laboratorium->nama_laboratorium }}</div>
                                                <div class="text-sm text-gray-500">{{ $book->laboratorium->lokasi }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $book->tanggal }}</div>
                                        <div class="text-sm text-gray-500"> {{ date('H:i', strtotime($book->jam_mulai)) }} - 
                                            {{ date('H:i', strtotime($book->jam_selesai)) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $book->peminjam->nama ?? '-' }}</div>
                                        <div class="text-sm text-gray-500 capitalize">{{ $book->peminjam_type }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span
                                            class="px-2 capitalize inline-flex text-xs leading-5 font-semibold rounded-full status-{{ $book->status}}">
                                            {{ $book->status == 'pending' ? 'menunggu' : ($book->status == 'approved' ? 'disetujui' : ($book->status == 'cancelled' ? 'dibatalkan' : 'ditolak')
)
}}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route("borrowing-details", $book->id_peminjaman) }}" class="text-primary hover:text-primary-dark mr-3">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="bg-white px-4 py-3 flex items-center justify-between border-t border-gray-200 sm:px-6">
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Menampilkan
                                <span class="font-medium">{{ $list_peminjaman->firstItem() }}</span>
                                sampai
                                <span class="font-medium">{{ $list_peminjaman->lastItem() }}</span>
                                dari
                                <span class="font-medium">{{ $list_peminjaman->total() }}</span>
                                hasil
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">

                            @if ($list_peminjaman->onFirstPage())
                                <span
                                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-gray-100 text-sm font-medium text-gray-400 cursor-not-allowed">
                                    <i class="fas fa-chevron-left"></i>
                                </span>
                            @else
                            <a href="{{ $list_peminjaman->previousPageUrl() }}"
                                class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <i class="fas fa-chevron-left"></i>
                                    </a>
                            @endif

                            @foreach ($list_peminjaman->getUrlRange(1, $list_peminjaman->lastPage()) as $page => $url)
                                @if ($page == $list_peminjaman->currentPage())
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
                            @if ($list_peminjaman->hasMorePages())
                                <a href="{{ $list_peminjaman->nextPageUrl() }}"
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
        </div>
    </div>
    <script src="js/borrowing.js"></script>
@endsection