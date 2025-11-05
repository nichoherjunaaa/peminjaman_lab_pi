@extends('layouts.app')

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
                            <p class="text-sm font-medium text-gray-500">Upload Dokumen</p>
                            <p class="text-xs text-gray-500">Foto KTM & dokumen</p>
                        </div>
                    </div>

                    <!-- Connector -->
                    <div class="flex-1 h-1 bg-gray-200 mx-4"></div>

                    <!-- Step 4 -->
                    <div class="flex items-center">
                        <div class="step-indicator">4</div>
                        <div class="hidden sm:block">
                            <p class="text-sm font-medium text-gray-500">Konfirmasi</p>
                            <p class="text-xs text-gray-500">Review & submit</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Form Peminjaman -->
            <div class="bg-white p-6 rounded-lg shadow">
                <form id="peminjamanForm" action="{{ route('peminjaman.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <!-- Step 1: Informasi Dasar -->
                    <div class="form-step active" id="step1">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Informasi Dasar Peminjaman</h2>

                        <div class="space-y-4">
                            <!-- Nama Kegiatan -->
                            <div>
                                <label for="namaKegiatan" class="block text-sm font-medium text-gray-700 mb-1">Nama Kegiatan
                                    *</label>
                                <input type="text" id="namaKegiatan" name="nama_kegiatan"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    placeholder="Masukkan nama kegiatan" required>
                                <p class="mt-1 text-xs text-gray-500">Contoh: Praktikum Komputer Dasar, Workshop
                                    Pemrograman, dll.</p>
                            </div>

                            <!-- Laboratorium -->
                            <div>
                                <label for="laboratorium" class="block text-sm font-medium text-gray-700 mb-1">Laboratorium
                                    *</label>
                                <select id="laboratorium" name="id_laboratorium"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required>
                                    <option value="">Pilih Laboratorium</option>
                                    @foreach($laboratorium as $lab)
                                        <option value="{{ $lab->id_laboratorium }}">
                                            {{ $lab->nama_laboratorium }} - {{ $lab->lokasi }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Jenis Kegiatan -->
                            <div>
                                <label for="jenisKegiatan" class="block text-sm font-medium text-gray-700 mb-1">Jenis
                                    Kegiatan *</label>
                                <select id="jenisKegiatan" name="jenis_kegiatan"
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
                                <input type="date" id="tanggalPeminjaman" name="tanggal"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required>
                            </div>

                            <!-- Waktu Mulai -->
                            <div>
                                <label for="waktuMulai" class="block text-sm font-medium text-gray-700 mb-1">Waktu Mulai
                                    *</label>
                                <input type="time" id="waktuMulai" name="jam_mulai"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                    required>
                            </div>

                            <!-- Waktu Selesai -->
                            <div>
                                <label for="waktuSelesai" class="block text-sm font-medium text-gray-700 mb-1">Waktu Selesai
                                    *</label>
                                <input type="time" id="waktuSelesai" name="jam_selesai"
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

                    <!-- Step 3: Upload Dokumen -->
                    <div class="form-step" id="step3">
                        <h2 class="text-lg font-semibold text-gray-900 mb-4">Upload Dokumen Pendukung</h2>

                        <div class="space-y-6">
                            <!-- Upload Foto KTM -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Foto Kartu Tanda Mahasiswa (KTM)
                                    *</label>

                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-primary transition-colors duration-200"
                                    id="ktmUploadArea">
                                    <div id="ktmUploadContent">
                                        <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-3"></i>
                                        <p class="text-sm text-gray-600 mb-1">Upload foto KTM Anda</p>
                                        <p class="text-xs text-gray-500">Format: JPG, PNG (Maks. 2MB)</p>
                                        <button type="button"
                                            class="mt-3 px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors duration-200"
                                            onclick="document.getElementById('fotoKTM').click()">
                                            Pilih File
                                        </button>
                                    </div>
                                    <div id="ktmPreview" class="hidden">
                                        <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg">
                                            <div class="flex items-center">
                                                <i class="fas fa-file-image text-primary text-lg mr-3"></i>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900" id="ktmFileName">ktm.jpg
                                                    </p>
                                                    <p class="text-xs text-gray-500" id="ktmFileSize">1.2 MB</p>
                                                </div>
                                            </div>
                                            <button type="button" class="text-red-500 hover:text-red-700"
                                                onclick="removeKTM()">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <div class="mt-3 flex justify-center">
                                            <img id="ktmImagePreview" class="max-h-40 rounded-lg border border-gray-200"
                                                src="" alt="Preview KTM">
                                        </div>
                                    </div>
                                </div>

                                <input type="file" id="fotoKTM" name="foto_ktm" class="hidden" accept="image/jpeg,image/png"
                                    required>
                                <p class="mt-2 text-xs text-gray-500">Pastikan foto KTM terlihat jelas dan terbaca dengan
                                    baik</p>
                            </div>

                            <!-- Upload Surat Tugas (Opsional) -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Surat Tugas (Opsional)</label>

                                <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center hover:border-primary transition-colors duration-200"
                                    id="suratUploadArea">
                                    <div id="suratUploadContent">
                                        <i class="fas fa-cloud-upload-alt text-gray-400 text-3xl mb-3"></i>
                                        <p class="text-sm text-gray-600 mb-1">Upload surat tugas (jika ada)</p>
                                        <p class="text-xs text-gray-500">Format: PDF, JPG, PNG (Maks. 5MB)</p>
                                        <button type="button"
                                            class="mt-3 px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition-colors duration-200"
                                            onclick="document.getElementById('suratTugas').click()">
                                            Pilih File
                                        </button>
                                    </div>
                                    <div id="suratPreview" class="hidden">
                                        <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg">
                                            <div class="flex items-center">
                                                <i class="fas fa-file-pdf text-red-500 text-lg mr-3"></i>
                                                <div>
                                                    <p class="text-sm font-medium text-gray-900" id="suratFileName">
                                                        surat.pdf</p>
                                                    <p class="text-xs text-gray-500" id="suratFileSize">2.1 MB</p>
                                                </div>
                                            </div>
                                            <button type="button" class="text-red-500 hover:text-red-700"
                                                onclick="removeSurat()">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <input type="file" id="suratTugas" name="surat_tugas" class="hidden"
                                    accept=".pdf,image/jpeg,image/png">
                                <p class="mt-2 text-xs text-gray-500">Surat tugas dari departemen atau dosen pembimbing</p>
                            </div>

                            <!-- Informasi Upload -->
                            <div class="bg-blue-50 p-4 rounded-lg border border-blue-200">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-info-circle text-blue-500 text-lg"></i>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-blue-800">Penting!</h3>
                                        <div class="mt-1 text-sm text-blue-700">
                                            <ul class="list-disc list-inside space-y-1">
                                                <li>Foto KTM wajib diupload untuk verifikasi identitas</li>
                                                <li>Pastikan foto KTM tidak blur dan semua informasi terbaca jelas</li>
                                                <li>File yang diupload maksimal 2MB untuk foto dan 5MB untuk dokumen</li>
                                                <li>Format yang didukung: JPG, PNG, PDF</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="flex justify-between mt-6">
                            <button type="button"
                                class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200"
                                onclick="prevStep(2)">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali
                            </button>
                            <button type="button"
                                class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors duration-200"
                                onclick="nextStep(4)">
                                Selanjutnya <i class="fas fa-arrow-right ml-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 4: Konfirmasi -->
                    <div class="form-step" id="step4">
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

                            <!-- Dokumen yang diupload -->
                            <div class="mt-4 pt-4 border-t border-gray-200">
                                <p class="text-sm font-medium text-gray-700 mb-2">Dokumen Pendukung:</p>
                                <div class="flex items-center space-x-2">
                                    <i class="fas fa-file-image text-primary"></i>
                                    <span class="text-sm text-gray-900" id="summaryKTM">Foto KTM</span>
                                    <span class="text-xs text-green-600 bg-green-100 px-2 py-1 rounded-full">✓
                                        Terupload</span>
                                </div>
                                <div class="flex items-center space-x-2 mt-2" id="summarySuratContainer">
                                    <i class="fas fa-file-pdf text-red-500"></i>
                                    <span class="text-sm text-gray-900" id="summarySurat">Surat Tugas</span>
                                    <span class="text-xs text-green-600 bg-green-100 px-2 py-1 rounded-full">✓
                                        Terupload</span>
                                </div>
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
                                onclick="prevStep(3)">
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

    <style>
        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        .step-indicator {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            border: 2px solid #E5E7EB;
            background-color: white;
            color: #9CA3AF;
        }

        .step-indicator.active {
            background-color: #800000;
            border-color: #800000;
            color: white;
        }

        #ktmUploadArea,
        #suratUploadArea {
            transition: all 0.3s ease;
        }

        #ktmUploadArea.dragover,
        #suratUploadArea.dragover {
            border-color: #800000;
            background-color: #FEF2F2;
        }
    </style>
    <script src="js/submission.js"></script>
@endsection