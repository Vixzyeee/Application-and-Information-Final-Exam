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
                <h2 class="text-xl font-semibold">Admin Profile Information</h2>
            </div>
            <p class="text-gray-400">Update your admin account's profile information and contact details.</p>
        </div>

        <div class="bg-[#1E1F25] rounded-lg p-6 border border-[#2B2C32] mb-8">
            <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')
                
                <!-- Profile Photo -->
                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-300 mb-2">Profile Photo</label>
                    <div class="flex items-center">
                        <div class="mr-4">
                            @if(Auth::guard('admin')->user()->admin_photo)
                                <img src="{{ asset('storage/' . Auth::guard('admin')->user()->admin_photo) }}" alt="Profile Photo" class="w-24 h-24 rounded-full object-cover border-2 border-gray-600">
                            @else
                                <div class="w-24 h-24 rounded-full bg-gray-600 flex items-center justify-center">
                                    <i class="bi bi-person-fill text-gray-300 text-4xl"></i>
                                </div>
                            @endif
                        </div>
                        <div>
                            <label for="admin_photo" class="cursor-pointer bg-gray-700 hover:bg-gray-600 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out inline-block">
                                <i class="bi bi-upload mr-2"></i>
                                Change Photo
                            </label>
                            <input type="file" id="admin_photo" name="admin_photo" class="hidden" accept="image/*">
                            <p class="text-xs text-gray-400 mt-1">Allowed JPG, PNG. Max size of 2MB</p>
                        </div>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Admin Name -->
                    <div>
                        <label for="admin_name" class="block text-sm font-medium text-gray-300 mb-2">Full Name <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-person text-gray-400"></i>
                            </div>
                            <input type="text" id="admin_name" name="admin_name" value="{{ Auth::guard('admin')->user()->admin_name }}" class="bg-[#12131A] border border-[#2B2C32] text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                        </div>
                    </div>

                    <!-- Admin Email -->
                    <div>
                        <label for="admin_email" class="block text-sm font-medium text-gray-300 mb-2">Email <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-envelope text-gray-400"></i>
                            </div>
                            <input type="email" id="admin_email" name="admin_email" value="{{ Auth::guard('admin')->user()->admin_email }}" class="bg-[#12131A] border border-[#2B2C32] text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
                        </div>
                    </div>
                    
                    <!-- Admin Phone -->
                    <div>
                        <label for="admin_phone" class="block text-sm font-medium text-gray-300 mb-2">Phone Number <span class="text-red-500">*</span></label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="bi bi-telephone text-gray-400"></i>
                            </div>
                            <input type="text" id="admin_phone" name="admin_phone" value="{{ Auth::guard('admin')->user()->admin_phone }}" class="bg-[#12131A] border border-[#2B2C32] text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
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
            <form action="{{ route('admin.password.update') }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')
                
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
                    <label for="new_password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">Confirm Password <span class="text-red-500">*</span></label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="bi bi-lock text-gray-400"></i>
                        </div>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation" placeholder="Confirm new password" class="bg-[#12131A] border border-[#2B2C32] text-white text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" required>
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
            <form action="{{ route('admin.profile.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                
                <!-- Delete Account Button -->
                <button type="button" onclick="confirmDelete()" class="flex items-center bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out">
                    <i class="bi bi-trash mr-2"></i>
                    DELETE ACCOUNT
                </button>
                
                <!-- Confirmation Modal (Hidden by default) -->
                <div id="deleteConfirmModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center">
                    <div class="bg-[#1E1F25] rounded-lg p-6 max-w-md w-full mx-4">
                        <h3 class="text-xl font-semibold mb-4">Confirm Account Deletion</h3>
                        <p class="text-gray-300 mb-4">Are you sure you want to delete your account? This action cannot be undone.</p>
                        <div class="flex justify-end space-x-3">
                            <button type="button" onclick="closeModal()" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-lg">
                                Cancel
                            </button>
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-medium py-2 px-4 rounded-lg">
                                Yes, Delete Account
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Styling for scrollbar and modal functionality -->
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

<script>
    // Preview uploaded image
    document.getElementById('admin_photo').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const preview = document.querySelector('img') || document.createElement('img');
                preview.src = e.target.result;
                preview.classList = 'w-24 h-24 rounded-full object-cover border-2 border-gray-600';
                
                const iconContainer = document.querySelector('.w-24.h-24.rounded-full.bg-gray-600');
                if (iconContainer) {
                    iconContainer.parentNode.replaceChild(preview, iconContainer);
                }
            }
            reader.readAsDataURL(file);
        }
    });
    
    // Modal functions
    function confirmDelete() {
        document.getElementById('deleteConfirmModal').classList.remove('hidden');
    }
    
    function closeModal() {
        document.getElementById('deleteConfirmModal').classList.add('hidden');
    }
</script>
@endsection 