@extends('layouts.app')

@section('title', 'Kebijakan Privasi - Sistem Peminjaman Laboratorium')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <!-- Header -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold font-segoe text-gray-900">Kebijakan Privasi</h1>
            <p class="mt-2 text-gray-600">Terakhir diperbarui: {{ date('d M Y') }}</p>
        </div>

        <!-- Content -->
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-6 py-8">
                <!-- Introduction -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">1. Pengantar</h2>
                    <p class="text-gray-600 mb-4">
                        Sistem Peminjaman Laboratorium Universitas Sanata Dharma menghargai dan melindungi privasi pengguna.
                        Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi
                        pribadi Anda ketika menggunakan sistem ini.
                    </p>
                </div>

                <!-- Information Collection -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">2. Informasi yang Kami Kumpulkan</h2>
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-medium text-gray-800 mb-2">2.1 Informasi Pribadi</h3>
                            <ul class="list-disc list-inside text-gray-600 space-y-1">
                                <li>Nama lengkap dan informasi kontak</li>
                                <li>Nomor identitas mahasiswa/dosen</li>
                                <li>Program studi dan fakultas</li>
                                <li>Alamat email institusional</li>
                                <li>Informasi keanggotaan dan peran</li>
                            </ul>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-medium text-gray-800 mb-2">2.2 Informasi Peminjaman</h3>
                            <ul class="list-disc list-inside text-gray-600 space-y-1">
                                <li>Riwayat peminjaman laboratorium</li>
                                <li>Jadwal dan waktu peminjaman</li>
                                <li>Keperluan peminjaman</li>
                                <li>Status persetujuan peminjaman</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Data Usage -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">3. Penggunaan Informasi</h2>
                    <p class="text-gray-600 mb-4">
                        Informasi yang kami kumpulkan digunakan untuk:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>Memproses dan mengelola peminjaman laboratorium</li>
                        <li>Memverifikasi identitas dan keanggotaan pengguna</li>
                        <li>Mengirim notifikasi terkait peminjaman</li>
                        <li>Meningkatkan kualitas layanan sistem</li>
                        <li>Memenuhi kewajiban administratif universitas</li>
                        <li>Analisis statistik untuk pengembangan fasilitas</li>
                    </ul>
                </div>

                <!-- Data Protection -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">4. Perlindungan Data</h2>
                    <div class="space-y-4">
                        <p class="text-gray-600">
                            Kami menerapkan langkah-langkah keamanan yang tepat untuk melindungi informasi pribadi Anda:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 space-y-2">
                            <li>Enkripsi data sensitif</li>
                            <li>Autentikasi pengguna yang ketat</li>
                            <li>Pembatasan akses berdasarkan peran</li>
                            <li>Pemantauan keamanan sistem secara berkala</li>
                            <li>Backup data secara teratur</li>
                        </ul>
                    </div>
                </div>

                <!-- Data Sharing -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">5. Berbagi Informasi</h2>
                    <p class="text-gray-600 mb-4">
                        Kami tidak menjual, memperdagangkan, atau mentransfer informasi pribadi Anda kepada pihak ketiga,
                        kecuali dalam kondisi berikut:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>Dengan persetujuan dari pengguna</li>
                        <li>Untuk memenuhi kewajiban hukum atau peraturan</li>
                        <li>Kepada administrator sistem yang berwenang</li>
                        <li>Untuk keperluan akademik yang sah</li>
                    </ul>
                </div>

                <!-- User Rights -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">6. Hak Pengguna</h2>
                    <p class="text-gray-600 mb-4">
                        Sebagai pengguna sistem, Anda memiliki hak untuk:
                    </p>
                    <ul class="list-disc list-inside text-gray-600 space-y-2">
                        <li>Mengakses informasi pribadi Anda</li>
                        <li>Memperbaiki data yang tidak akurat</li>
                        <li>Meminta penghapusan data pribadi (sesuai ketentuan)</li>
                        <li>Menanyakan tentang penggunaan data Anda</li>
                        <li>Mengajukan keberatan atas pemrosesan data</li>
                    </ul>
                </div>

                <!-- Data Retention -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">7. Penyimpanan Data</h2>
                    <p class="text-gray-600">
                        Data pribadi Anda akan disimpan selama diperlukan untuk tujuan yang dijelaskan dalam kebijakan ini,
                        atau sesuai dengan persyaratan hukum dan akademik Universitas Sanata Dharma.
                        Riwayat peminjaman akan diarsipkan selama periode yang ditentukan oleh kebijakan universitas.
                    </p>
                </div>

                <!-- Cookies -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">8. Cookies dan Teknologi Serupa</h2>
                    <p class="text-gray-600">
                        Sistem ini menggunakan cookies untuk meningkatkan pengalaman pengguna, mengingat preferensi,
                        dan menjaga keamanan sesi. Anda dapat mengatur browser untuk menolak cookies, namun hal ini
                        dapat memengaruhi fungsionalitas sistem.
                    </p>
                </div>

                <!-- Changes to Policy -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">9. Perubahan Kebijakan</h2>
                    <p class="text-gray-600">
                        Kami dapat memperbarui kebijakan privasi ini dari waktu ke waktu. Perubahan akan diumumkan
                        melalui sistem dan versi terbaru akan selalu tersedia di halaman ini.
                    </p>
                </div>

                <!-- Contact -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-900 mb-4">10. Kontak</h2>
                    <p class="text-gray-600 mb-2">
                        Jika Anda memiliki pertanyaan atau kekhawatiran mengenai kebijakan privasi ini, silakan hubungi:
                    </p>
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <p class="text-gray-700"><strong>Administrator Sistem</strong></p>
                        <p class="text-gray-600">Email: admin.lab@usd.ac.id</p>
                        <p class="text-gray-600">Telepon: (0274) 123456</p>
                        <p class="text-gray-600">Gedung Laboratorium, Universitas Sanata Dharma</p>
                    </div>
                </div>

                <!-- Consent -->
                <div class="mt-8 p-4 bg-primary-50 rounded-lg">
                    <p class="text-gray-700 text-sm">
                        <strong>Catatan:</strong> Dengan menggunakan Sistem Peminjaman Laboratorium ini, Anda menyetujui
                        ketentuan yang tercantum dalam kebijakan privasi ini.
                    </p>
                </div>
            </div>
        </div>

        <!-- Quick Action -->
        <div class="mt-8 text-center">
            <x-quick-action 
                href="{{ url('/') }}"
                icon="fas fa-home"
                title="Kembali ke Beranda"
                description="Kembali ke halaman utama sistem"
            />
        </div>
    </div>
</div>
@endsection