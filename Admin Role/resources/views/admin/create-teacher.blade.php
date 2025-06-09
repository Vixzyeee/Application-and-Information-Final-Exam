@extends('layouts.app')

@section('content')
<div class="container-fluid bg-[#12131A] ml-[10px] mt-[-10px] text-white rounded-lg shadow-sm p-4 h-[calc(100vh-120px)] w-[calc(100%+15px)] overflow-visible">
    <div class="h-full pr-2 pl-2">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-lg bg-[#17181F] transform hover:scale-125 transition-transform duration-300 flex items-center justify-center mr-2">
                    <i class="bi bi-person-plus-fill text-[#EFEFEF] text-2xl"></i>
                </div>
                <h2 class="text-xl text-[#EFEFEF] font-semibold px-3 py-1 bg-[#12131A] text-white rounded-md transform hover:scale-110 transition-transform duration-300">Create Teacher Account</h2>
            </div>
        </div>
        
        <!-- Form Card -->
        <div class="bg-[#1E1F25] rounded-lg overflow-hidden p-6 max-w-3xl mx-auto">
            @if ($errors->any())
                <div class="bg-red-900 border border-red-800 text-red-100 px-4 py-3 rounded relative mb-4" role="alert">
                    <ul class="list-disc pl-5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-900 border border-green-800 text-green-100 px-4 py-3 rounded relative mb-4" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-900 border border-red-800 text-red-100 px-4 py-3 rounded relative mb-4" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('admin.teachers.create') }}" method="POST" class="space-y-6">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div>
                        <label for="teacher_name" class="block text-sm font-medium text-gray-300 mb-1">Full Name <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-person text-gray-400"></i>
                            </div>
                            <input type="text" id="teacher_name" name="teacher_name" value="{{ old('teacher_name') }}" required 
                                class="bg-[#12131A] border border-[#2B2C32] text-[#EFEFEF] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" 
                                placeholder="Full name">
                        </div>
                    </div>
                    
                    <!-- Email Address -->
                    <div>
                        <label for="teacher_email" class="block text-sm font-medium text-gray-300 mb-1">Email Address <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="teacher_email" name="teacher_email" value="{{ old('teacher_email') }}" required 
                                class="bg-[#12131A] border border-[#2B2C32] text-[#EFEFEF] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" 
                                placeholder="Email address">
                        </div>
                    </div>
                    
                    <!-- Phone Number -->
                    <div>
                        <label for="teacher_phone" class="block text-sm font-medium text-gray-300 mb-1">Phone Number <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-telephone text-gray-400"></i>
                            </div>
                            <input type="text" id="teacher_phone" name="teacher_phone" value="{{ old('teacher_phone') }}" required pattern="08[0-9]{9,11}"
                                class="bg-[#12131A] border border-[#2B2C32] text-[#EFEFEF] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" 
                                placeholder="e.g. 081234567890">
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Format: 08 followed by 9-11 digits</p>
                    </div>
                    
                    <!-- Password -->
                    <div>
                        <label for="teacher_password" class="block text-sm font-medium text-gray-300 mb-1">Password <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-lock text-gray-400"></i>
                            </div>
                            <input type="password" id="teacher_password" name="teacher_password" required minlength="8"
                                class="bg-[#12131A] border border-[#2B2C32] text-[#EFEFEF] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" 
                                placeholder="Password">
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Minimum 8 characters</p>
                    </div>
                    
                    <!-- Confirm Password -->
                    <div>
                        <label for="teacher_password_confirmation" class="block text-sm font-medium text-gray-300 mb-1">Confirm Password <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-lock-fill text-gray-400"></i>
                            </div>
                            <input type="password" id="teacher_password_confirmation" name="teacher_password_confirmation" required minlength="8"
                                class="bg-[#12131A] border border-[#2B2C32] text-[#EFEFEF] text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" 
                                placeholder="Confirm password">
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-6">
                    <button type="submit" 
                            class="group relative flex justify-center py-2 px-8 border border-transparent 
                            text-sm font-medium rounded-lg text-white bg-blue-600 hover:bg-blue-700 
                            focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition duration-150 ease-in-out">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <i class="bi bi-person-plus-fill"></i>
                        </span>
                        Create Teacher Account
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection 