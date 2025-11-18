@extends('layouts.app')

@section('title', 'Quickbook Laboratorium - Sistem Peminjaman Laboratorium')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <!-- Search Form -->
            <div class="search-card rounded-lg shadow-lg p-6 mb-8">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Cari Laboratorium Tersedia</h2>

                <form id="quickBookForm">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <!-- Tanggal -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Tanggal
                            </label>
                            <input type="date" id="searchDate"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                        </div>

                        <!-- Nama Laboratorium -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Nama Laboratorium
                            </label>
                            <select id="labName"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                                <option value="">Semua Laboratorium</option>
                                @foreach ($list_laboratorium as $lab)
                                    <option value="{{ $lab->id_laboratorium }}">{{ $lab->nama_laboratorium }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Waktu -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Waktu
                            </label>
                            <select id="timeSlot"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary">
                                <option value="">Semua Waktu</option>
                                <option value="08:00-10:00">08:00 - 10:00</option>
                                <option value="10:00-12:00">10:00 - 12:00</option>
                                <option value="12:00-14:00">12:00 - 14:00</option>
                                <option value="14:00-16:00">14:00 - 16:00</option>
                                <option value="16:00-18:00">16:00 - 18:00</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" id="searchButton"
                            class="bg-primary hover:bg-red-800 text-white font-bold py-3 px-6 rounded-lg transition-colors flex items-center">
                            <i class="fas fa-search mr-2"></i>
                            Cari Laboratorium
                        </button>
                    </div>
                </form>
            </div>

            <!-- Results Section -->
            <div id="resultsSection" class="hidden">
                <h2 class="text-2xl font-bold text-gray-900 mb-6">Hasil Pencarian</h2>

                <!-- Filter Results -->
                <div class="bg-white rounded-lg shadow-sm p-4 mb-6 flex flex-wrap gap-4">
                    <div class="flex items-center">
                        <span class="text-sm text-gray-600 mr-2">Tanggal:</span>
                        <span id="filterDate" class="font-medium text-gray-900"></span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-600 mr-2">Lab:</span>
                        <span id="filterLab" class="font-medium text-gray-900"></span>
                    </div>
                    <div class="flex items-center">
                        <span class="text-sm text-gray-600 mr-2">Waktu:</span>
                        <span id="filterTime" class="font-medium text-gray-900"></span>
                    </div>
                </div>

                <!-- Available Labs Table -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nama Laboratorium
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Lokasi
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kapasitas
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Waktu Tersedia
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Aksi
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="resultsTableBody" class="bg-white divide-y divide-gray-200">
                                <!-- Results will be populated here -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- No Results Message -->
                <div id="noResults" class="hidden text-center py-12">
                    <i class="fas fa-search text-4xl text-gray-300 mb-4"></i>
                    <h3 class="text-xl font-medium text-gray-900 mb-2">Tidak ada laboratorium yang tersedia</h3>
                    <p class="text-gray-600">Coba ubah kriteria pencarian Anda</p>
                </div>
            </div>

            <!-- Quick Booking Steps -->
            <div class="bg-white rounded-lg shadow-sm p-6 mt-12">
                <h2 class="text-xl font-bold text-gray-900 mb-6">Cara Menggunakan Quick Book</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-search text-primary text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">1. Cari</h3>
                        <p class="text-gray-600">Pilih tanggal, nama laboratorium, dan waktu yang diinginkan</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-check-circle text-primary text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">2. Pilih</h3>
                        <p class="text-gray-600">Pilih laboratorium dan waktu yang tersedia sesuai kebutuhan</p>
                    </div>
                    <div class="text-center">
                        <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-bookmark text-primary text-2xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">3. Pinjam</h3>
                        <p class="text-gray-600">Konfirmasi peminjaman dan tunggu persetujuan admin</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .table-row-hover:hover {
            background-color: #f9fafb;
        }

        .status-available {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-booked {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .status-default {
            background-color: #e5e7eb;
            color: #374151;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set default date to today
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('searchDate').value = today;

            // Search button functionality
            document.getElementById('searchButton').addEventListener('click', function() {
                const tanggal = document.getElementById('searchDate').value;
                const labName = document.getElementById('labName').value;
                const timeSlot = document.getElementById('timeSlot').value;

                // Show loading state
                const searchButton = document.getElementById('searchButton');
                const originalText = searchButton.innerHTML;
                searchButton.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Mencari...';
                searchButton.disabled = true;

                fetch("{{ route('quickbook.search') }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            tanggal: tanggal,
                            lab_name: labName,
                            time_slot: timeSlot
                        })
                    })
                    .then(async res => {
                        const data = await res.json();

                        if (!res.ok) {
                            throw new Error(data.message || 'Network response was not ok');
                        }

                        return data;
                    })
                    .then(data => {
                        const resultsSection = document.getElementById('resultsSection');
                        const resultsTableBody = document.getElementById('resultsTableBody');
                        const noResults = document.getElementById('noResults');
                        const filterDate = document.getElementById('filterDate');
                        const filterLab = document.getElementById('filterLab');
                        const filterTime = document.getElementById('filterTime');

                        // Reset button
                        searchButton.innerHTML = originalText;
                        searchButton.disabled = false;

                        if (!data.success) {
                            alert('Error: ' + data.message);
                            return;
                        }

                        // Format date for display
                        const formatDate = (dateString) => {
                            if (!dateString) return '-';
                            const options = {
                                weekday: 'long',
                                year: 'numeric',
                                month: 'long',
                                day: 'numeric'
                            };
                            const date = new Date(dateString);
                            return date.toLocaleDateString('id-ID', options);
                        };

                        // Update filter display
                        filterDate.textContent = tanggal ? formatDate(tanggal) : '-';

                        const labSelect = document.getElementById('labName');
                        const selectedLabText = labName ? labSelect.options[labSelect.selectedIndex]
                            .text : 'Semua Laboratorium';
                        filterLab.textContent = selectedLabText;

                        filterTime.textContent = timeSlot ? timeSlot : 'Semua Waktu';

                        // Clear previous results
                        resultsTableBody.innerHTML = '';

                        if (data.data && data.data.length > 0) {
                            resultsSection.classList.remove('hidden');
                            noResults.classList.add('hidden');

                            // Populate table with results - setiap baris adalah lab + waktu
                            data.data.forEach(lab => {
                                let statusClass = 'status-default';
                                if (lab.status_color === 'available') {
                                    statusClass = 'status-available';
                                } else if (lab.status_color === 'booked') {
                                    statusClass = 'status-booked';
                                }

                                const row = document.createElement('tr');
                                row.className = 'table-row-hover';

                                row.innerHTML = `
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">${lab.nama_laboratorium || '-'}</div>
                                            <div class="text-sm text-gray-500">${lab.deskripsi || '-'}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">${lab.lokasi || '-'}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">${lab.kapasitas || '-'} orang</div>
                                </td>
                                
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-medium">
                                    ${lab.waktu_slot || '-'}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    ${lab.status_color === 'available' ? 
                                        `
                                            <button class="bg-primary hover:bg-red-800 text-white px-4 py-2 rounded-lg transition-colors flex items-center" 
                                             data-id="${lab.id_laboratorium}"
                                             data-jammulai="${lab.jam_mulai}"
                                             data-jamselesai="${lab.jam_selesai}"
                                             onclick="pinjamLaboratorium(this)">
                                            
                                                Pinjam
                                            </button>
                                            ` : 
                                        `<button class="bg-gray-400 text-white px-4 py-2 rounded-lg cursor-not-allowed" disabled>
                                                <i class="fas fa-times mr-2"></i>
                                                Tidak Tersedia
                                            </button>`
                                    }
                                </td>
                            `;

                                resultsTableBody.appendChild(row);
                            });
                        } else {
                            resultsSection.classList.remove('hidden');
                            noResults.classList.remove('hidden');
                        }
                    })
                    .catch(err => {
                        console.error('Error:', err);
                        searchButton.innerHTML = originalText;
                        searchButton.disabled = false;
                        alert('Terjadi kesalahan saat mencari laboratorium: ' + err.message);
                    });
            });
        });

        // Function to handle booking dengan waktu spesifik
        function pinjamLaboratorium(button) {
            const tanggal = document.getElementById('searchDate').value;
              if (!tanggal) {
                alert('Silakan pilih tanggal terlebih dahulu');
                return;
            }
              const labId = button.getAttribute('data-id');
            const jamMulai = button.getAttribute('data-jammulai');
            const jamSelesai = button.getAttribute('data-jamselesai');

            // Redirect to booking page dengan parameter waktu
            window.location.href =`/create?lab_id=${labId}&tanggal=${tanggal}&jam_mulai=${jamMulai}&jam_selesai=${jamSelesai}`;
        }

    </script>
@endsection
