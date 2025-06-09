<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body class="bg-[#05060F] flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md p-8 space-y-8 bg-[#12131A] rounded-lg shadow-md">
        <div class="text-center">
            <div class="flex justify-center mb-4">
                <div class="w-16 h-16 rounded-full bg-[#1E1F25] flex items-center justify-center">
                    <i class="bi bi-person-fill text-[#EFEFEF] text-3xl"></i>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-[#EFEFEF]">Login</h1>
            <p class="mt-2 text-sm text-gray-400">Sign in to your account</p>
        </div>

        @if (session('success'))
            <div class="bg-green-900 border border-green-800 text-green-100 px-4 py-3 rounded relative mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-red-900 border border-red-800 text-red-100 px-4 py-3 rounded relative mb-4" role="alert">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="bi bi-envelope text-gray-400"></i>
                        </div>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required 
                               class="bg-[#1E1F25] border border-[#2B2C32] text-[#EFEFEF] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" 
                               placeholder="Email address">
                    </div>
                </div>
                
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-1">Password</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="bi bi-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="password" name="password" required 
                               class="bg-[#1E1F25] border border-[#2B2C32] text-[#EFEFEF] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" 
                               placeholder="Password">
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember" name="remember" type="checkbox" 
                           class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-300">
                        Remember me
                    </label>
                </div>
            </div>

            <div>
                <button type="submit" 
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent 
                        text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 
                        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="bi bi-lock-fill"></i>
                    </span>
                    Sign in
                </button>
            </div>
        </form>
        
        <div class="text-center mt-4">
            <p class="text-sm text-gray-400">
                Don't have an account? 
                <a href="{{ route('teachers.register') }}" class="font-medium text-blue-400 hover:text-blue-300">
                    Register as Teacher
                </a>
            </p>
            <p class="text-sm text-gray-400 mt-2">
                <a href="{{ route('admin.login') }}" class="font-medium text-blue-400 hover:text-blue-300">
                    Login as Admin
                </a>
            </p>
        </div>
    </div>
</body>
</html> 