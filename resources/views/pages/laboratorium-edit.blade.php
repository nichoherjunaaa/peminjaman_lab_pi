@extends('layouts.app')

@section('title', 'Edit Laboratorium - Sistem Peminjaman Laboratorium')

@section('content')
<div class="flex flex-col flex-1">
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

                <!-- Form -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-5 border-b border-gray-200">
                        <h3 class="text-lg font-medium text-gray-900">Informasi Laboratorium</h3>
                        <p class="mt-1 text-sm text-gray-500">Lengkapi data laboratorium dengan benar</p>
                    </div>

                    <form class="p-6 space-y-6" 
                          action="{{ route('laboratorium.update', $data->id_laboratorium) }}" 
                          method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nama Lab -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Nama Laboratorium</label>
                            <input type="text" name="nama_laboratorium"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                   value="{{ old('nama_laboratorium', $data->nama_laboratorium) }}" required>
                        </div>

                        <!-- Lokasi -->
                        @php
                            $floors = ['Lantai 2','Lantai 3','Lantai 4'];
                        @endphp
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Lantai</label>
                            <select name="lokasi" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                @foreach($floors as $floor)
                                    <option value="{{ $floor }}"
                                        {{ old('lokasi', $data->lokasi) == $floor ? 'selected' : '' }}>
                                        {{ $floor }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Kapasitas -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Kapasitas</label>
                            <input type="number" name="kapasitas" min="1"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                   value="{{ old('kapasitas', $data->kapasitas) }}" required>
                        </div>

                        <!-- Status -->
                        @php
                            $statuses = ['tersedia','dalam perawatan','tidak tersedia'];
                        @endphp
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <select name="status" class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                @foreach($statuses as $st)
                                    <option value="{{ $st }}"
                                        {{ old('status', $data->status) == $st ? 'selected' : '' }}>
                                        {{ ucfirst($st) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Luas -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Luas (m²)</label>
                            <input type="number" name="luas" min="0"
                                   class="w-full border border-gray-300 rounded-lg px-3 py-2"
                                   value="{{ old('luas', $data->luas) }}">
                        </div>

                        <!-- Fasilitas -->
                        <div>
                            <div class="flex justify-between items-center mb-4">
                                <label class="block text-sm font-medium text-gray-700">Fasilitas</label>
                                <button type="button" id="tambah-fasilitas"
                                        class="px-3 py-1 bg-primary text-white rounded-lg text-sm">
                                    <i class="fas fa-plus mr-1"></i> Tambah Fasilitas
                                </button>
                            </div>

                            <div id="fasilitas-container" class="space-y-3">

                                {{-- Fasilitas Lama --}}
                                @foreach($fasilitas as $fas)
                                    <div class="fasilitas-item flex space-x-3">
                                        <div class="flex-1">
                                            <select name="barang_id[]" 
                                                class="w-full border border-gray-300 rounded-lg px-3 py-2 fasilitas-select">
                                                <option value="">Pilih Fasilitas</option>
                                                @foreach($barangList as $barang)
                                                    <option value="{{ $barang->id_barang }}"
                                                        {{ $barang->id_barang == $fas->id_barang ? 'selected' : '' }}>
                                                        {{ $barang->nama_barang }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="w-1/4">
                                            <input type="number" name="jumlah[]" min="1"
                                                   value="{{ $fas->jumlah }}"
                                                   class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                        </div>

                                        <div class="flex items-center">
                                            <button type="button" class="hapus-fasilitas text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div id="fasilitas-duplicate-error"
                                 class="hidden text-red-500 text-sm mt-2">
                                <i class="fas fa-exclamation-circle mr-1"></i>
                                Terdapat fasilitas yang duplikat.
                            </div>
                        </div>

                        <!-- TEMPLATE -->
                        <template id="fasilitas-template">
                            <div class="fasilitas-item flex space-x-3">
                                <div class="flex-1">
                                    <select name="barang_id[]"
                                        class="w-full border border-gray-300 rounded-lg px-3 py-2 fasilitas-select">
                                        <option value="">Pilih Fasilitas</option>
                                        @foreach($barangList as $barang)
                                            <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="w-1/4">
                                    <input type="number" name="jumlah[]" min="1"
                                           value="1"
                                           class="w-full border border-gray-300 rounded-lg px-3 py-2">
                                </div>

                                <div class="flex items-center">
                                    <button type="button" class="hapus-fasilitas text-red-500 hover:text-red-700">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </template>

                        <!-- Deskripsi -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                            <textarea name="deskripsi" rows="4"
                                class="w-full border border-gray-300 rounded-lg px-3 py-2">{{ old('deskripsi', $data->deskripsi) }}</textarea>
                        </div>

                        <!-- Tombol -->
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('laboratorium.index') }}"
                               class="px-4 py-2 border border-gray-300 rounded-lg">Batal</a>

                            <button class="px-4 py-2 bg-primary text-white rounded-lg">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </main>
</div>

<!-- SCRIPT FIX -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const container = document.getElementById('fasilitas-container');
    const tambahBtn = document.getElementById('tambah-fasilitas');
    const template = document.getElementById('fasilitas-template');
    const duplicateError = document.getElementById('fasilitas-duplicate-error');

    // Tambah Fasilitas
    tambahBtn.addEventListener('click', () => {
        const clone = template.content.cloneNode(true);
        container.appendChild(clone);
        applyEvents();
        validateDuplicate();
    });

    function applyEvents() {
        document.querySelectorAll('.hapus-fasilitas').forEach(btn => {
            btn.onclick = function () {
                if (document.querySelectorAll('.fasilitas-item').length > 1) {
                    this.closest('.fasilitas-item').remove();
                    validateDuplicate();
                }
            };
        });

        document.querySelectorAll('.fasilitas-select').forEach(sel => {
            sel.onchange = validateDuplicate;
        });
    }

    // Cek duplikat
    function validateDuplicate() {
        const selects = document.querySelectorAll('.fasilitas-select');
        const values = [];
        let duplicates = [];

        selects.forEach(sel => {
            sel.classList.remove('border-red-500');
            if (sel.value !== "") values.push(sel.value);
        });

        duplicates = values.filter((v, i) => values.indexOf(v) !== i);

        selects.forEach(sel => {
            if (duplicates.includes(sel.value)) {
                sel.classList.add('border-red-500');
            }
        });

        duplicateError.classList.toggle('hidden', duplicates.length === 0);
    }

    applyEvents();
    validateDuplicate();
});
</script>

@endsection
