@extends('layouts.app')

@section('title', 'Peminjaman - Sistem Peminjaman Laboratorium')

@section('content')

    <div class="py-6">
        <div class="max-w-5xl mx-auto px-8 ">
            <p class="text-md font-bold m-2 mb-4">Detail Pengajuan Peminjaman</p>
            <form id="Detail-peminjaman" class="bg-white shadow-md rounded-lg p-6">
                <div class="flex items-center justify-between mb-4">
                    <label for="namaPeminjam" class="font-semibold text-gray-700 w-1/4">
                        Nama Peminjam:
                    </label>


                    <input type="text" id="namaPeminjam"
                        value="{{ $peminjaman->peminjam ? $peminjaman->peminjam->nama : '-' }}" disabled
                        class="w-3/4 border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-700 focus:outline-none" />
                </div>


                <div class="flex items-center justify-between mb-4">
                    <label for="nip" class="font-semibold text-gray-700 w-1/4">
                        nip:
                    </label>

                    <input type="text" id="nip" value="{{ $peminjaman->peminjam ? $peminjaman->id_peminjam : '-' }}"
                        disabled
                        class="w-3/4 border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-700 focus:outline-none" />
                </div>
                <div class="flex items-center justify-between mb-4">
                    <label for="keperluan" class="font-semibold text-gray-700 w-1/4">
                        Keperluan:
                    </label>

                    <input type="text" id="keperluan" value="{{ $peminjaman->peminjam ? $peminjaman->keperluan : '-' }}"
                        disabled class="w-3/4 border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-700" />
                </div>

                <div class="flex items-center justify-between mb-4">
                    <label for="jumlah" class="font-semibold text-gray-700 w-1/4">
                        Jumlah Peserta:
                    </label>

                    <input type="text" id="jumlah" value="40" disabled
                        class="w-3/4 border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-700 focus:outline-none" />
                </div>
                <div class="flex items-center mb-4">
                    <label for="waktuMulai" class="font-semibold text-gray-700 w-1/4">
                        Waktu:
                    </label>

                    <div class="flex w-3/4 space-x-3">
                        <input type="text" id="jam"
                            value="{{ $peminjaman->jam_mulai && $peminjaman->jam_selesai
                                ? date('H:i', strtotime($peminjaman->jam_mulai)) . ' - ' . date('H:i', strtotime($peminjaman->jam_selesai))
                                : '-' }}"
                            disabled class="w-1/2 border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-700" />
                        <input type="text" id="tanggal" value="{{ $peminjaman->peminjam? $peminjaman->tanggal :'-' }}" disabled
                            class="w-1/2 border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-700" />
                    </div>
                </div>

                <div class="flex items-center justify-between mb-4">
                    <label for="namaPeminjam" class="font-semibold text-gray-700 w-1/4">
                        Ruangan:
                    </label>

                    <input type="text" id="ruangan" value="{{ $peminjaman->peminjam? $peminjaman->laboratorium->nama_laboratorium :'-'}}" disabled
                        class="w-3/4 border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-700" />
                </div>

                <div class="flex items-center justify-between mb-4">
                    <label for="" class="font-semibold text-gray-700 w-1/4">
                        Status:
                    </label>
                    <select id="status"
                        class="w-3/4 border border-gray-300 rounded-md px-3 py-2 bg-gray-100 text-gray-700 focus:outline-none">
                        <option id="setuju">Setuju</option>
                        <option id="tolak">Tolak</option>
                    </select>
                </div>
                <!-- setuju -->
                <div id="setuju-container" class="flex justify-end">
                    <button class="bg-green-600 text-white px-3 py-2 rounded-2xl font-bold">Kirim</button>
                </div>

                <!-- alasan nolak -->
                <div id="alasan-penolakan-container" class="hidden mt-6">
                    <div class="bg-red-50 border border-red-300 rounded-lg p-5 shadow-sm">
                        <label for="alasanPenolakan" class="block text-gray-700 font-semibold mb-2">
                            Alasan Penolakan
                        </label>
                        <textarea id="alasanPenolakan" rows="4" placeholder="Tuliskan alasan penolakan di sini..."
                            class="w-full border border-gray-300 rounded-md px-4 py-2 text-gray-700 focus:outline-none focus:ring-2 focus:ring-red-400 resize-none"></textarea>

                        <div class="flex justify-end mt-4">
                            <button id="kirimPenolakan"
                                class="bg-red-500 hover:bg-red-600 transition-colors duration-200 text-white font-semibold px-5 py-2 rounded-lg shadow-md">
                                Kirim
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/script-alasan-penolakan.js') }}"></script>
@endsection
