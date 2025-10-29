// Fungsi navigasi step
function nextStep(step) {
    // Validasi step saat ini sebelum lanjut
    if (step === 2 && !validateStep1()) return;
    if (step === 3 && !validateStep2()) return;
    if (step === 4 && !validateStep3()) return;

    document.querySelectorAll('.form-step').forEach(el => el.classList.remove('active'));
    document.getElementById('step' + step).classList.add('active');

    // Update progress indicator
    document.querySelectorAll('.step-indicator').forEach((el, index) => {
        if (index < step) {
            el.classList.add('active');
        } else {
            el.classList.remove('active');
        }
    });

    // Update summary jika menuju step konfirmasi
    if (step === 4) {
        updateSummary();
    }
}

function prevStep(step) {
    document.querySelectorAll('.form-step').forEach(el => el.classList.remove('active'));
    document.getElementById('step' + step).classList.add('active');

    // Update progress indicator
    document.querySelectorAll('.step-indicator').forEach((el, index) => {
        if (index < step) {
            el.classList.add('active');
        } else {
            el.classList.remove('active');
        }
    });
}

// Validasi step
function validateStep1() {
    const namaKegiatan = document.getElementById('namaKegiatan').value;
    const laboratorium = document.getElementById('laboratorium').value;
    const jenisKegiatan = document.getElementById('jenisKegiatan').value;
    const jumlahPeserta = document.getElementById('jumlahPeserta').value;
    const keperluan = document.getElementById('keperluan').value;

    if (!namaKegiatan || !laboratorium || !jenisKegiatan || !jumlahPeserta || !keperluan) {
        alert('Harap lengkapi semua field yang wajib diisi');
        return false;
    }
    return true;
}

function validateStep2() {
    const tanggal = document.getElementById('tanggalPeminjaman').value;
    const waktuMulai = document.getElementById('waktuMulai').value;
    const waktuSelesai = document.getElementById('waktuSelesai').value;

    if (!tanggal || !waktuMulai || !waktuSelesai) {
        alert('Harap lengkapi semua field tanggal dan waktu');
        return false;
    }

    if (waktuMulai >= waktuSelesai) {
        alert('Waktu selesai harus setelah waktu mulai');
        return false;
    }
    return true;
}

function validateStep3() {
    const ktmFile = document.getElementById('fotoKTM').files[0];
    if (!ktmFile) {
        alert('Harap upload foto KTM Anda');
        return false;
    }

    // Validasi ukuran file (max 2MB)
    if (ktmFile.size > 2 * 1024 * 1024) {
        alert('Ukuran file KTM maksimal 2MB');
        return false;
    }

    // Validasi tipe file
    const allowedTypes = ['image/jpeg', 'image/png'];
    if (!allowedTypes.includes(ktmFile.type)) {
        alert('Format file KTM harus JPG atau PNG');
        return false;
    }

    return true;
}

// Fungsi untuk upload KTM
document.getElementById('fotoKTM').addEventListener('change', function (e) {
    handleFileUpload(e.target.files[0], 'ktm');
});

// Fungsi untuk upload surat tugas
document.getElementById('suratTugas').addEventListener('change', function (e) {
    handleFileUpload(e.target.files[0], 'surat');
});

