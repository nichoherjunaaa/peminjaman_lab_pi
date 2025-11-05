@extends('layouts.app')

@section('title', 'Tambah Laboratorium | Sistem Peminjaman Laboratorium')

@section('content')
    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-10 rounded-2xl shadow-xl border border-gray-100">
            <h2 class="text-3xl font-bold text-primary mb-8 text-center">Tambah Data Ruangan</h2>

            <form action="" method="POST" class="space-y-5">
                @csrf

                {{-- Nama --}}
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Ruangan</label>
                    <input type="text" id="nama" name="nama" required placeholder="Laboratorium Basis Data A"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2">
                </div>

                {{-- Lokasi (Dropdown) --}}
                <div>
                    <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-1">Lokasi</label>
                    <select id="lokasi" name="lokasi" required
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2">
                        <option value="">Pilih Lokasi</option>
                        <option value="Gedung A">Gedung A</option>
                        <option value="Gedung B">Gedung B</option>
                        <option value="Gedung C">Gedung C</option>
                    </select>
                </div>

                {{-- Kapasitas --}}
                <div>
                    <label for="kapasitas" class="block text-sm font-medium text-gray-700 mb-1">Kapasitas</label>
                    <input type="number" id="kapasitas" name="kapasitas" min="1" required placeholder="30"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2">
                </div>
                {{-- Fasilitas (Dropdown) --}}
                <div>
                    <label for="fasilitas" class="block text-sm font-medium text-gray-700 mb-1">Fasilitas</label>
                    <select id="fasilitas" name="fasilitas" required
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2">
                        <option value="">Pilih Fasilitas</option>
                        <option value="Proyektor">Proyektor</option>
                        <option value="AC">AC</option>
                        <option value="Komputer">Komputer</option>
                        <option value="Papan Tulis">Papan Tulis</option>
                    </select>
                </div>
                {{--jumlah fasilitas --}}
                <div class="hidden" id="jumlah-fasilitas">
                    <label for="jumlah" class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                    <input type="number" id="jumlah" name="jumlah" min="1" required placeholder="15 "
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2">
                </div>

                {{-- Status (Dropdown) --}}
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select id="status" name="status" required
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2">
                        <option value=""> Pilih Status </option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Tidak Tersedia">Tidak Tersedia</option>
                        <option value="Perbaikan">Perbaikan</option>
                    </select>
                </div>

                {{-- Luas --}}
                <div>
                    <label for="luas" class="block text-sm font-medium text-gray-700 mb-1">Luas (m²)</label>
                    <input type="number" id="luas" name="luas" step="0.1" required placeholder="100"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2">
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2"
                        placeholder="Tuliskan deskripsi ruangan..."></textarea>
                </div>



                {{-- Tombol Simpan --}}
                <div class="flex justify-end">
                    <button type="submit" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                        Simpan
                    </button>
                </div>
            </form>

        </div>
    </div>
    <script src="{{ asset('js/add-laboratorium.js') }}"></script>
@endsection
