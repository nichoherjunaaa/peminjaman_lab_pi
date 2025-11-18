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
                            <a href="{{ route('laboratorium.index') }}" class="text-primary hover:text-primary-dark mr-3">
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

                        <form class="p-6 space-y-6" action="{{ route('laboratorium.update', $data->id_laboratorium) }}"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Nama Laboratorium -->
                            <div>
                                <label for="nama_laboratorium" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                    Laboratorium</label>
                                <input type="text" id="nama_laboratorium" name="nama_laboratorium"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    value="{{ old('nama_laboratorium', $data->nama_laboratorium) }}" required>
                            </div>

                            <!-- Lokasi -->
                            @php
                                $floors = ['Lantai 2' => 'Lantai 2', 'Lantai 3' => 'Lantai 3', 'Lantai 4' => 'Lantai 4'];
                                $selectedFloor = old('lokasi', $data->lokasi);
                            @endphp
                            <div>
                                <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-1">Lantai</label>
                                <select id="lokasi" name="lokasi"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    @foreach($floors as $value => $label)
                                        <option value="{{ $value }}" {{ $selectedFloor == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Kapasitas -->
                            <div>
                                <label for="kapasitas" class="block text-sm font-medium text-gray-700 mb-1">Kapasitas
                                    (orang)</label>
                                <input type="number" id="kapasitas" name="kapasitas" min="1" max="100"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    value="{{ old('kapasitas', $data->kapasitas) }}" required>
                            </div>

                            <!-- Status -->
                            @php
                                $statuses = [
                                    'tersedia' => 'Tersedia',
                                    'dalam perawatan' => 'Dalam Perawatan',
                                    'tidak tersedia' => 'Tidak Tersedia'
                                ];
                                $selectedStatus = old('status', $data->status);
                            @endphp
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select id="status" name="status"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    @foreach($statuses as $value => $label)
                                        <option value="{{ $value }}" {{ $selectedStatus == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Luas -->
                            <div>
                                <label for="luas" class="block text-sm font-medium text-gray-700 mb-1">Luas (m²)</label>
                                <input type="number" id="luas" name="luas" min="0"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    value="{{ old('luas', $data->luas) }}">
                            </div>

                            <!-- Deskripsi -->
                            <div>
                                <label for="deskripsi"
                                    class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                                <textarea id="deskripsi" name="deskripsi" rows="4"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                            </div>

                            <!-- Tombol Aksi -->
                            <div class="flex justify-end space-x-3 pt-6">
                                <a href="{{ route('laboratorium.index') }}"
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