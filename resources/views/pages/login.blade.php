<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Peminjaman Laboratorium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#800000',
                        secondary: '#E0862F',
                        white: '#FFFFFF'
                    }
                }
            }
        }
    </script>
    <style>
        .login-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #800000 0%, #600000 100%);
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .floating-label {
            transition: all 0.3s ease;
            pointer-events: none;
        }

        .input-field:focus+.floating-label,
        .input-field:not(:placeholder-shown)+.floating-label {
            transform: translateY(-24px) scale(0.85);
            color: #800000;
        }

        .btn-primary {
            background: linear-gradient(135deg, #800000 0%, #600000 100%);
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(128, 0, 0, 0.3);
        }

        .pulse-animation {
            animation: pulse 2s infinite;
        }
    </style>
</head>

<body class="login-container flex items-center justify-center p-4">
    <div class="container mx-auto max-w-6xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <!-- Left Side - Branding & Info -->
            <div class="text-white text-center lg:text-left">
                <div class="mb-8 pulse-animation">
                    <div
                        class="w-32 h-32 bg-white rounded-2xl flex items-center justify-center mx-auto lg:mx-0 shadow-lg">
                        <img src="{{ asset('images/USD500.png') }}" alt="Logo USD" class="w-24 h-24 object-contain">
                    </div>
                </div>

                <h1 class="text-4xl lg:text-5xl font-bold mb-4">
                    Sistem Peminjaman <br>Laboratorium
                </h1>
                <p class="text-xl mb-6 text-white/90">
                    Universitas Sanata Dharma
                </p>

                <div class="space-y-4 mt-8">
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center mr-4">
                            <i class="fas fa-calendar-check text-white"></i>
                        </div>
                        <p class="text-white/90">Kelola jadwal peminjaman laboratorium dengan mudah</p>
                    </div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center mr-4">
                            <i class="fas fa-building text-white"></i>
                        </div>
                        <p class="text-white/90">Akses informasi lengkap semua laboratorium</p>
                    </div>
                    <div class="flex items-center">
                        <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center mr-4">
                            <i class="fas fa-history text-white"></i>
                        </div>
                        <p class="text-white/90">Pantau riwayat peminjaman Anda</p>
                    </div>
                </div>

                <div class="mt-12 border-t border-white/20 pt-6">
                    <p class="text-white/70 text-sm">
                        &copy; 2025 Kelompok 3 Proyek Informatika. All rights reserved.
                    </p>
                </div>
            </div>

            <!-- Right Side - Login Form -->
            <div class="login-card p-8 lg:p-12">
                <div class="text-center mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 mb-2">Masuk ke Akun Anda</h2>
                    <p class="text-gray-600">Silakan masuk dengan username dan password Anda</p>
                </div>

                <form id="loginForm" class="space-y-6" action="{{ route("login.post") }}" method="POST">
                    @csrf
                    <!-- Username Field -->
                    <div class="relative">
                        <input type="text" id="username" name="username"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300"
                            placeholder=" " autocomplete="username" required>
                        <label for="username" class="floating-label absolute left-4 top-3 text-gray-500 bg-white px-1">
                            <i class="fas fa-user mr-2"></i>Username
                        </label>
                    </div>

                    <!-- Password Field -->
                    <div class="relative">
                        <input type="password" id="password" name="password"
                            class="input-field w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all duration-300"
                            placeholder=" " autocomplete="current-password" required>
                        <label for="password" class="floating-label absolute left-4 top-3 text-gray-500 bg-white px-1">
                            <i class="fas fa-lock mr-2"></i>Password
                        </label>
                        <button type="button" id="togglePassword"
                            class="absolute right-4 top-3 text-gray-500 hover:text-gray-700">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <input type="checkbox" id="remember"
                                class="w-4 h-4 text-primary focus:ring-primary border-gray-300 rounded">
                            <label for="remember" class="ml-2 text-sm text-gray-700">Ingat saya</label>
                        </div>
                        <a href="#" class="text-sm text-primary hover:text-primary-dark transition-colors duration-200">
                            Lupa password?
                        </a>
                    </div>

                    <!-- Login Button -->
                    <button type="submit"
                        class="btn-primary w-full py-3 text-white font-semibold rounded-lg flex items-center justify-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Masuk
                    </button>

                    <!-- Error Message -->
                    <div id="errorMessage"
                        class="hidden bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle mr-2"></i>
                            <span id="errorText">Username atau password salah. Silakan coba lagi.</span>
                        </div>
                    </div>
                </form>
                <!-- Quick Demo Info -->
                <div class="mt-8 bg-amber-50 border border-amber-200 rounded-lg p-4">
                    <div class="flex items-start">
                        <i class="fas fa-clock text-amber-500 mt-1 mr-3"></i>
                        <div>
                            <h4 class="font-semibold text-amber-800 text-sm">Jam Operasional</h4>
                            <p class="text-amber-700 text-sm mt-1">
                                Sistem dapat diakses 24/7. Peminjaman laboratorium diproses
                                pada hari kerja Senin-Jumat pukul 08.00-16.00 WIB.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
        <div class="bg-white rounded-lg p-6 flex flex-col items-center">
            <div class="w-12 h-12 border-4 border-primary border-t-transparent rounded-full animate-spin mb-4"></div>
            <p class="text-gray-700">Memproses login...</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Toggle password visibility
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });

            // Form submission
            // const loginForm = document.getElementById('loginForm');
            // const errorMessage = document.getElementById('errorMessage');
            // const loadingOverlay = document.getElementById('loadingOverlay');

            // loginForm.addEventListener('submit', function (e) {
            //     e.preventDefault();

            //     const username = document.getElementById('username').value;
            //     const password = document.getElementById('password').value;

            //     // Simple validation
            //     if (!username || !password) {
            //         showError('Harap isi username dan password.');
            //         return;
            //     }

            //     // Show loading
            //     loadingOverlay.classList.remove('hidden');

            //     // Simulate API call
            //     setTimeout(() => {
            //         loadingOverlay.classList.add('hidden');

            //         // Demo credentials
            //         if ((username === 'admin' && password === 'admin123') ||
            //             (username === 'dosen' && password === 'dosen123') ||
            //             (username === 'mahasiswa' && password === 'mahasiswa123')) {
            //             // Successful login - redirect based on role
            //             let redirectPage = 'beranda.html';

            //             if (username === 'admin') {
            //                 localStorage.setItem('userRole', 'admin');
            //                 localStorage.setItem('userName', 'Administrator');
            //             } else if (username === 'dosen') {
            //                 localStorage.setItem('userRole', 'dosen');
            //                 localStorage.setItem('userName', 'Dr. Ahmad Wijaya');
            //                 redirectPage = 'peminjaman.html';
            //             } else if (username === 'mahasiswa') {
            //                 localStorage.setItem('userRole', 'mahasiswa');
            //                 localStorage.setItem('userName', 'Budi Santoso');
            //                 redirectPage = 'laboratorium.html';
            //             }

            //             // Store login time
            //             localStorage.setItem('loginTime', new Date().toISOString());

            //             // Redirect to appropriate page
            //             window.location.href = redirectPage;
            //         } else {
            //             showError('Username atau password salah. Silakan coba lagi.');
            //         }
            //     }, 1500);
            // });

            // function showError(message) {
            //     document.getElementById('errorText').textContent = message;
            //     errorMessage.classList.remove('hidden');

            //     // Auto hide error after 5 seconds
            //     setTimeout(() => {
            //         errorMessage.classList.add('hidden');
            //     }, 5000);
            // }

            // // Add floating label functionality
            // const inputFields = document.querySelectorAll('.input-field');
            // inputFields.forEach(input => {
            //     input.addEventListener('focus', function () {
            //         this.parentElement.classList.add('focused');
            //     });

            //     input.addEventListener('blur', function () {
            //         if (!this.value) {
            //             this.parentElement.classList.remove('focused');
            //         }
            //     });

            //     // Check on page load if inputs have values
            //     if (input.value) {
            //         input.parentElement.classList.add('focused');
            //     }
            // });

            // // Auto-fill demo credentials for testing
            // const urlParams = new URLSearchParams(window.location.search);
            // const demo = urlParams.get('demo');

            // if (demo === 'admin') {
            //     document.getElementById('username').value = 'admin';
            //     document.getElementById('password').value = 'admin123';
            // } else if (demo === 'dosen') {
            //     document.getElementById('username').value = 'dosen';
            //     document.getElementById('password').value = 'dosen123';
            // } else if (demo === 'mahasiswa') {
            //     document.getElementById('username').value = 'mahasiswa';
            //     document.getElementById('password').value = 'mahasiswa123';
            // }

            // // Check if user is already logged in
            // if (localStorage.getItem('userRole')) {
            //     // User is already logged in, redirect to appropriate page
            //     let redirectPage = 'beranda.html';
            //     const userRole = localStorage.getItem('userRole');

            //     if (userRole === 'dosen') {
            //         redirectPage = 'peminjaman.html';
            //     } else if (userRole === 'mahasiswa') {
            //         redirectPage = 'laboratorium.html';
            //     }

            //     // Show message and redirect
            //     setTimeout(() => {
            //         window.location.href = redirectPage;
            //     }, 1000);
            // }
        });
    </script>
</body>

</html>