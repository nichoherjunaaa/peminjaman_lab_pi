@extends('layouts.app')

@section('title', 'Detail Pengajuan - Sistem Peminjaman Laboratorium')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Detail Pengajuan Peminjaman</h1>
            <p class="mt-2 text-gray-600">Review dan kelola status pengajuan peminjaman laboratorium</p>
        </div>

        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-primary px-6 py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-lg font-semibold text-white">Informasi Peminjaman</h2>
                    </div>
                    <div class="bg-white/20 px-3 py-1 rounded-full">
                        <span class="text-white text-sm font-medium">
                            {{ ucfirst($peminjaman->status == 'pending' ? 'menunggu' : ($peminjaman->status == 'approved' ? 'disetujui' : ($peminjaman->status == 'rejected' ? 'ditolak' : 'selesai'))) }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <!-- Form utama -->
                <form action="{{ route('borrowing.update', $peminjaman->id_peminjaman) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Peminjam</label>
                                <input type="text" value="{{ $peminjaman->peminjam->nama }}" disabled
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-50 text-gray-700" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">NIP/NIM</label>
                                <input type="text" value="{{ $peminjaman->id_peminjam }}" disabled
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-50 text-gray-700" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Kegiatan</label>
                                <input type="text" value="{{ $peminjaman->nama_kegiatan }}" disabled
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-50 text-gray-700" />
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Keperluan</label>
                                <input type="text" value="{{ $peminjaman->keperluan }}" disabled
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-50 text-gray-700" />
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Laboratorium</label>
                                <input type="text" value="{{ $peminjaman->laboratorium->nama_laboratorium }}" disabled
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-50 text-gray-700" />
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                                    <input type="text"
                                        value="{{ \Carbon\Carbon::parse($peminjaman->tanggal)->format('d-m-Y') }}" disabled
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-50 text-gray-700" />
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Waktu</label>
                                    <input type="text"
                                        value="{{ $peminjaman->jam_mulai }} - {{ $peminjaman->jam_selesai }}" disabled
                                        class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-gray-50 text-gray-700" />
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Status Pengajuan</label>
                                <select name="status" id="status"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-primary">
                                    <option value="pending" {{ $peminjaman->status == 'pending' ? 'selected' : '' }}>Menunggu Review</option>
                                    <option value="approved" {{ $peminjaman->status == 'approved' ? 'selected' : '' }}>Disetujui</option>
                                    <option value="rejected" {{ $peminjaman->status == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="alasanPenolakanContainer" class="hidden mt-6">
                        <label for="alasanPenolakan" class="block text-sm font-medium text-gray-700 mb-2">
                            Alasan Penolakan
                        </label>
                        <textarea name="alasan_penolakan" id="alasanPenolakan" rows="3"
                            placeholder="Jelaskan alasan penolakan pengajuan ini..."
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-500 resize-none"></textarea>
                    </div>

                    <div class="flex justify-end mt-8 space-x-4">
                        <a href="{{ route('borrowing.index') }}"
                            class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium">
                            <i class="fas fa-arrow-left mr-2"></i>Kembali
                        </a>
                        <button type="submit"
                            class="px-6 py-2.5 bg-primary text-white rounded-lg hover:bg-primary-dark font-medium">
                            <i class="fas fa-check-circle mr-2"></i>Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // Tampilkan textarea alasan penolakan jika status = rejected
    document.getElementById('status').addEventListener('change', function () {
        const alasanContainer = document.getElementById('alasanPenolakanContainer');
        if (this.value === 'rejected') {
            alasanContainer.classList.remove('hidden');
        } else {
            alasanContainer.classList.add('hidden');
        }
    });
</script>
@endsection
