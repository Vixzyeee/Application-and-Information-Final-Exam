<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="app-url" content="{{ url('/') }}">
    <title>Dashboard</title>
    <!-- Tailwind CSS -->
    <link href="https://fonts.cdnfonts.com/css/montserrat" rel="stylesheet">
    <link href="https://fonts.cdnfonts.com/css/nico-moji" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Patua+One&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-[#05060F] overflow-hidden">
<style>
        ::-webkit-scrollbar {
        width: 5px;
        height: 3px;
        }
        ::-webkit-scrollbar-thumb {
        background: #EBEBEB;
        border-radius: 3px;
        }
        ::-webkit-scrollbar-track {
        background: transparent; /* Gunakan transparan alih-alih none */
        margin: 15px 0; /* Tambahkan margin di track */
        }
</style>
<!-- Sidebar -->
<aside class="fixed top-4 left-4 z-50 w-[70px] h-[calc(100vh-2rem)] transition-all duration-300 transform -translate-x-full bg-[#12131A] rounded-2xl shadow-sm">
    <!-- Sidebar Content -->
    <div class="h-full px-[15px] py-[11px] overflow-y-auto overflow-x-hidden relative">
        <ul class="space-y-4 font-medium">
            <!-- Logo/Brand Button -->
            <li>
                <a href="#" class="layout-toggle flex items-center p-2 text-[#EBEBEB] rounded-lg hover:bg-[#2B2C32] pl-6 transform hover:scale-110 transition-transform duration-300">
                <i class="bi bi-layout-split text-[24px]"></i>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-[#EBEBEB] rounded-lg hover:bg-[#2B2C32] pl-6 transform hover:scale-110 transition-transform duration-300">
                    <i class="bi bi-columns-gap text-[24px]"></i>
                    <span class="ml-3 font-normal hidden">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('teachers.index') }}" class="flex items-center p-2 text-[#EBEBEB] rounded-lg hover:bg-[#2B2C32] pl-6 transform hover:scale-110 transition-transform duration-300">
                    <i class="bi bi-person text-[24px]"></i>
                    <span class="ml-3 font-normal hidden">Teachers</span>
                </a>
            </li>
            <li>
                <a href="{{ route('students') }}" class="flex items-center p-2 text-[#EBEBEB] rounded-lg hover:bg-[#2B2C32] pl-6 transform hover:scale-110 transition-transform duration-300">
                    <i class="bi bi-people text-[24px]"></i>
                    <span class="ml-3 font-normal hidden">Students</span>
                </a>
            </li>
        </ul>
        <!-- Bottom Menu -->
        <ul class="space-y-4 font-medium absolute bottom-8 left-4 right-4 transition-all duration-300">
            <li>
                <a href="{{ route('profile') }}" class="flex items-center p-2 text-[#EBEBEB] rounded-lg hover:bg-[#2B2C32] pl-6 transform hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-person-circle text-[24px]"></i>
                    <span class="ml-3 font-normal hidden">Profile</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-[#EBEBEB] rounded-lg hover:bg-[#2B2C32] pl-6 transform hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-box-arrow-left text-[24px]"></i>
                    <span class="ml-3 font-normal hidden">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
<!-- Navbar -->
<nav class="fixed top-4 right-4 left-4 sm:left-[110px] h-[70px] bg-[#12131A] shadow-sm transition-all duration-300 ease-in-out rounded-2xl mb-4">
    <div class="container-fluid h-full">
        <div class="flex items-center justify-between h-full px-6 max-md:px-6 max-sm:px-6">
            <!-- Bagian Kiri -->
            <div class="flex items-center max-md:w-full max-md:h-full max-md:justify-center max-sm:w-full max-sm:h-full max-sm:justify-center">
                <button class="sidebar-toggle p-1 sm:-ml-6 text-[#EBEBEB] hover:bg-[#2B2C32] rounded-lg transform hover:scale-110 transition-transform duration-300">
                    <i class="bi bi-list text-[24px]"></i>
                </button>
            </div>

            <!-- Bagian Tengah -->
            <div class="flex-1 sm:block hidden"></div>

            <!-- Bagian Kanan -->
            <div class="flex items-center space-x-6 sm:block hidden">
                <h2 class="text-xl font-semibold text-[#EBEBEB] transform hover:scale-110 transition-transform duration-300" style="font-family: 'Patua One', cursive; font-size: 20px;">X Academy</h2>
            </div>
        </div>
    </div>
</nav>
<!-- Main Content -->
<main class="ml-[100px] mr-10 mt-28 text-[#EBEBEB]">
    @yield('content')
</main>
<script src="{{ asset('js/app.blade.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
<script src="{{ asset('js/schedule.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>
</html>