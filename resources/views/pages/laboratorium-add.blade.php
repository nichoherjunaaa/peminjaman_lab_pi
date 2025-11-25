@extends('layouts.app')

@section('title', 'Tambah Laboratorium - Sistem Peminjaman Laboratorium')

@section('content')
    <div class="flex flex-col flex-1">
        <main class="flex-1">
            <div class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <a href="{{ route('laboratorium.index') }}" class="text-primary hover:text-primary-dark mr-3">
                                <i class="fas fa-arrow-left"></i>
                            </a>
                            <h1 class="text-2xl font-bold text-gray-900">Tambah Laboratorium</h1>
                        </div>
                        <p class="text-gray-600">Berikan informasi laboratorium yang sesuai</p>
                    </div>

                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="px-6 py-5 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-900">Informasi Laboratorium</h3>
                            <p class="mt-1 text-sm text-gray-500">Lengkapi data laboratorium dengan benar</p>
                        </div>

                        <form class="p-6 space-y-6" action="{{ route('laboratorium.store') }}" method="POST">
                            @csrf
                            <div>
                                <label for="nama_laboratorium" class="block text-sm font-medium text-gray-700 mb-1">Nama
                                    Laboratorium</label>
                                <input type="text" id="nama_laboratorium" name="nama_laboratorium" placeholder="Masukkan Nama Laboratorium"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required>
                            </div>

                            <div>
                                <label for="lokasi" class="block text-sm font-medium text-gray-700 mb-1">Lantai</label>
                                <select id="lokasi" name="lokasi"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    <option value="Lantai 2">Lantai 2</option>
                                    <option value="Lantai 3">Lantai 3</option>
                                    <option value="Lantai 4">Lantai 4</option>
                                </select>
                            </div>

                            <div>
                                <label for="kapasitas" class="block text-sm font-medium text-gray-700 mb-1">Kapasitas
                                    (orang)</label>
                                <input type="number" id="kapasitas" name="kapasitas" min="1" max="100" placeholder="Masukkan Kapasitas Laboratorium"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required>
                            </div>

                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select id="status" name="status"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent">
                                    <option value="tersedia" selected>Tersedia</option>
                                    <option value="dalam perawatan">Dalam Perawatan</option>
                                    <option value="tidak tersedia">Tidak Tersedia</option>
                                </select>
                            </div>

                            <div>
                                <label for="luas" class="block text-sm font-medium text-gray-700 mb-1">Luas (m²)</label>
                                <input type="number" id="luas" name="luas" min="0" placeholder="Masukkan Luas Laboratorium"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    >
                            </div>

                            <div>
                                <div class="flex justify-between items-center mb-4">
                                    <label class="block text-sm font-medium text-gray-700">Fasilitas</label>
                                    <button type="button" id="tambah-fasilitas" 
                                        class="px-3 py-1 bg-primary text-white text-sm rounded-lg hover:bg-primary-dark transition-colors duration-200">
                                        <i class="fas fa-plus mr-1"></i> Tambah Fasilitas
                                    </button>
                                </div>
                                
                                <div id="fasilitas-container" class="space-y-3">
                                    <div class="fasilitas-item flex space-x-3">
                                        <div class="flex-1">
                                            <select name="barang_id[]" 
                                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent fasilitas-select">
                                                <option value="">Pilih Fasilitas</option>
                                                @foreach($barangList as $barang)
                                                    <option value="{{ $barang->id_barang }}">{{ $barang->nama_barang }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="w-1/4">
                                            <input type="number" name="jumlah[]" min="1"
                                                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                                placeholder="Jumlah" value="1">
                                        </div>
                                        <div class="flex items-center">
                                            <button type="button" class="hapus-fasilitas text-red-500 hover:text-red-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div id="fasilitas-duplicate-error" class="hidden text-red-500 text-sm mt-2">
                                    <i class="fas fa-exclamation-circle mr-1"></i> Terdapat fasilitas yang duplikat. Harap pilih fasilitas yang berbeda.
                                </div>
                            </div>

                            <div>
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                                <textarea id="description" name="deskripsi" rows="4"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"></textarea>
                            </div>

                            <div class="flex justify-end space-x-3 pt-6">
                                <a href="{{ route('laboratorium.index') }}"
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                    Batal
                                </a>
                                <button type="submit"
                                    class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors duration-200">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fasilitasContainer = document.getElementById('fasilitas-container');
            const tambahFasilitasBtn = document.getElementById('tambah-fasilitas');
            const duplicateErrorDiv = document.getElementById('fasilitas-duplicate-error');
            
            // Simpan HTML options dari dropdown pertama untuk digunakan kembali
            const originalSelect = document.querySelector('.fasilitas-select');
            const originalOptions = originalSelect.innerHTML;
        
            // Fungsi untuk membuat dropdown fasilitas baru
            function createFasilitasDropdown() {
                return `<select name="fasilitas_id[]" 
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent fasilitas-select">
                        ${originalOptions}
                    </select>`;
            }
            
            // Fungsi untuk menambah fasilitas baru
            tambahFasilitasBtn.addEventListener('click', function() {
                const fasilitasItem = document.createElement('div');
                fasilitasItem.className = 'fasilitas-item flex space-x-3';
                fasilitasItem.innerHTML = `
                    <div class="flex-1">
                        ${createFasilitasDropdown()}
                    </div>
                    <div class="w-1/4">
                        <input type="number" name="fasilitas_jumlah[]" min="1"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                            placeholder="Jumlah" value="1">
                    </div>
                    <div class="flex items-center">
                        <button type="button" class="hapus-fasilitas text-red-500 hover:text-red-700">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                `;
                
                fasilitasContainer.appendChild(fasilitasItem);
                
                // Tambahkan event listener untuk tombol hapus yang baru
                const hapusBtn = fasilitasItem.querySelector('.hapus-fasilitas');
                hapusBtn.addEventListener('click', function() {
                    // Hanya hapus jika ada lebih dari satu fasilitas
                    if (document.querySelectorAll('.fasilitas-item').length > 1) {
                        fasilitasItem.remove();
                        validateDuplicateFasilitas(); // Validasi ulang setelah menghapus
                    }
                });
                
                // Tambahkan event listener untuk validasi duplikasi
                const selectElement = fasilitasItem.querySelector('.fasilitas-select');
                selectElement.addEventListener('change', validateDuplicateFasilitas);
                
                // Validasi ulang setelah menambah item baru
                validateDuplicateFasilitas();
            });
            
            // Event listener untuk tombol hapus fasilitas yang sudah ada
            document.querySelectorAll('.hapus-fasilitas').forEach(button => {
                button.addEventListener('click', function() {
                    // Hanya hapus jika ada lebih dari satu fasilitas
                    if (document.querySelectorAll('.fasilitas-item').length > 1) {
                        this.closest('.fasilitas-item').remove();
                        validateDuplicateFasilitas(); // Validasi ulang setelah menghapus
                    }
                });
            });
            
            // Fungsi untuk validasi fasilitas duplikat
            function validateDuplicateFasilitas() {
                const selectedValues = [];
                const selects = document.querySelectorAll('.fasilitas-select');
                
                // Kumpulkan semua nilai yang dipilih
                selects.forEach(select => {
                    if (select.value) {
                        selectedValues.push(select.value);
                    }
                });
                
                // Reset semua border ke normal
                selects.forEach(select => {
                    select.classList.remove('border-red-500', 'border-green-500');
                    select.classList.add('border-gray-300');
                });
                
                // Cek duplikasi
                const duplicates = selectedValues.filter((value, index) => selectedValues.indexOf(value) !== index);
                
                if (duplicates.length > 0) {
                    // Tandai yang duplikat dengan border merah
                    selects.forEach(select => {
                        if (duplicates.includes(select.value) && select.value !== '') {
                            select.classList.remove('border-gray-300');
                            select.classList.add('border-red-500');
                        }
                    });
                    
                    // Tampilkan pesan error
                    duplicateErrorDiv.classList.remove('hidden');
                    duplicateErrorDiv.classList.add('block');
                } else {
                    // Tandai yang valid dengan border hijau (opsional)
                    selects.forEach(select => {
                        if (select.value !== '') {
                            select.classList.remove('border-gray-300');
                            select.classList.add('border-green-500');
                        }
                    });
                    
                    // Sembunyikan pesan error
                    duplicateErrorDiv.classList.remove('block');
                    duplicateErrorDiv.classList.add('hidden');
                }
            }
            
            // Tambahkan event listener untuk validasi duplikat pada semua select yang sudah ada
            document.querySelectorAll('.fasilitas-select').forEach(select => {
                select.addEventListener('change', validateDuplicateFasilitas);
            });
            
            // Validasi awal
            validateDuplicateFasilitas();
        });
    </script>
@endsection