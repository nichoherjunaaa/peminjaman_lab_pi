@extends('layouts.app')

@section('title', 'Laporan - Sistem Peminjaman Laboratorium')

@section('content')
    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold font-segoe text-gray-900">Laporan Peminjaman Laboratorium</h1>
                <p class="mt-2 text-gray-600">Analisis dan statistik peminjaman laboratorium</p>
            </div>

            <!-- Filter Section -->
            <div class="bg-white shadow rounded-lg p-6 mb-8">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Filter Laporan</h2>
                <form action="{{ route('report') }}" method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    @csrf
                    <!-- Periode -->
                    <div>
                        <label for="filter" class="block text-sm font-medium text-gray-700 mb-1">Periode</label>
                        <select name="filter" id="filter"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            <option value="weekly" {{ request('filter') == 'weekly' ? 'selected' : '' }}>Minggu Ini</option>
                            <option value="monthly" {{ request('filter') == 'monthly' ? 'selected' : '' }}>Bulan Ini</option>
                            <option value="3months" {{ request('filter') == '3months' ? 'selected' : '' }}>3 Bulan Terakhir
                            </option>
                            <option value="6months" {{ request('filter') == '6months' ? 'selected' : '' }}>6 Bulan Terakhir
                            </option>
                            <option value="yearly" {{ request('filter') == 'yearly' ? 'selected' : '' }}>Tahun Ini</option>
                        </select>
                    </div>

                    <!-- Laboratorium -->
                    <div>
                        <label for="lab_id" class="block text-sm font-medium text-gray-700 mb-1">Laboratorium</label>
                        <select name="id_laboratorium" id="lab_id"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            <option value="all" {{ request('id_laboratorium') == 'all' ? 'selected' : '' }}>Semua Laboratorium
                            </option>
                            @foreach($laboratoriums as $lab)
                                <option value="{{ $lab->id_laboratorium }}" {{ request('id_laboratorium') == $lab->id_laboratorium ? 'selected' : '' }}>
                                    {{ $lab->nama_laboratorium }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                        <select name="status" id="status"
                            class="w-full border-gray-300 rounded-md shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50">
                            <option value="all" {{ request('status') == 'all' ? 'selected' : '' }}>Semua Status</option>
                            <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Disetujui
                            </option>
                            <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Ditolak</option>
                            <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai
                            </option>
                        </select>
                    </div>

                    <!-- Button -->
                    <div class="flex items-end">
                        <button type="submit"
                            class="w-full bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors duration-200 flex items-center justify-center">
                            <i class="fas fa-filter mr-2"></i>
                            Terapkan Filter
                        </button>
                    </div>
                </form>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3 mb-8">
                <!-- Total Peminjaman -->
                <div class="bg-white overflow-hidden shadow rounded-lg card-hover">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-calendar-check text-primary text-2xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Total Peminjaman</dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">{{ $peminjaman_count }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Rata-rata Penggunaan -->
                {{-- <div class="bg-white overflow-hidden shadow rounded-lg card-hover">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-percentage text-secondary text-2xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Rata-rata Penggunaan</dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">{{ $usageRate }}%</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- Lab Paling Populer -->
                <div class="bg-white overflow-hidden shadow rounded-lg card-hover">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-star text-primary text-2xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Lab Paling Populer</dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">{{ $popularLab }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Waktu Paling Sering -->
                <div class="bg-white overflow-hidden shadow rounded-lg card-hover">
                    <div class="p-5">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <i class="fas fa-clock text-secondary text-2xl"></i>
                            </div>
                            <div class="ml-5 w-0 flex-1">
                                <dl>
                                    <dt class="text-sm font-medium text-gray-500 truncate">Waktu Paling Sering</dt>
                                    <dd>
                                        <div class="text-lg font-medium text-gray-900">{{ $popularTime }}</div>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Chart 1: Peminjaman per Bulan -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Peminjaman per Bulan</h3>
                    <div class="h-80">
                        <canvas id="monthlyChart"></canvas>
                    </div>
                </div>

                <!-- Chart 2: Distribusi per Laboratorium -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Distribusi per Laboratorium</h3>
                    <div class="h-80">
                        <canvas id="labDistributionChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Additional Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8">
                <!-- Chart 3: Status Peminjaman -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Status Peminjaman</h3>
                    <div class="h-80">
                        <canvas id="statusChart"></canvas>
                    </div>
                </div>

                <!-- Chart 4: Peminjaman per Hari -->
                <div class="bg-white shadow rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Peminjaman per Hari dalam Seminggu</h3>
                    <div class="h-80">
                        <canvas id="dayOfWeekChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Export Section -->
            <div class="bg-white shadow rounded-lg p-6 mb-8">
                <h2 class="text-lg font-medium text-gray-900 mb-4">Ekspor Laporan</h2>
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('report.export.excel') }}"
                        class="bg-green-600 text-white px-4 py-2 rounded-md hover:bg-green-700 transition-colors duration-200 flex items-center">
                        <i class="fas fa-file-excel mr-2"></i>
                    Ekspor ke Excel
                </a>
                </div>
            </div>

            <!-- Detailed Report Table -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-8">
                <div class="px-4 py-5 sm:px-6 border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Laporan Detail Peminjaman</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Detail peminjaman berdasarkan filter yang dipilih</p>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    No
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Laboratorium
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Peminjam
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Tanggal & Waktu
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Kegiatan
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($peminjamanData as $index => $peminjaman)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ ($peminjamanData->currentPage() - 1) * $peminjamanData->perPage() + $index + 1 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $peminjaman->laboratorium->nama_laboratorium }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $peminjaman->peminjam->nama ?? 'N/A' }}</div>
                                        <div class="text-sm text-gray-500 capitalize">{{ $peminjaman->peminjam_type ?? 'N/A' }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ \Carbon\Carbon::parse($peminjaman->tanggal)->format('d M Y') }}</div>
                                        <div class="text-sm text-gray-500">{{ $peminjaman->jam_mulai }} -
                                            {{ $peminjaman->jam_selesai }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ $peminjaman->nama_kegiatan }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $statusColors = [
                                                'approved' => 'bg-green-100 text-green-800',
                                                'pending' => 'bg-yellow-100 text-yellow-800',
                                                'rejected' => 'bg-red-100 text-red-800',
                                                'done' => 'bg-blue-100 text-blue-800'
                                            ];
                                            $statusLabels = [
                                                'approved' => 'Disetujui',
                                                'pending' => 'Pending',
                                                'rejected' => 'Ditolak',
                                                'done' => 'Selesai'
                                            ];
                                        @endphp
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusColors[$peminjaman->status] ?? 'bg-gray-100 text-gray-800' }}">
                                            {{ $statusLabels[$peminjaman->status] ?? $peminjaman->status }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <p class="text-sm text-gray-700">
                                Menampilkan
                                <span class="font-medium">{{ $peminjamanData->firstItem() }}</span>
                                sampai
                                <span class="font-medium">{{ $peminjamanData->lastItem() }}</span>
                                dari
                                <span class="font-medium">{{ $peminjamanData->total() }}</span>
                                hasil
                            </p>
                        </div>
                        <div class="flex space-x-2">
                            {{ $peminjamanData->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Chart 1: Peminjaman per Bulan
            const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
            const monthlyChart = new Chart(monthlyCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                    datasets: [{
                        label: 'Jumlah Peminjaman',
                        data: @json($monthlyData),
                        borderColor: '#800000',
                        backgroundColor: 'rgba(128, 0, 0, 0.1)',
                        borderWidth: 2,
                        tension: 0.4,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 5
                            }
                        }
                    }
                }
            });

            // Chart 2: Distribusi per Laboratorium
            const labDistributionCtx = document.getElementById('labDistributionChart').getContext('2d');
            const labDistributionChart = new Chart(labDistributionCtx, {
                type: 'doughnut',
                data: {
                    labels: @json($labDistribution->pluck('nama_laboratorium')),
                    datasets: [{
                        data: @json($labDistribution->pluck('count')),
                        backgroundColor: [
                            '#800000',
                            '#E0862F',
                            '#4A5568',
                            '#38A169',
                            '#3182CE',
                            '#805AD5',
                            '#DD6B20'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'right'
                        }
                    }
                }
            });

            // Chart 3: Status Peminjaman
            const statusCtx = document.getElementById('statusChart').getContext('2d');
            const statusChart = new Chart(statusCtx, {
                type: 'bar',
                data: {
                    labels: @json(array_keys($statusDistribution)),
                    datasets: [{
                        label: 'Jumlah',
                        data: @json(array_values($statusDistribution)),
                        backgroundColor: [
                            '#38A169',
                            '#D69E2E',
                            '#E53E3E',
                            '#3182CE'
                        ],
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 5
                            }
                        }
                    }
                }
            });

            // Chart 4: Peminjaman per Hari
            const dayOfWeekCtx = document.getElementById('dayOfWeekChart').getContext('2d');
            const dayOfWeekChart = new Chart(dayOfWeekCtx, {
                type: 'bar',
                data: {
                    labels: @json($dayOfWeekData['labels']),
                    datasets: [{
                        label: 'Jumlah Peminjaman',
                        data: @json($dayOfWeekData['data']),
                        backgroundColor: '#800000',
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: false
                        }
                    }
                }
            });
        });
    </script>
@endsection