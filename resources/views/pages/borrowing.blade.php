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

            <!-- Search and Filter -->
            @if (Auth::check() && Auth::user()->isAdmin())
                <div class="bg-white p-4 rounded-lg shadow mb-6">
                    <form action="{{ route('borrowing.index') }}" method="GET" class="flex flex-col sm:flex-row gap-4">
                        {{-- Search --}}
                        <div class="flex-1">
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Cari Laboratorium</label>
                            <div class="relative">
                                <input type="text" id="search" name="search" value="{{ request('search') }}"
                                    placeholder="Cari laboratorium..."
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 pl-10 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                            </div>
                        </div>

                        {{-- Laboratorium --}}
                        <div class="flex-1">
                            <label for="laboratorium" class="block text-sm font-medium text-gray-700 mb-1">Laboratorium</label>
                            <select id="laboratorium" name="laboratorium"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <option value="">Semua Laboratorium</option>
                                @foreach ($laboratorium as $lab)
                                    <option value="{{ $lab->id_laboratorium }}" {{ request('laboratorium') == $lab->id_laboratorium ? 'selected' : '' }}>
                                        {{ $lab->laboratorium->nama_laboratorium ?? 'Tidak diketahui' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tanggal --}}
                        <div class="flex-1">
                            <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                            <select id="tanggal" name="tanggal"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500 text-sm">
                                <option value="">Semua Tanggal</option>
                                @foreach ($tanggal_peminjaman as $date)
                                    <option value="{{ $date->tanggal }}" {{ request('tanggal') == $date->tanggal ? 'selected' : '' }}>
                                        {{ $date->tanggal }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tombol Filter --}}
                        <div class="flex items-end gap-2">
                            <button type="submit" class="px-5 py-2 bg-primary text-white text-sm rounded-lg ">
                                Terapkan
                            </button>
                            <a href="{{ route('borrowing.index') }}"
                                class="px-5 py-2 bg-gray-200 text-gray-700 text-sm rounded-lg hover:bg-gray-300 transition">
                                Reset
                            </a>
                        </div>
                    </form>
                </div>
            @endif

            {{-- Table Content --}}
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-5">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kegiatan
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Laboratorium
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal & Waktu
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Peminjam
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($list_peminjaman as $book)
                                                <tr class="hover:bg-gray-50 transition">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-500">
                                                        {{ $book->nama_kegiatan }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ $book->laboratorium->nama_laboratorium }}</div>
                                                        <div class="text-sm text-gray-500">{{ $book->laboratorium->lokasi }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                        {{ $book->tanggal }}
                                                        <div class="text-sm text-gray-500">
                                                            {{ date('H:i', strtotime($book->jam_mulai)) }} -
                                                            {{ date('H:i', strtotime($book->jam_selesai)) }}
                                                        </div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="text-sm text-gray-900">{{ $book->peminjam->nama ?? '-' }}</div>
                                                        <div class="text-sm text-gray-500 capitalize">{{ $book->peminjam_type }}</div>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <span
                                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full capitalize status-{{ $book->status }}">
                                                            {{ $book->status == 'pending'
                                ? 'menunggu'
                                : ($book->status == 'approved'
                                    ? 'disetujui'
                                    : ($book->status == 'cancelled'
                                        ? 'dibatalkan'
                                        : 'ditolak')) }}
                                                        </span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                                        <a href="{{ route('borrowing-details', $book->id_peminjaman) }}"
                                                            class="text-primary hover:text-blue-800">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                        Data tidak ditemukan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>

                    </table>
                </div>
            </div>


            </tbody>
            </table>
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
        <!-- Pagination -->
    </div>
    <script src="js/borrowing.js"></script>
@endsection