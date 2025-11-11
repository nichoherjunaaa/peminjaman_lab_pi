document.addEventListener('DOMContentLoaded', function () {
    // Chart 1: Peminjaman per Bulan
    const monthlyCtx = document.getElementById('monthlyChart').getContext('2d');
    const monthlyChart = new Chart(monthlyCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: [12, 19, 15, 22, 18, 25, 30, 28, 24, 20, 18, 22],
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

    const labDistributionCtx = document.getElementById('labDistributionChart').getContext('2d');
    const labDistributionChart = new Chart(labDistributionCtx, {
        type: 'doughnut',
        data: {
            labels: ['Lab. Komputer A', 'Lab. Komputer B', 'Lab. Jaringan', 'Lab. Multimedia', 'Lab. Basis Data'],
            datasets: [{
                data: [30, 25, 20, 15, 10],
                backgroundColor: [
                    '#800000',
                    '#E0862F',
                    '#4A5568',
                    '#38A169',
                    '#3182CE'
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
            labels: ['Disetujui', 'Pending', 'Ditolak', 'Selesai'],
            datasets: [{
                label: 'Jumlah',
                data: [120, 25, 8, 103],
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
                        stepSize: 25
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
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: [35, 42, 38, 30, 25, 10],
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