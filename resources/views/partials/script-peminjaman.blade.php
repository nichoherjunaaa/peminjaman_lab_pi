<script>
        // Sample booking data
        const bookingData = {
            '2023-10-15': [
                {
                    id: 1,
                    lab: 'Lab. Komputer 1',
                    kegiatan: 'Praktikum Pemrograman Web',
                    waktu: '08:00 - 10:00',
                    peminjam: 'Dr. Ahmad Wijaya',
                    status: 'approved',
                    jenis: 'dosen'
                },
                {
                    id: 2,
                    lab: 'Lab. Kimia',
                    kegiatan: 'Praktikum Kimia Dasar - Titrasi',
                    waktu: '10:00 - 12:00',
                    peminjam: 'Budi Santoso',
                    status: 'approved',
                    jenis: 'mahasiswa'
                },
                {
                    id: 3,
                    lab: 'Lab. Biologi',
                    kegiatan: 'Penelitian Mikrobiologi',
                    waktu: '13:00 - 15:00',
                    peminjam: 'Prof. Dr. Sari Indah',
                    status: 'pending',
                    jenis: 'dosen'
                }
            ],
            '2023-10-16': [
                {
                    id: 4,
                    lab: 'Lab. Komputer 2',
                    kegiatan: 'Workshop Web Development',
                    waktu: '09:00 - 12:00',
                    peminjam: 'Lisa Permata',
                    status: 'approved',
                    jenis: 'mahasiswa'
                },
                {
                    id: 5,
                    lab: 'Lab. Fisika',
                    kegiatan: 'Eksperimen Optik',
                    waktu: '14:00 - 16:00',
                    peminjam: 'Dr. Rudi Hermawan',
                    status: 'approved',
                    jenis: 'dosen'
                }
            ],
            '2023-10-18': [
                {
                    id: 6,
                    lab: 'Lab. Kimia',
                    kegiatan: 'Analisis Kimia Organik',
                    waktu: '08:00 - 10:00',
                    peminjam: 'Dr. Ahmad Wijaya',
                    status: 'approved',
                    jenis: 'dosen'
                },
                {
                    id: 7,
                    lab: 'Lab. Komputer 1',
                    kegiatan: 'Praktikum Jaringan Komputer',
                    waktu: '13:00 - 15:00',
                    peminjam: 'Kevin Aditya',
                    status: 'approved',
                    jenis: 'mahasiswa'
                },
                {
                    id: 8,
                    lab: 'Lab. Biologi',
                    kegiatan: 'Studi Sel Tumbuhan',
                    waktu: '15:00 - 17:00',
                    peminjam: 'Sarah Johnson',
                    status: 'rejected',
                    jenis: 'mahasiswa'
                }
            ],
            '2025-09-23': [
                {
                    id: 9,
                    lab: 'Lab. Komputer Dasar A',
                    kegiatan: 'Seminar Teknologi',
                    waktu: '12:00 - 14:00',
                    peminjam: 'Ir. Kartono Pinaryanto, S.T., M.Cs.',
                    status: 'pending',
                    jenis: 'dosen'
                },
                {
                    id: 10,
                    lab: 'Lab. Basis Data B',
                    kegiatan: 'Penelitian Basis Data',
                    waktu: '13:00 - 15:00',
                    peminjam: 'Ir. Paulina Heruningsih Prima Rosa, S.Si., M.Sc.',
                    status: 'approved',
                    jenis: 'dosen'
                }
            ],
            '2025-09-21': [
                {
                    id: 11,
                    lab: 'Lab. Bahasa',
                    kegiatan: 'Kursus Bahasa Mandarin',
                    waktu: '08:00 - 10:00',
                    peminjam: 'Chen Li',
                    status: 'approved',
                    jenis: 'dosen'
                }
            ]
        };

        // Calendar functionality
        let currentDate = new Date();
        let selectedDate = new Date();

        function formatDate(date) {
            return date.toISOString().split('T')[0];
        }

        function formatDisplayDate(date) {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            return date.toLocaleDateString('id-ID', options);
        }

        function isSameDay(date1, date2) {
            return formatDate(date1) === formatDate(date2);
        }

        function hasBookings(date) {
            return bookingData[formatDate(date)] !== undefined;
        }

        function getBookingCount(date) {
            const bookings = bookingData[formatDate(date)];
            return bookings ? bookings.length : 0;
        }

        function calculateMonthlyStats() {
            let total = 0;
            let approved = 0;
            let pending = 0;
            let rejected = 0;

            Object.values(bookingData).forEach(bookings => {
                bookings.forEach(booking => {
                    total++;
                    if (booking.status === 'approved') approved++;
                    if (booking.status === 'pending') pending++;
                    if (booking.status === 'rejected') rejected++;
                });
            });

            return { total, approved, pending, rejected };
        }

        function renderCalendar() {
            const calendarGrid = document.getElementById('calendarGrid');
            const currentMonthElement = document.getElementById('currentMonth');
            
            // Set current month text
            const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];
            currentMonthElement.textContent = `${monthNames[currentDate.getMonth()]} ${currentDate.getFullYear()}`;

            // Clear calendar grid
            calendarGrid.innerHTML = '';

            // Get first day of month and total days
            const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
            const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
            const startingDay = firstDay.getDay(); // 0 = Sunday, 1 = Monday, etc.

            // Add empty cells for days before first day of month
            for (let i = 0; i < startingDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'h-12';
                calendarGrid.appendChild(emptyDay);
            }

            // Add days of month
            for (let day = 1; day <= lastDay.getDate(); day++) {
                const dayElement = document.createElement('button');
                dayElement.className = 'calendar-day h-12 rounded-lg flex items-center justify-center text-sm font-medium';
                
                const dayDate = new Date(currentDate.getFullYear(), currentDate.getMonth(), day);
                const bookingCount = getBookingCount(dayDate);
                
                // Check if this day has bookings
                if (bookingCount > 0) {
                    dayElement.classList.add('has-booking');
                    if (bookingCount > 2) {
                        dayElement.classList.add('multiple-bookings');
                    }
                }
                
                // Check if this day is selected
                if (isSameDay(dayDate, selectedDate)) {
                    dayElement.classList.add('selected');
                }
                
                // Check if this day is today
                if (isSameDay(dayDate, new Date())) {
                    dayElement.classList.add('font-bold');
                    if (!isSameDay(dayDate, selectedDate)) {
                        dayElement.classList.add('text-primary');
                    }
                }
                
                dayElement.textContent = day;
                dayElement.addEventListener('click', () => selectDate(dayDate));
                calendarGrid.appendChild(dayElement);
            }
        }

        function selectDate(date) {
            selectedDate = date;
            renderCalendar();
            renderBookingList();
        }

        function renderBookingList() {
            const bookingList = document.getElementById('bookingList');
            const selectedDateText = document.getElementById('selectedDateText');
            const bookingCount = document.getElementById('bookingCount');
            
            selectedDateText.textContent = formatDisplayDate(selectedDate);
            
            const bookings = bookingData[formatDate(selectedDate)];
            const count = bookings ? bookings.length : 0;
            bookingCount.textContent = count;
            
            if (bookings && bookings.length > 0) {
                bookingList.innerHTML = '';
                bookings.forEach(booking => {
                    const statusColors = {
                        'approved': 'bg-green-100 text-green-800',
                        'pending': 'bg-yellow-100 text-yellow-800',
                        'rejected': 'bg-red-100 text-red-800'
                    };
                    
                    const statusText = {
                        'approved': 'Disetujui',
                        'pending': 'Menunggu',
                        'rejected': 'Ditolak'
                    };

                    const jenisIcon = {
                        'dosen': 'fas fa-user-tie',
                        'mahasiswa': 'fas fa-user-graduate'
                    };
                    
                    const bookingElement = document.createElement('div');
                    bookingElement.className = 'booking-card bg-gray-50 p-4 rounded-lg border-l-4 border-secondary';
                    bookingElement.innerHTML = `
                        <div class="flex justify-between items-start mb-2">
                            <div class="flex items-center">
                                <i class="${jenisIcon[booking.jenis]} text-gray-500 mr-2"></i>
                                <h3 class="font-medium text-gray-900">${booking.lab}</h3>
                            </div>
                            <span class="status-badge font-medium rounded-full ${statusColors[booking.status]}">
                                ${statusText[booking.status]}
                            </span>
                        </div>
                        <p class="text-sm text-gray-600 mb-2">${booking.kegiatan}</p>
                        <div class="flex justify-between items-center text-sm">
                            <span class="text-gray-500 flex items-center">
                                <i class="fas fa-clock mr-1"></i>
                                ${booking.waktu}
                            </span>
                            <span class="text-gray-500">${booking.peminjam}</span>
                        </div>
                    `;
                    bookingList.appendChild(bookingElement);
                });
            } else {
                bookingList.innerHTML = `
                    <div class="text-center py-8 text-gray-500">
                        <i class="fas fa-calendar-times text-3xl mb-2"></i>
                        <p>Tidak ada peminjaman</p>
                        <p class="text-sm mt-1">pada tanggal ini</p>
                    </div>
                `;
            }
        }

        function updateStats() {
            const stats = calculateMonthlyStats();
            document.getElementById('totalBookings').textContent = stats.total;
            document.getElementById('approvedBookings').textContent = stats.approved;
            document.getElementById('pendingBookings').textContent = stats.pending;
            document.getElementById('rejectedBookings').textContent = stats.rejected;
        }

        // Initialize calendar
        document.addEventListener('DOMContentLoaded', function() {
            renderCalendar();
            renderBookingList();
            updateStats();
            
            // Month navigation
            document.getElementById('prevMonth').addEventListener('click', function() {
                currentDate.setMonth(currentDate.getMonth() - 1);
                renderCalendar();
            });
            
            document.getElementById('nextMonth').addEventListener('click', function() {
                currentDate.setMonth(currentDate.getMonth() + 1);
                renderCalendar();
            });
            
            // Today button
            document.getElementById('todayButton').addEventListener('click', function() {
                currentDate = new Date();
                selectedDate = new Date();
                renderCalendar();
                renderBookingList();
            });
        });
    </script>