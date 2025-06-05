@extends('layouts.app')

@section('content')
<div class="container-fluid bg-[#12131A] text-white rounded-lg shadow-sm p-6 h-[calc(100vh-130px)] w-full max-w-6xl mx-auto overflow-hidden">
    <div class="h-full overflow-y-auto pr-2 custom-scrollbar">
        <!-- Profile Information Section -->
        <div class="mb-6">
            <div class="flex items-center mb-2">
                <div class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center mr-2">
                    <i class="bi bi-person-fill text-blue-600 text-sm"></i>
                </div>
                <h2 class="text-xl font-semibold">Profile Information</h2>
            </div>
            <p class="text-gray-400">Update your account's profile information and contact details.</p>
        </div>

        <div class="bg-[#1E1F25] rounded-lg p-6 border border-[#2B2C32] mb-8">
            <form action="#" method="POST" class="space-y-6">
                @csrf
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Full Name -->
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-300 mb-2">Full Name <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-person text-gray-400"></i>
                            </div>
                            <input type="text" id="name" name="name" value="Christopher Aldrinovito Andriawan" class="bg-[#12131A] border border-[#2B2C32] text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-300 mb-2">Email <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="email" name="email" value="alexzvito123@gmail.com" class="bg-[#12131A] border border-[#2B2C32] text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                        </div>
                    </div>
                </div>

                <!-- Save Button -->
                <div>
                    <button type="submit" class="flex items-center bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                        <i class="bi bi-check-lg mr-2"></i>
                        SAVE CHANGES
                    </button>
                </div>
            </form>
        </div>

        <!-- Update Password Section -->
        <div class="mb-6">
            <div class="flex items-center mb-2">
                <div class="w-6 h-6 rounded-full bg-blue-100 flex items-center justify-center mr-2">
                    <i class="bi bi-lock-fill text-blue-600 text-sm"></i>
                </div>
                <h2 class="text-xl font-semibold">Update Password</h2>
            </div>
            <p class="text-gray-400">Ensure your account is using a long, random password to stay secure.</p>
        </div>

        <div class="bg-[#1E1F25] rounded-lg p-6 border border-[#2B2C32] mb-8">
            <form action="#" method="POST" class="space-y-6">
                @csrf
                
                <!-- Current Password -->
                <div>
                    <label for="current_password" class="block text-sm font-medium text-gray-300 mb-2">Current Password <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="bi bi-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="current_password" name="current_password" placeholder="Enter current password" class="bg-[#12131A] border border-[#2B2C32] text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                    </div>
                </div>

                <!-- New Password -->
                <div>
                    <label for="new_password" class="block text-sm font-medium text-gray-300 mb-2">New Password <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="bi bi-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="new_password" name="new_password" placeholder="Enter new password" class="bg-[#12131A] border border-[#2B2C32] text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                    </div>
                    <p class="mt-1 text-xs text-gray-400">Minimum 8 characters, with at least one uppercase, one lowercase, one number and one special character.</p>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="confirm_password" class="block text-sm font-medium text-gray-300 mb-2">Confirm Password <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="bi bi-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm new password" class="bg-[#12131A] border border-[#2B2C32] text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                    </div>
                </div>

                <!-- Update Password Button -->
                <div>
                    <button type="submit" class="flex items-center bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                        <i class="bi bi-check-lg mr-2"></i>
                        UPDATE PASSWORD
                    </button>
                </div>
            </form>
        </div>

        <!-- Delete Account Section -->
        <div class="mb-6">
            <div class="flex items-center mb-2">
                <div class="w-6 h-6 rounded-full bg-red-100 flex items-center justify-center mr-2">
                    <i class="bi bi-exclamation-triangle-fill text-red-600 text-sm"></i>
                </div>
                <h2 class="text-xl font-semibold">Delete Account</h2>
            </div>
            <p class="text-gray-400">Once your account is deleted, all of its resources and data will be permanently deleted.</p>
            <p class="text-gray-400">Before deleting your account, please download any data or information that you wish to retain.</p>
        </div>

        <div class="bg-[#1E1F25] rounded-lg p-6 border border-[#2B2C32]">
            <form action="#" method="POST">
                @csrf
                @method('DELETE')
                
                <!-- Delete Account Button -->
                <button type="submit" class="flex items-center bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                    <i class="bi bi-trash mr-2"></i>
                    DELETE ACCOUNT
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Tambahkan CSS untuk custom scrollbar -->
<style>
    /* Styling untuk scrollbar */
    .custom-scrollbar::-webkit-scrollbar {
        width: 8px;
        height: 8px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-track {
        background: #12131A;
        border-radius: 4px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #2B2C32;
        border-radius: 4px;
    }
    
    .custom-scrollbar::-webkit-scrollbar-thumb:hover {
        background: #3E3F46;
    }
    
    /* Pastikan halaman utama tidak memiliki scrollbar */
    body {
        overflow: hidden;
    }
</style>

<!-- Tambahkan Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endsection