@include('layouts.app')

@section('title', 'Peminjaman - Sistem Peminjaman Laboratorium')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Ajukan Peminjaman Laboratorium</h1>
                <p class="mt-2 text-gray-600">Isi formulir di bawah ini untuk mengajukan peminjaman laboratorium</p>
            </div>

            <!-- Progress Steps -->
            <div class="bg-white p-6 rounded-lg shadow mb-6">
                <div class="flex items-center justify-between">
                    <!-- Step 1 -->
                    <div class="flex items-center">
                        <div class="step-indicator active">1</div>
                        <div class="hidden sm:block">
                            <p class="text-sm font-medium text-gray-900">Informasi Dasar</p>
                            <p class="text-xs text-gray-500">Data kegiatan & laboratorium</p>
                        </div>
                    </div>

                    <!-- Connector -->
                    <div class="flex-1 h-1 bg-gray-200 mx-4"></div>

                    <!-- Step 2 -->
                    <div class="flex items-center">
                        <div class="step-indicator">2</div>
                        <div class="hidden sm:block">
                            <p class="text-sm font-medium text-gray-500">Detail Waktu</p>
                            <p class="text-xs text-gray-500">Jadwal & durasi</p>
                        </div>
                    </div>

                    <!-- Connector -->
                    <div class="flex-1 h-1 bg-gray-200 mx-4"></div>

                    <!-- Step 3 -->
                    <div class="flex items-center">
                        <div class="step-indicator">3</div>
                        <div class="hidden sm:block">
                            <p class="text-sm font-medium text-gray-500">Konfirmasi</p>
                            <p class="text-xs text-gray-500">Review & submit</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Peminjaman -->
            <div class="bg-white p-6 rounded-lg shadow">
                <form id="peminjamanForm">
                    <!-- Step 1: Informasi Dasar -->
                    <div class="form-step active" id="step1">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Dasar Peminjaman</h2>

                        <div class="space-y-4">
                            <!-- Nama Kegiatan -->
                            <div>
                                <label for="namaKegiatan" class="block text-sm font-medium text-gray-700 mb-1">Nama Kegiatan
                                    *</label>
                                <input type="text" id="namaKegiatan" name="namaKegiatan"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    placeholder="Masukkan nama kegiatan" required>
                                <p class="mt-1 text-xs text-gray-500">Contoh: Praktikum Komputer Dasar, Workshop
                                    Pemrograman, dll.</p>
                            </div>

                            <!-- Laboratorium -->
                            <div>
                                <label for="laboratorium" class="block text-sm font-medium text-gray-700 mb-1">Laboratorium
                                    *</label>
                                <select id="laboratorium" name="laboratorium"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required>
                                    <option value="">Pilih Laboratorium</option>
                                    <option value="lab-komputer-1">Lab. Komputer 1 - Gedung B Lt. 1</option>
                                    <option value="lab-komputer-2">Lab. Komputer 2 - Gedung B Lt. 1</option>
                                    <option value="lab-kimia">Lab. Kimia - Gedung A Lt. 2</option>
                                    <option value="lab-biologi">Lab. Biologi - Gedung C Lt. 3</option>
                                    <option value="lab-fisika">Lab. Fisika - Gedung D Lt. 2</option>
                                    <option value="lab-multimedia">Lab. Multimedia - Gedung E Lt. 1</option>
                                </select>
                            </div>

                            <!-- Jenis Kegiatan -->
                            <div>
                                <label for="jenisKegiatan" class="block text-sm font-medium text-gray-700 mb-1">Jenis
                                    Kegiatan *</label>
                                <select id="jenisKegiatan" name="jenisKegiatan"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required>
                                    <option value="">Pilih Jenis Kegiatan</option>
                                    <option value="praktikum">Praktikum</option>
                                    <option value="penelitian">Penelitian</option>
                                    <option value="workshop">Workshop/Seminar</option>
                                    <option value="ujian">Ujian</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                            </div>

                            <!-- Jumlah Peserta -->
                            <div>
                                <label for="jumlahPeserta" class="block text-sm font-medium text-gray-700 mb-1">Jumlah
                                    Peserta *</label>
                                <input type="number" id="jumlahPeserta" name="jumlahPeserta" min="1" max="50"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    placeholder="Masukkan jumlah peserta" required>
                            </div>

                            <!-- Keperluan -->
                            <div>
                                <label for="keperluan" class="block text-sm font-medium text-gray-700 mb-1">Keperluan
                                    *</label>
                                <textarea id="keperluan" name="keperluan" rows="3"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    placeholder="Jelaskan keperluan peminjaman laboratorium" required></textarea>
                            </div>
                        </div>

                        <div class="flex justify-end mt-6">
                            <button type="button"
                                class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors duration-200"
                                onclick="nextStep(2)">
                                Selanjutnya <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Detail Waktu -->
                    <div class="form-step" id="step2">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Detail Waktu Peminjaman</h2>

                        <div class="space-y-4">
                            <!-- Tanggal Peminjaman -->
                            <div>
                                <label for="tanggalPeminjaman" class="block text-sm font-medium text-gray-700 mb-1">Tanggal
                                    Peminjaman *</label>
                                <input type="date" id="tanggalPeminjaman" name="tanggalPeminjaman"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required>
                            </div>

                            <!-- Waktu Mulai -->
                            <div>
                                <label for="waktuMulai" class="block text-sm font-medium text-gray-700 mb-1">Waktu Mulai
                                    *</label>
                                <input type="time" id="waktuMulai" name="waktuMulai"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required>
                            </div>

                            <!-- Waktu Selesai -->
                            <div>
                                <label for="waktuSelesai" class="block text-sm font-medium text-gray-700 mb-1">Waktu Selesai
                                    *</label>
                                <input type="time" id="waktuSelesai" name="waktuSelesai"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required>
                            </div>

                            <!-- Pengulangan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pengulangan</label>
                                <div class="space-y-2">
                                    <div class="flex items-center">
                                        <input type="radio" id="tidakBerulang" name="pengulangan" value="tidak"
                                            class="focus:ring-primary text-primary" checked>
                                        <label for="tidakBerulang" class="ml-2 text-sm text-gray-700">Tidak Berulang
                                            (Sekali)</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" id="mingguan" name="pengulangan" value="mingguan"
                                            class="focus:ring-primary text-primary">
                                        <label for="mingguan" class="ml-2 text-sm text-gray-700">Mingguan</label>
                                    </div>
                                    <div class="flex items-center">
                                        <input type="radio" id="bulanan" name="pengulangan" value="bulanan"
                                            class="focus:ring-primary text-primary">
                                        <label for="bulanan" class="ml-2 text-sm text-gray-700">Bulanan</label>
                                    </div>
                                </div>
                            </div>

                            <!-- Durasi Pengulangan -->
                            <div id="durasiPengulangan" class="hidden">
                                <label for="jumlahPengulangan" class="block text-sm font-medium text-gray-700 mb-1">Jumlah
                                    Pengulangan</label>
                                <input type="number" id="jumlahPengulangan" name="jumlahPengulangan" min="1" max="12"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    placeholder="Masukkan jumlah pengulangan">
                                <p class="mt-1 text-xs text-gray-500">Maksimal 12 kali pengulangan</p>
                            </div>
                        </div>

                        <div class="flex justify-between mt-6">
                            <button type="button"
                                class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200"
                                onclick="prevStep(1)">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali
                            </button>
                            <button type="button"
                                class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors duration-200"
                                onclick="nextStep(3)">
                                Selanjutnya <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Konfirmasi -->
                    <div class="form-step" id="step3">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Konfirmasi Peminjaman</h2>

                        <div class="bg-gray-50 p-4 rounded-lg mb-6">
                            <h3 class="font-medium text-gray-900 mb-3">Ringkasan Peminjaman</h3>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <!-- Informasi Kegiatan -->
                                <div class="space-y-2">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Nama Kegiatan:</p>
                                        <p id="summaryNamaKegiatan" class="text-sm text-gray-900">-</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Laboratorium:</p>
                                        <p id="summaryLaboratorium" class="text-sm text-gray-900">-</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Jenis Kegiatan:</p>
                                        <p id="summaryJenisKegiatan" class="text-sm text-gray-900">-</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Jumlah Peserta:</p>
                                        <p id="summaryJumlahPeserta" class="text-sm text-gray-900">-</p>
                                    </div>
                                </div>

                                <!-- Informasi Waktu -->
                                <div class="space-y-2">
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Tanggal:</p>
                                        <p id="summaryTanggal" class="text-sm text-gray-900">-</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Waktu:</p>
                                        <p id="summaryWaktu" class="text-sm text-gray-900">-</p>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-gray-700">Pengulangan:</p>
                                        <p id="summaryPengulangan" class="text-sm text-gray-900">-</p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <p class="text-sm font-medium text-gray-700">Keperluan:</p>
                                <p id="summaryKeperluan" class="text-sm text-gray-900">-</p>
                            </div>
                        </div>

                        <!-- Persetujuan -->
                        <div class="mb-6">
                            <div class="flex items-start">
                                <input type="checkbox" id="persetujuan" name="persetujuan"
                                    class="mt-1 focus:ring-primary text-primary" required>
                                <label for="persetujuan" class="ml-2 text-sm text-gray-700">
                                    Saya menyatakan bahwa informasi yang saya berikan adalah benar dan saya akan bertanggung
                                    jawab penuh atas penggunaan laboratorium sesuai dengan peraturan yang berlaku.
                                </label>
                            </div>
                        </div>

                        <div class="flex justify-between">
                            <button type="button"
                                class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200"
                                onclick="prevStep(2)">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors duration-200 flex items-center">
                                <i class="fas fa-paper-plane mr-2"></i> Ajukan Peminjaman
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Informasi Tambahan -->
            <div class="mt-6 bg-blue-50 p-4 rounded-lg border border-blue-200">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <i class="fas fa-info-circle text-blue-500 text-lg"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">Informasi Penting</h3>
                        <div class="mt-2 text-sm text-blue-700">
                            <ul class="list-disc list-inside space-y-1">
                                <li>Pastikan untuk mengajukan peminjaman minimal 3 hari sebelum tanggal yang diinginkan</li>
                                <li>Status pengajuan akan dikirimkan melalui email dalam waktu 1-2 hari kerja</li>
                                <li>Peminjaman dapat dibatalkan maksimal 24 jam sebelum waktu peminjaman</li>
                                <li>Hubungi admin laboratorium untuk pertanyaan lebih lanjut</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Step Navigation
        function nextStep(step) {
            // Validate current step before proceeding
            if (step === 2 && !validateStep1()) {
                return;
            }
            if (step === 3 && !validateStep2()) {
                return;
            }
            
            // Hide all steps
            document.querySelectorAll('.form-step').forEach(stepEl => {
                stepEl.classList.remove('active');
            });
            
            // Show target step
            document.getElementById(`step${step}`).classList.add('active');
            
            // Update progress indicators
            updateProgressIndicators(step);
            
            // Update summary if going to step 3
            if (step === 3) {
                updateSummary();
            }
        }
        
        function prevStep(step) {
            // Hide all steps
            document.querySelectorAll('.form-step').forEach(stepEl => {
                stepEl.classList.remove('active');
            });
            
            // Show target step
            document.getElementById(`step${step}`).classList.add('active');
            
            // Update progress indicators
            updateProgressIndicators(step);
        }
        
        function updateProgressIndicators(currentStep) {
            const indicators = document.querySelectorAll('.step-indicator');
            
            indicators.forEach((indicator, index) => {
                const stepNumber = index + 1;
                
                // Reset classes
                indicator.classList.remove('active', 'completed');
                
                if (stepNumber === currentStep) {
                    indicator.classList.add('active');
                } else if (stepNumber < currentStep) {
                    indicator.classList.add('completed');
                    indicator.innerHTML = '<i class="fas fa-check text-xs"></i>';
                }
            });
        }
        
        // Form Validation
        function validateStep1() {
            const namaKegiatan = document.getElementById('namaKegiatan').value;
            const laboratorium = document.getElementById('laboratorium').value;
            const jenisKegiatan = document.getElementById('jenisKegiatan').value;
            const jumlahPeserta = document.getElementById('jumlahPeserta').value;
            const keperluan = document.getElementById('keperluan').value;
            
            if (!namaKegiatan || !laboratorium || !jenisKegiatan || !jumlahPeserta || !keperluan) {
                alert('Harap lengkapi semua field yang wajib diisi.');
                return false;
            }
            
            return true;
        }
        
        function validateStep2() {
            const tanggalPeminjaman = document.getElementById('tanggalPeminjaman').value;
            const waktuMulai = document.getElementById('waktuMulai').value;
            const waktuSelesai = document.getElementById('waktuSelesai').value;
            
            if (!tanggalPeminjaman || !waktuMulai || !waktuSelesai) {
                alert('Harap lengkapi semua field yang wajib diisi.');
                return false;
            }
            
            // Validate time logic
            if (waktuMulai >= waktuSelesai) {
                alert('Waktu selesai harus setelah waktu mulai.');
                return false;
            }
            
            return true;
        }
        
        // Update Summary
        function updateSummary() {
            // Get form values
            const namaKegiatan = document.getElementById('namaKegiatan').value;
            const laboratorium = document.getElementById('laboratorium');
            const laboratoriumText = laboratorium.options[laboratorium.selectedIndex].text;
            const jenisKegiatan = document.getElementById('jenisKegiatan');
            const jenisKegiatanText = jenisKegiatan.options[jenisKegiatan.selectedIndex].text;
            const jumlahPeserta = document.getElementById('jumlahPeserta').value;
            const keperluan = document.getElementById('keperluan').value;
            const tanggalPeminjaman = document.getElementById('tanggalPeminjaman').value;
            const waktuMulai = document.getElementById('waktuMulai').value;
            const waktuSelesai = document.getElementById('waktuSelesai').value;
            
            // Format date
            const dateObj = new Date(tanggalPeminjaman);
            const options = { day: 'numeric', month: 'long', year: 'numeric' };
            const formattedDate = dateObj.toLocaleDateString('id-ID', options);
            
            // Get repetition info
            const pengulangan = document.querySelector('input[name="pengulangan"]:checked').value;
            let pengulanganText = "Tidak Berulang";
            if (pengulangan === 'mingguan') {
                pengulanganText = "Mingguan";
            } else if (pengulangan === 'bulanan') {
                pengulanganText = "Bulanan";
            }
            
            // Update summary elements
            document.getElementById('summaryNamaKegiatan').textContent = namaKegiatan;
            document.getElementById('summaryLaboratorium').textContent = laboratoriumText;
            document.getElementById('summaryJenisKegiatan').textContent = jenisKegiatanText;
            document.getElementById('summaryJumlahPeserta').textContent = `${jumlahPeserta} orang`;
            document.getElementById('summaryKeperluan').textContent = keperluan;
            document.getElementById('summaryTanggal').textContent = formattedDate;
            document.getElementById('summaryWaktu').textContent = `${waktuMulai} - ${waktuSelesai}`;
            document.getElementById('summaryPengulangan').textContent = pengulanganText;
        }
        
        // Toggle repetition duration field
        document.addEventListener('DOMContentLoaded', function() {
            const repetitionRadios = document.querySelectorAll('input[name="pengulangan"]');
            const durationField = document.getElementById('durasiPengulangan');
            
            repetitionRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'tidak') {
                        durationField.classList.add('hidden');
                    } else {
                        durationField.classList.remove('hidden');
                    }
                });
            });
            
            // Form submission
            document.getElementById('peminjamanForm').addEventListener('submit', function(e) {
                e.preventDefault();
                
                // Validate step 3
                const persetujuan = document.getElementById('persetujuan').checked;
                if (!persetujuan) {
                    alert('Anda harus menyetujui pernyataan sebelum mengajukan peminjaman.');
                    return;
                }
                
                // Show success modal
                document.getElementById('successModal').classList.remove('hidden');
            });
            
            // Close success modal
            document.getElementById('closeSuccessModal').addEventListener('click', function() {
                document.getElementById('successModal').classList.add('hidden');
                // Reset form
                document.getElementById('peminjamanForm').reset();
                // Go back to step 1
                prevStep(1);
            });
            
            // Set minimum date to today
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('tanggalPeminjaman').min = today;
        });
    </script>
@endsection