function handleFileUpload(file, type) {
    if (!file) return;

    const uploadArea = document.getElementById(type + 'UploadArea');
    const uploadContent = document.getElementById(type + 'UploadContent');
    const preview = document.getElementById(type + 'Preview');
    const fileName = document.getElementById(type + 'FileName');
    const fileSize = document.getElementById(type + 'FileSize');

    // Validasi ukuran file
    let maxSize = type === 'ktm' ? 2 : 5; // MB
    if (file.size > maxSize * 1024 * 1024) {
        alert(`Ukuran file ${type === 'ktm' ? 'KTM' : 'surat tugas'} maksimal ${maxSize}MB`);
        return;
    }

    // Validasi tipe file
    let allowedTypes = type === 'ktm' ? ['image/jpeg', 'image/png'] : ['image/jpeg', 'image/png', 'application/pdf'];
    if (!allowedTypes.includes(file.type)) {
        alert(`Format file ${type === 'ktm' ? 'KTM' : 'surat tugas'} tidak didukung`);
        return;
    }

    // Update preview
    fileName.textContent = file.name;
    fileSize.textContent = formatFileSize(file.size);

    // Tampilkan preview gambar untuk KTM
    if (type === 'ktm' && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function (e) {
            document.getElementById('ktmImagePreview').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }

    // Tampilkan preview
    uploadContent.classList.add('hidden');
    preview.classList.remove('hidden');
}

function removeKTM() {
    document.getElementById('fotoKTM').value = '';
    document.getElementById('ktmUploadContent').classList.remove('hidden');
    document.getElementById('ktmPreview').classList.add('hidden');
}

function removeSurat() {
    document.getElementById('suratTugas').value = '';
    document.getElementById('suratUploadContent').classList.remove('hidden');
    document.getElementById('suratPreview').classList.add('hidden');
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB', 'GB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
}

// Update summary untuk step konfirmasi
function updateSummary() {
    document.getElementById('summaryNamaKegiatan').textContent = document.getElementById('namaKegiatan').value;
    document.getElementById('summaryLaboratorium').textContent = document.getElementById('laboratorium').options[document.getElementById('laboratorium').selectedIndex].text;
    document.getElementById('summaryJenisKegiatan').textContent = document.getElementById('jenisKegiatan').options[document.getElementById('jenisKegiatan').selectedIndex].text;
    document.getElementById('summaryJumlahPeserta').textContent = document.getElementById('jumlahPeserta').value + ' orang';
    document.getElementById('summaryTanggal').textContent = formatDate(document.getElementById('tanggalPeminjaman').value);
    document.getElementById('summaryWaktu').textContent = document.getElementById('waktuMulai').value + ' - ' + document.getElementById('waktuSelesai').value;

    const pengulangan = document.querySelector('input[name="pengulangan"]:checked').value;
    let pengulanganText = 'Tidak Berulang';
    if (pengulangan === 'mingguan') pengulanganText = 'Mingguan';
    if (pengulangan === 'bulanan') pengulanganText = 'Bulanan';
    document.getElementById('summaryPengulangan').textContent = pengulanganText;

    document.getElementById('summaryKeperluan').textContent = document.getElementById('keperluan').value;

    // Update info dokumen
    const ktmFile = document.getElementById('fotoKTM').files[0];
    if (ktmFile) {
        document.getElementById('summaryKTM').textContent = ktmFile.name;
    }

    const suratFile = document.getElementById('suratTugas').files[0];
    if (suratFile) {
        document.getElementById('summarySurat').textContent = suratFile.name;
        document.getElementById('summarySuratContainer').classList.remove('hidden');
    } else {
        document.getElementById('summarySuratContainer').classList.add('hidden');
    }
}

function formatDate(dateString) {
    const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const date = new Date(dateString);
    return date.toLocaleDateString('id-ID', options);
}

// Handle pengulangan
document.querySelectorAll('input[name="pengulangan"]').forEach(radio => {
    radio.addEventListener('change', function () {
        const durasiPengulangan = document.getElementById('durasiPengulangan');
        if (this.value !== 'tidak') {
            durasiPengulangan.classList.remove('hidden');
        } else {
            durasiPengulangan.classList.add('hidden');
        }
    });
});

// Drag and drop functionality
['ktmUploadArea', 'suratUploadArea'].forEach(areaId => {
    const area = document.getElementById(areaId);
    const inputId = areaId === 'ktmUploadArea' ? 'fotoKTM' : 'suratTugas';
    const type = areaId === 'ktmUploadArea' ? 'ktm' : 'surat';

    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        area.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    ['dragenter', 'dragover'].forEach(eventName => {
        area.addEventListener(eventName, highlight, false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        area.addEventListener(eventName, unhighlight, false);
    });

    function highlight() {
        area.classList.add('dragover');
    }

    function unhighlight() {
        area.classList.remove('dragover');
    }

    area.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        document.getElementById(inputId).files = files;
        handleFileUpload(files[0], type);
    }
});