<!-- Desktop Navbar -->
<nav class="hidden md:block bg-primary text-white shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo dan Brand -->
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-4">
                    <div class="w-12 h-12 bg-white rounded-lg flex items-center justify-center">
                        <img src="/images/USD500.png" alt="USD Logo">
                    </div>
                    <div class="flex flex-col">
                        <h1 class="text-xl font-bold text-white">Sistem Peminjaman</h1>
                        <p class="text-sm text-white/80">Laboratorium USD</p>
                    </div>
                </div>
            </div>

            <!-- Navigation Links -->
            <div class="flex space-x-1">
                <a href="{{ url('/') }}" 
                   class="nav-item {{ request()->is('/') ? 'active' : '' }} px-4 py-3 text-sm font-medium text-white rounded-lg flex items-center">
                    <i class="fas fa-home mr-2 w-5 text-center"></i>
                    Beranda
                </a>
                <a href="{{ url('/peminjaman') }}" 
                   class="nav-item {{ request()->is('peminjaman') ? 'active' : '' }} px-4 py-3 text-sm font-medium text-white/90 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200 flex items-center">
                    <i class="fas fa-calendar-alt mr-2 w-5 text-center"></i>
                    Peminjaman
                </a>
                <a href="{{ url('/laboratorium') }}" 
                   class="nav-item {{ request()->is('laboratorium') ? 'active' : '' }} px-4 py-3 text-sm font-medium text-white/90 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200 flex items-center">
                    <i class="fas fa-building mr-2 w-5 text-center"></i>
                    Laboratorium
                </a>
                <a href="{{ url('/riwayat') }}" 
                   class="nav-item {{ request()->is('riwayat') ? 'active' : '' }} px-4 py-3 text-sm font-medium text-white/90 hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200 flex items-center">
                    <i class="fas fa-history mr-2 w-5 text-center"></i>
                    Riwayat
                </a>
            </div>

            <!-- User Menu -->
            <div class="flex items-center space-x-4">
                <!-- Notifications -->
                <button class="relative p-2 text-white/90 hover:text-white rounded-lg hover:bg-white/10 transition-colors duration-200">
                    <i class="fas fa-bell"></i>
                    <span class="absolute top-1 right-1 w-2 h-2 bg-secondary rounded-full"></span>
                </button>
                
                <!-- User Profile -->
                <div class="relative group">
                    <button class="flex items-center space-x-3 text-sm font-medium text-white hover:text-white transition-colors duration-200">
                        <div class="w-10 h-10 bg-secondary rounded-full flex items-center justify-center">
                            <span class="text-white font-bold">A</span>
                        </div>
                        <div class="text-left hidden lg:block">
                            <p class="font-medium text-white">Admin</p>
                            <p class="text-xs text-white/80">Administrator</p>
                        </div>
                        <i class="fas fa-chevron-down text-xs text-white/70"></i>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform translate-y-1 group-hover:translate-y-0">
                        <div class="py-1">
                            <a href="{{ url('/profil') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                <i class="fas fa-user mr-3 w-4 text-center"></i>
                                Profil Saya
                            </a>
                            <a href="{{ url('/pengaturan') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-200">
                                <i class="fas fa-cog mr-3 w-4 text-center"></i>
                                Pengaturan
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <a href="#" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-50 transition-colors duration-200">
                                <i class="fas fa-sign-out-alt mr-3 w-4 text-center"></i>
                                Keluar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- Mobile Top Bar -->
<div class="md:hidden bg-primary text-white">
    <div class="flex items-center justify-between px-4 py-3">
        <div class="flex items-center space-x-3">
            <i class="fas fa-flask text-xl"></i>
            <span class="font-bold">LabBooking</span>
        </div>
        <button class="p-2" id="mobileMenuButton">
            <i class="fas fa-bars text-xl"></i>
        </button>
    </div>
</div>