<script>
document.addEventListener('DOMContentLoaded', function () {

    // ----------------------------
    // STEP NAVIGATION
    // ----------------------------
    function showStep(step) {
        document.querySelectorAll('.form-step').forEach(el => el.classList.remove('active'));
        document.getElementById(`step${step}`).classList.add('active');
        updateProgressIndicators(step);
        if(step === 3) updateSummary();
    }

    window.nextStep = function(step) {
        if(step === 2 && !validateStep1()) return;
        if(step === 3 && !validateStep2()) return;
        showStep(step);
    }

    window.prevStep = function(step) {
        showStep(step);
    }

    function updateProgressIndicators(currentStep) {
        const indicators = document.querySelectorAll('.step-indicator');
        indicators.forEach((indicator, index) => {
            const stepNumber = index + 1;
            indicator.classList.remove('active', 'completed');
            if(stepNumber < currentStep) {
                indicator.classList.add('completed');
                indicator.innerHTML = '<i class="fas fa-check text-xs"></i>';
            } else if(stepNumber === currentStep) {
                indicator.classList.add('active');
                indicator.innerHTML = stepNumber;
            } else {
                indicator.innerHTML = stepNumber;
            }
        });
    }

    // ----------------------------
    // VALIDATION
    // ----------------------------
    function validateStep1() {
        const nama = document.getElementById('namaKegiatan').value.trim();
        const lab = document.getElementById('laboratorium').value;
        const jenis = document.getElementById('jenisKegiatan').value;
        const peserta = document.getElementById('jumlahPeserta').value;

        if(peserta < 1) {
            alert('Jumlah peserta minimal 1 orang.');
            return false;
        }
        return true;
    }

    function validateStep2() {
        const tanggal = document.getElementById('tanggalPeminjaman').value;
        const mulai = document.getElementById('waktuMulai').value;
        const selesai = document.getElementById('waktuSelesai').value;

        if(!tanggal || !mulai || !selesai) {
            alert('Harap lengkapi semua field wajib diisi (Tanggal, Waktu Mulai, Waktu Selesai).');
            return false;
        }

        if(mulai >= selesai) {
            alert('Waktu selesai harus setelah waktu mulai.');
            return false;
        }

        const pengulangan = document.querySelector('input[name="pengulangan"]:checked').value;
        if(pengulangan !== 'tidak') {
            const jumlah = document.getElementById('jumlahPengulangan').value;
            if(!jumlah || jumlah < 1 || jumlah > 12) {
                alert('Masukkan jumlah pengulangan valid (1-12).');
                return false;
            }
        }

        return true;
    }

    // ----------------------------
    // UPDATE SUMMARY STEP 3
    // ----------------------------
    function updateSummary() {
        const nama = document.getElementById('namaKegiatan').value;
        const labSelect = document.getElementById('laboratorium');
        const labText = labSelect.options[labSelect.selectedIndex].text;
        const jenisSelect = document.getElementById('jenisKegiatan');
        const jenisText = jenisSelect.options[jenisSelect.selectedIndex].text;
        const peserta = document.getElementById('jumlahPeserta').value;
        const keperluan = document.getElementById('keperluan').value || '-';
        const tanggal = document.getElementById('tanggalPeminjaman').value;
        const mulai = document.getElementById('waktuMulai').value;
        const selesai = document.getElementById('waktuSelesai').value;

        const dateObj = new Date(tanggal);
        const options = { day: 'numeric', month: 'long', year: 'numeric' };
        const formattedDate = isNaN(dateObj) ? '-' : dateObj.toLocaleDateString('id-ID', options);

        const pengulangan = document.querySelector('input[name="pengulangan"]:checked').value;
        let pengulanganText = "Tidak Berulang";
        if(pengulangan === 'mingguan') pengulanganText = "Mingguan";
        else if(pengulangan === 'bulanan') pengulanganText = "Bulanan";

        document.getElementById('summaryNamaKegiatan').textContent = nama;
        document.getElementById('summaryLaboratorium').textContent = labText;
        document.getElementById('summaryJenisKegiatan').textContent = jenisText;
        document.getElementById('summaryJumlahPeserta').textContent = peserta + ' orang';
        document.getElementById('summaryKeperluan').textContent = keperluan;
        document.getElementById('summaryTanggal').textContent = formattedDate;
        document.getElementById('summaryWaktu').textContent = `${mulai} - ${selesai}`;
        document.getElementById('summaryPengulangan').textContent = pengulanganText;
    }

    // ----------------------------
    // TOGGLE PENGULANGAN
    // ----------------------------
    document.querySelectorAll('input[name="pengulangan"]').forEach(radio => {
        radio.addEventListener('change', function(){
            const durasi = document.getElementById('durasiPengulangan');
            if(this.value === 'tidak') durasi.classList.add('hidden');
            else durasi.classList.remove('hidden');
        });
    });

    // ----------------------------
    // FORM SUBMIT
    // ----------------------------
    document.getElementById('peminjamanForm').addEventListener('submit', function(e){
        e.preventDefault();
        if(!document.getElementById('persetujuan').checked){
            alert('Anda harus menyetujui pernyataan sebelum mengajukan peminjaman.');
            return;
        }
        alert('Peminjaman berhasil diajukan!');
        this.reset();
        prevStep(1);
    });

    // ----------------------------
    // MIN DATE TODAY
    // ----------------------------
    const today = new Date().toISOString().split('T')[0];
    const tanggalInput = document.getElementById('tanggalPeminjaman');
    if(tanggalInput) tanggalInput.min = today;

});
</script>
