<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Halaman Tidak Ditemukan</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" href="{{ asset('images/logo/USD500.png') }}">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#800000',
                        secondary: '#E0862F',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 text-center">
            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <div class="w-16 h-16 bg-white rounded-lg shadow-md flex items-center justify-center">
                    <img src="{{ asset('images/USD500.png') }}" alt="USD Logo" class="w-12 h-12">
                </div>
            </div>

            <!-- Error Content -->
            <div class="bg-white p-8 rounded-2xl shadow-lg border border-gray-100">
                <!-- Icon -->
                <div class="mx-auto w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mb-6">
                    <i class="fas fa-exclamation-triangle text-red-600 text-2xl"></i>
                </div>

                <!-- Error Code -->
                <div class="text-6xl font-bold text-gray-300 mb-2">404</div>

                <!-- Title -->
                <h1 class="text-2xl font-bold text-gray-900 mb-4">Halaman Tidak Ditemukan</h1>

                <!-- Message -->
                <p class="text-gray-600 mb-8 leading-relaxed">
                    Maaf, laboratorium digital yang Anda cari tidak dapat ditemukan.
                    Mungkin halaman telah dipindahkan atau dihapus.
                </p>

                <!-- Action Buttons -->
                <div class="space-y-4">
                    <a href="{{ url('/') }}"
                        class="w-full flex justify-center items-center px-6 py-3 bg-primary hover:bg-primary/90 text-white font-medium rounded-lg transition-colors duration-200 shadow-md hover:shadow-lg">
                        <i class="fas fa-home mr-2"></i>
                        Kembali ke Beranda
                    </a>

                    <a href="{{ url()->previous() }}"
                        class="w-full flex justify-center items-center px-6 py-3 border border-gray-300 text-gray-700 bg-white hover:bg-gray-50 font-medium rounded-lg transition-colors duration-200">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali Sebelumnya
                    </a>
                </div>

                <!-- Quick Links -->
                <div class="pt-6 mt-6 border-t border-gray-200">
                    <p class="text-sm text-gray-500 mb-4">Akses Cepat:</p>
                    <div class="flex justify-center space-x-6">
                        <a href="{{ url('/peminjaman') }}"
                            class="text-primary hover:text-primary/80 text-sm font-medium">
                            <i class="fas fa-calendar-alt mr-1"></i>
                            Peminjaman
                        </a>
                        <a href="{{ url('/laboratorium') }}"
                            class="text-primary hover:text-primary/80 text-sm font-medium">
                            <i class="fas fa-building mr-1"></i>
                            Laboratorium
                        </a>
                        <a href="{{ url('/riwayat') }}" class="text-primary hover:text-primary/80 text-sm font-medium">
                            <i class="fas fa-history mr-1"></i>
                            Riwayat
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center text-gray-500 text-sm">
                <p>Sistem Peminjaman Laboratorium USD &copy; {{ date('Y') }}</p>
            </div>
        </div>
    </div>
</body>

</html>