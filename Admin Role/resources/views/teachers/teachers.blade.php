@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="app-url" content="{{ url('/') }}">
<div class="container-fluid bg-[#12131A] ml-[10px] mt-[-10px] text-white rounded-lg shadow-sm p-4 h-[calc(100vh-120px)] w-[calc(100%+15px)] overflow-visible">
    <div class="h-full pr-2 pl-2">
        <!-- Header Section -->
        <div class="flex justify-between items-center mb-4">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-lg bg-[#17181F] transform hover:scale-125 transition-transform duration-300 flex items-center justify-center mr-2">
                    <i class="bi bi-person-fill text-[#EFEFEF] text-2xl"></i>
                </div>
                <h2 class="text-xl text-[#EFEFEF] font-semibold px-3 py-1 bg-[#12131A] text-white rounded-md transform hover:scale-110 transition-transform duration-300">Teachers</h2>
            </div>
            
            <div class="flex items-center space-x-4">
                <!-- Search Bar -->
                <div class="relative">
                    <div class="flex items-center bg-[#1E1F25] rounded-lg px-2 mr-3 py-2 transform hover:scale-110 transition-transform duration-300">
                        <i class="bi bi-search text-[#9CA3AF] mr-4"></i>
                        <input type="text" id="searchInput" placeholder="Search..." class="bg-transparent border-none focus:border-none focus:ring-0 focus:outline-none text-md w-64 text-white">
                    </div>
                </div>
                
                <!-- Add Teacher Button -->
                <button onclick="openAddModal()" class="flex items-center bg-blue-600 hover:bg-blue-700 text-md text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out transform hover:scale-110 transition-transform duration-300">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Add Teacher
                </button>
            </div>
        </div>
        
        <!-- Teachers Table -->
        <div class="bg-[#1E1F25] rounded-lg overflow-hidden p-0">
            <table class="w-full table-fixed divide-y divide-gray-700 border-separate border-spacing-x-0">
                <thead class="bg-[#17181F]">
                    <tr>
                        <th class="w-1/7 px-3 py-3 text-center align-middle text-sm font-medium text-[#EFEFEF]">
                            <div class="flex align-left">
                                User Name
                            </div>
                        </th>
                        <th class="w-1/7 px-3 py-3 text-center align-middle text-sm font-medium text-[#EFEFEF]">
                            <div class="flex align-left">
                                Specialization
                            </div>
                        </th>
                        <th class="w-1/7 px-3 py-3 text-center align-middle text-sm font-medium text-[#EFEFEF]">
                            <div class="flex align-left">
                                Email
                            </div>
                        </th>
                        <th class="w-[150px] px-3 py-3 text-center align-middle text-sm font-medium text-[#EFEFEF]">
                            <div class="flex align-left">
                                Actions
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-[#1E1F25] divide-y divide-gray-700" id="teachersTableBody">
                    @include('teachers.table-body')
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="fixed bottom-0 right-0 left-0 mb-[30px] px-8">
            <div id="paginationContainer" class="flex justify-between items-center">
                @include('teachers.pagination')
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Teacher -->
<div id="editTeacherModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transform transition-opacity duration-300 opacity-0 invisible">
    <div class="bg-[#1A1B23] text-white rounded-lg shadow-xl w-full max-w-md transform transition-all duration-300 scale-90 translate-y-4">
        <!-- Modal Header -->
        <div class="flex items-center justify-between px-4 pt-4">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-lg bg-[#12131A] transform hover:scale-125 transition-transform duration-300 flex items-center justify-center mr-2">
                    <i class="bi bi-person-fill text-[#EFEFEF] text-2xl"></i>
                </div>
                <h2 class="text-xl text-[#EFEFEF] font-semibold px-2 py-1 bg-[#1A1B23] text-white rounded-md transform hover:scale-110 transition-transform duration-300">Teachers Edit</h2>
            </div>
            <button id="closeEditModal" class="text-gray-400 hover:text-white focus:outline-none transform hover:scale-110 transition-transform duration-300">
                <i class="bi bi-x-lg text-2xl"></i>
            </button>
        </div>
        
        <!-- Modal Body -->
        <div class="px-4 py-4">
            <form id="editTeacherForm" action="{{ route('teachers.update', ['teacher' => ':teacher']) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Name</label>
                    <input type="text" name="teacher_name" id="edit_name" required class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">NIK</label>
                    <input type="text" name="teacher_nik" id="edit_nik" required pattern="TCH\d{8}" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Specialization</label>
                    <input type="text" name="teacher_specialization" id="edit_specialization" required class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Position</label>
                    <input type="text" name="teacher_position" id="edit_position" required class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Email</label>
                    <input type="email" name="teacher_email" id="edit_email" required class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Phone Number</label>
                    <input type="text" name="teacher_phone" id="edit_phone" required pattern="08[0-9]{9,11}" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Photo</label>
                    <div class="flex items-center px-3 py-2 bg-[#12131A] rounded-md transform hover:scale-110 transition-transform duration-300">
                        <div class="flex items-center space-x-2">
                            <button type="button" id="chooseFileBtn" class="bg-[#1E1F25] text-sm px-3 py-1 rounded-md hover:bg-[#1E1F25]">Choose File</button>
                            <span id="fileChosen" class="text-sm text-gray-400">No File Chosen</span>
                            <input type="file" name="teacher_photo" id="edit_photo" class="hidden" accept="image/*">
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-center pt-[10px]">
                    <button type="submit" class="block text-sm font-medium rounded-md transform hover:scale-125 transition-transform duration-300 origin-center inline-block bg-[#4A659F] border-none px-1.5 py-1 cursor-pointer w-[120px]">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Add Teacher -->
<div id="addTeacherModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transform transition-opacity duration-300 opacity-0 invisible">
    <div class="bg-[#1A1B23] text-white rounded-lg shadow-xl w-full max-w-md transform transition-all duration-300 scale-90 translate-y-4">
        <!-- Modal Header -->
        <div class="flex items-center justify-between px-4 pt-4">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-lg bg-[#12131A] transform hover:scale-125 transition-transform duration-300 flex items-center justify-center mr-2">
                    <i class="bi bi-person-fill text-[#EFEFEF] text-2xl"></i>
                </div>
                <h2 class="text-xl text-[#EFEFEF] font-semibold px-2 py-1 bg-[#1A1B23] text-white rounded-md transform hover:scale-110 transition-transform duration-300">Add Teacher</h2>
            </div>
            <button id="closeAddModal" class="text-gray-400 hover:text-white focus:outline-none transform hover:scale-110 transition-transform duration-300">
                <i class="bi bi-x-lg text-2xl"></i>
            </button>
        </div>
        
        <!-- Modal Body -->
        <div class="px-4 py-4">
            <form id="addTeacherForm" action="{{ route('teachers.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Name</label>
                    <input type="text" name="teacher_name" id="add_name" required class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">NIK</label>
                    <input type="text" name="teacher_nik" id="add_nik" required pattern="TCH\d{8}" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Specialization</label>
                    <input type="text" name="teacher_specialization" id="add_specialization" required class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Position</label>
                    <input type="text" name="teacher_position" id="add_position" required class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Email</label>
                    <input type="email" name="teacher_email" id="add_email" required class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>

                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Password</label>
                    <input type="password" name="teacher_password" id="add_password" required minlength="8" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>

                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Confirm Password</label>
                    <input type="password" name="teacher_password_confirmation" id="add_password_confirmation" required minlength="8" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Phone Number</label>
                    <input type="text" name="teacher_phone" id="add_phone" required pattern="08[0-9]{9,11}" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Photo</label>
                    <div class="flex items-center px-3 py-2 bg-[#12131A] rounded-md transform hover:scale-110 transition-transform duration-300">
                        <div class="flex items-center space-x-2">
                            <button type="button" id="addChooseFileBtn" class="bg-[#1E1F25] text-sm px-3 py-1 rounded-md hover:bg-[#1E1F25]">Choose File</button>
                            <span id="addFileChosen" class="text-sm text-gray-400">No File Chosen</span>
                            <input type="file" name="teacher_photo" id="add_photo" class="hidden" accept="image/*">
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-center pt-[10px]">
                    <button type="submit" class="block text-sm font-medium rounded-md transform hover:scale-125 transition-transform duration-300 origin-center inline-block bg-[#4A659F] border-none px-1.5 py-1 cursor-pointer w-[120px]">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Profile Teacher Modal -->
<div id="profileTeacherModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transform transition-opacity duration-300 opacity-0 invisible">
    <div class="bg-[#1A1B23] text-white rounded-lg shadow-xl w-full max-w-md transform transition-all duration-300 scale-90 translate-y-4">
        <!-- Modal Header -->
        <div class="flex items-center justify-between px-4 pt-4">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-lg bg-[#12131A] transform hover:scale-125 transition-transform duration-300 flex items-center justify-center mr-2">
                    <i class="bi bi-person-fill text-[#EFEFEF] text-2xl"></i>
                </div>
                <h2 class="text-xl text-[#EFEFEF] font-semibold px-2 py-1 bg-[#1A1B23] text-white rounded-md transform hover:scale-110 transition-transform duration-300">Teacher Profile</h2>
            </div>
            <button id="closeProfileModal" class="text-gray-400 hover:text-white focus:outline-none transform hover:scale-110 transition-transform duration-300">
                <i class="bi bi-x-lg text-2xl"></i>
            </button>
        </div>
        
        <!-- Modal Body -->
        <div class="px-4 py-4">
            <div class="flex flex-col items-center mb-4">
                <div class="w-32 h-32 rounded-full overflow-hidden mb-4 bg-[#12131A]">
                    <img id="profilePhoto" class="w-full h-full object-cover" src="{{ asset('storage/images/teachers/default-avatar.jpg') }}" alt="Teacher Photo">
                </div>
                <h3 id="profileName" class="text-xl font-semibold mb-1"></h3>
                <p id="profilePosition" class="text-gray-400"></p>
            </div>
            
            <div class="space-y-3">
                <div class="flex items-center">
                    <i class="bi bi-person-badge text-lg mr-3"></i>
                    <div>
                        <p class="text-sm text-gray-400">NIK</p>
                        <p id="profileNik" class="text-sm"></p>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <i class="bi bi-book text-lg mr-3"></i>
                    <div>
                        <p class="text-sm text-gray-400">Specialization</p>
                        <p id="profileSpecialization" class="text-sm"></p>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <i class="bi bi-envelope text-lg mr-3"></i>
                    <div>
                        <p class="text-sm text-gray-400">Email</p>
                        <p id="profileEmail" class="text-sm"></p>
                    </div>
                </div>
                
                <div class="flex items-center">
                    <i class="bi bi-telephone text-lg mr-3"></i>
                    <div>
                        <p class="text-sm text-gray-400">Phone</p>
                        <p id="profilePhone" class="text-sm"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Change Password Modal -->
<div id="changePasswordModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transform transition-opacity duration-300 opacity-0 invisible">
    <div class="bg-[#1A1B23] text-white rounded-lg shadow-xl w-full max-w-md transform transition-all duration-300 scale-90 translate-y-4">
        <!-- Modal Header -->
        <div class="flex items-center justify-between px-4 pt-4">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-lg bg-[#12131A] transform hover:scale-125 transition-transform duration-300 flex items-center justify-center mr-2">
                    <i class="bi bi-key-fill text-[#EFEFEF] text-2xl"></i>
                </div>
                <h2 class="text-xl text-[#EFEFEF] font-semibold px-2 py-1 bg-[#1A1B23] text-white rounded-md transform hover:scale-110 transition-transform duration-300">Change Password</h2>
            </div>
            <button id="closeChangePasswordModal" class="text-gray-400 hover:text-white focus:outline-none transform hover:scale-110 transition-transform duration-300">
                <i class="bi bi-x-lg text-2xl"></i>
            </button>
        </div>
        
        <!-- Modal Body -->
        <div class="px-4 py-4">
            <form id="changePasswordForm" method="POST">
                @csrf
                <div class="mb-[10px]">
                    <label for="current_password" class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Current Password</label>
                    <input type="password" name="current_password" id="current_password" required class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label for="new_password" class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">New Password</label>
                    <input type="password" name="new_password" id="new_password" required minlength="8" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label for="new_password_confirmation" class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Confirm New Password</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" required minlength="8" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="flex justify-center pt-[10px]">
                    <button type="submit" class="block text-sm font-medium rounded-md transform hover:scale-125 transition-transform duration-300 origin-center inline-block bg-[#4A659F] border-none px-1.5 py-1 cursor-pointer w-[120px]">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript untuk Modal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const baseUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Edit Teacher Modal
        const editButtons = document.querySelectorAll('[data-action="edit"]');
        const editModal = document.getElementById('editTeacherModal');
        const editForm = document.getElementById('editTeacherForm');
        
        // Function to open edit modal
        window.openEditModal = function(teacherId) {
            // Update form action URL
            const actionUrl = editForm.getAttribute('action').replace(':teacher', teacherId);
            editForm.setAttribute('action', actionUrl);
            
            // Show modal
            editModal.classList.remove('invisible', 'opacity-0');
            setTimeout(() => {
                const modalContent = editModal.querySelector('.max-w-md');
                modalContent.classList.remove('scale-90', 'translate-y-4');
                modalContent.classList.add('scale-100', 'translate-y-0');
            }, 10);
            
            // Fetch teacher data
            fetch(`${baseUrl}/teachers/${teacherId}/edit`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    // Populate form fields
                    document.getElementById('edit_name').value = data.teacher_name;
                    document.getElementById('edit_nik').value = data.teacher_nik;
                    document.getElementById('edit_specialization').value = data.teacher_specialization;
                    document.getElementById('edit_position').value = data.teacher_position;
                    document.getElementById('edit_email').value = data.teacher_email;
                    document.getElementById('edit_phone').value = data.teacher_phone;
                    if (data.teacher_photo) {
                        document.getElementById('fileChosen').textContent = data.teacher_photo.split('/').pop();
                    }
                })
                .catch(error => {
                    console.error('Error fetching teacher data:', error);
                    alert('Error loading teacher data. Please try again.');
                });
        };
        
        // Close edit modal
        document.getElementById('closeEditModal').addEventListener('click', function() {
            const modalContent = editModal.querySelector('.max-w-md');
            modalContent.classList.remove('scale-100', 'translate-y-0');
            modalContent.classList.add('scale-90', 'translate-y-4');
            
            setTimeout(() => {
                editModal.classList.remove('opacity-100');
                editModal.classList.add('invisible', 'opacity-0');
            }, 300);
        });
        
        // File upload handling for edit form
        const editFileInput = document.getElementById('edit_photo');
        const editFileChosen = editModal.querySelector('#fileChosen');
        const editChooseFileBtn = editModal.querySelector('#chooseFileBtn');
        
        editChooseFileBtn.addEventListener('click', () => editFileInput.click());
        editFileInput.addEventListener('change', () => {
            editFileChosen.textContent = editFileInput.files[0]?.name || 'No file chosen';
        });
        
        // Handle edit form submission
        editForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            formData.append('_method', 'PUT'); // Add this for Laravel to recognize it as PUT request
            
            fetch(this.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                credentials: 'same-origin'
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(json => Promise.reject(json));
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    window.location.reload();
                } else {
                    alert(data.message || 'Error updating teacher');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                if (error.errors) {
                    // Show validation errors
                    const errorMessages = Object.values(error.errors).flat().join('\n');
                    alert('Validation errors:\n' + errorMessages);
                } else {
                    alert(error.message || 'Error updating teacher');
                }
            });
        });
    });

// Add Teacher Modalllllllll
document.addEventListener('DOMContentLoaded', function() {
    const baseUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Add Teacher Modal
    const addModal = document.getElementById('addTeacherModal');
    const addForm = document.getElementById('addTeacherForm');
    const addFileInput = document.getElementById('add_photo');
    const addFileChosen = document.getElementById('addFileChosen');
    const addChooseFileBtn = document.getElementById('addChooseFileBtn');

    // Open Add Modal
    window.openAddModal = function() {
        addModal.classList.remove('invisible', 'opacity-0');
        addModal.classList.add('opacity-100');
        setTimeout(() => {
            const modalContent = addModal.querySelector('.max-w-md');
            modalContent.classList.remove('scale-90', 'translate-y-4');
            modalContent.classList.add('scale-100', 'translate-y-0');
        }, 10);
    };

    // Close Add Modal
    document.getElementById('closeAddModal').addEventListener('click', function() {
        const modalContent = addModal.querySelector('.max-w-md');
        modalContent.classList.remove('scale-100', 'translate-y-0');
        modalContent.classList.add('scale-90', 'translate-y-4');
        
        setTimeout(() => {
            addModal.classList.remove('opacity-100');
            addModal.classList.add('invisible', 'opacity-0');
        }, 300);
        
        // Reset form
        addForm.reset();
        addFileChosen.textContent = 'No File Chosen';
    });

    // File Upload Handling
    addChooseFileBtn.addEventListener('click', () => addFileInput.click());
    addFileInput.addEventListener('change', () => {
        addFileChosen.textContent = addFileInput.files[0]?.name || 'No File Chosen';
    });

    // Form Validation and Submission
    addForm.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Password validation
        const password = document.getElementById('add_password').value;
        const confirmPassword = document.getElementById('add_password_confirmation').value;
        
        if (password !== confirmPassword) {
            alert('Passwords do not match!');
            return;
        }
        
        // Submit form with fetch
        const formData = new FormData();
        formData.append('_token', csrfToken);
        formData.append('teacher_name', document.getElementById('add_name').value);
        formData.append('teacher_nik', document.getElementById('add_nik').value);
        formData.append('teacher_specialization', document.getElementById('add_specialization').value);
        formData.append('teacher_position', document.getElementById('add_position').value);
        formData.append('teacher_email', document.getElementById('add_email').value);
        formData.append('teacher_password', password);
        formData.append('teacher_password_confirmation', confirmPassword);
        formData.append('teacher_phone', document.getElementById('add_phone').value);
        formData.append('teacher_photo', document.getElementById('add_photo').files[0]);
        
        fetch(`${baseUrl}/teachers`, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            credentials: 'same-origin'
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(json => Promise.reject(json));
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                window.location.reload();
            } else {
                alert(data.message || 'Error adding teacher');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            if (error.errors) {
                const errorMessages = Object.values(error.errors).flat().join('\n');
                alert('Validation errors:\n' + errorMessages);
            } else {
                alert(error.message || 'Error adding teacher');
            }
        });
    });
});

// Profile Modal
document.addEventListener('DOMContentLoaded', function() {
    const baseUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    const profileModal = document.getElementById('profileTeacherModal');
    const defaultAvatarUrl = "{{ asset('storage/images/teachers/default-avatar.jpg') }}";
    
    // Function to open profile modal
    window.openProfileModal = function(teacherId) {
        console.log('Opening profile modal for teacher:', teacherId);
        
        // Get base URL from meta tag
        const url = `${baseUrl}/teachers/${teacherId}`;
        console.log('Fetching from URL:', url);
        
        fetch(url, {
            method: 'GET',
            credentials: 'same-origin',
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => {
            console.log('Response status:', response.status);
            console.log('Response headers:', Object.fromEntries([...response.headers]));
            return response.text().then(text => {
                console.log('Raw response:', text);
                try {
                    const data = JSON.parse(text);
                    if (!response.ok) {
                        throw new Error(data.message || 'Network response was not ok');
                    }
                    return data;
                } catch (e) {
                    console.error('Error parsing JSON:', e);
                    throw new Error('Server returned an invalid response');
                }
            });
        })
        .then(response => {
            console.log('Parsed response data:', response);
            if (!response.success) {
                throw new Error(response.message || 'Error loading teacher profile');
            }
            const data = response.data;
            
            // Update modal content
            const imgElement = document.getElementById('profilePhoto');
            if (data.teacher_photo) {
                // Construct the full URL using the asset helper
                imgElement.src = "{{ asset('storage') }}/" + data.teacher_photo;
            } else {
                imgElement.src = defaultAvatarUrl;
            }
            console.log('Setting photo URL:', imgElement.src);
            
            // Add error handler for image
            imgElement.onerror = function() {
                console.log('Image failed to load, using default avatar');
                this.src = defaultAvatarUrl;
            };
            
            document.getElementById('profileName').textContent = data.teacher_name || 'N/A';
            document.getElementById('profilePosition').textContent = data.teacher_position || 'N/A';
            document.getElementById('profileNik').textContent = data.teacher_nik || 'N/A';
            document.getElementById('profileSpecialization').textContent = data.teacher_specialization || 'N/A';
            document.getElementById('profileEmail').textContent = data.teacher_email || 'N/A';
            document.getElementById('profilePhone').textContent = data.teacher_phone || 'N/A';
            
            // Show modal
            profileModal.classList.remove('invisible', 'opacity-0');
            profileModal.classList.add('opacity-100');
            
            setTimeout(() => {
                const modalContent = profileModal.querySelector('.max-w-md');
                modalContent.classList.remove('scale-90', 'translate-y-4');
                modalContent.classList.add('scale-100', 'translate-y-0');
            }, 10);
        })
        .catch(error => {
            console.error('Error:', error);
            alert(error.message || 'Error loading teacher profile');
        });
    };
    
    // Close profile modal
    document.getElementById('closeProfileModal').addEventListener('click', function() {
        const modalContent = profileModal.querySelector('.max-w-md');
        modalContent.classList.remove('scale-100', 'translate-y-0');
        modalContent.classList.add('scale-90', 'translate-y-4');
        
        setTimeout(() => {
            profileModal.classList.remove('opacity-100');
            profileModal.classList.add('invisible', 'opacity-0');
        }, 300);
    });
    
    // Close on click outside
    profileModal.addEventListener('click', function(e) {
        if (e.target === profileModal) {
            document.getElementById('closeProfileModal').click();
        }
    });
});

// Function to handle delete confirmation
function confirmDelete(button) {
    if (confirm('Are you sure you want to delete this teacher?')) {
        const form = button.closest('.delete-form');
        
        // Submit form with fetch
        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: new FormData(form)
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(json => Promise.reject(json));
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Reload page after successful deletion
                window.location.reload();
            } else {
                alert(data.message || 'Error deleting teacher');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert(error.message || 'Error deleting teacher');
        });
    }
}

// Change Password Modal Functionality
document.addEventListener('DOMContentLoaded', function() {
    const baseUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Change Password Modal
    const changePasswordModal = document.getElementById('changePasswordModal');
    let currentTeacherId = null;

    window.openChangePasswordModal = function(teacherId) {
        currentTeacherId = teacherId;
        
        // Reset form
        document.getElementById('changePasswordForm').reset();
        
        // Show modal with animation
        changePasswordModal.classList.remove('invisible', 'opacity-0');
        changePasswordModal.classList.add('opacity-100');
        
        setTimeout(() => {
            const modalContent = changePasswordModal.querySelector('.max-w-md');
            modalContent.classList.remove('scale-90', 'translate-y-4');
            modalContent.classList.add('scale-100', 'translate-y-0');
        }, 10);
    };
    
    // Close Change Password Modal
    document.getElementById('closeChangePasswordModal').addEventListener('click', function() {
        const modalContent = changePasswordModal.querySelector('.max-w-md');
        modalContent.classList.remove('scale-100', 'translate-y-0');
        modalContent.classList.add('scale-90', 'translate-y-4');
        
        setTimeout(() => {
            changePasswordModal.classList.remove('opacity-100');
            changePasswordModal.classList.add('invisible', 'opacity-0');
        }, 300);
    });
    
    // Handle Change Password Form Submit
    document.getElementById('changePasswordForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validate passwords match
        const newPassword = document.getElementById('new_password').value;
        const confirmPassword = document.getElementById('new_password_confirmation').value;
        
        if (newPassword !== confirmPassword) {
            alert('New passwords do not match!');
            return;
        }

        // Create form data
        const formData = new URLSearchParams();
        formData.append('_token', csrfToken);
        formData.append('current_password', document.getElementById('current_password').value);
        formData.append('new_password', newPassword);
        formData.append('new_password_confirmation', confirmPassword);
        
        // Submit form
        fetch(`${baseUrl}/teachers/${currentTeacherId}/change-password`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/x-www-form-urlencoded',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData.toString()
        })
        .then(response => {
            if (!response.ok) {
                return response.json().then(data => {
                    throw new Error(data.message || 'Error changing password');
                });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert('Password changed successfully');
                document.getElementById('closeChangePasswordModal').click();
            } else {
                throw new Error(data.message || 'Error changing password');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert(error.message || 'Error changing password. Please try again.');
        });
    });
});

// Delete Teacher Function
document.addEventListener('DOMContentLoaded', function() {
    const baseUrl = document.querySelector('meta[name="app-url"]').getAttribute('content');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Delete Teacher Function
    window.confirmDelete = function(button) {
        if (confirm('Are you sure you want to delete this teacher?')) {
            const form = button.closest('.delete-form');
            
            // Get the form data
            const formData = new FormData(form);
            formData.append('_method', 'DELETE'); // Laravel method spoofing
            
            // Submit using fetch
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(response => {
                if (!response.ok) {
                    return response.json().then(data => {
                        throw new Error(data.message || 'Error deleting teacher');
                    });
                }
                return response.json();
            })
            .then(data => {
                if (data.success) {
                    // Reload the page to show updated list
                    window.location.reload();
                } else {
                    throw new Error(data.message || 'Error deleting teacher');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert(error.message || 'Error deleting teacher. Please try again.');
            });
        }
    };
});

// Search and Pagination
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    let searchTimeout;

    function performSearch() {
        const searchTerm = searchInput.value;
        fetchTeachers(1, searchTerm);
    }

    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(performSearch, 500);
    });

    window.changePage = function(page) {
        fetchTeachers(page, searchInput.value);
    };

    function fetchTeachers(page = 1, search = '') {
        const url = new URL(window.location.href);
        url.searchParams.set('page', page);
        if (search) {
            url.searchParams.set('search', search);
        } else {
            url.searchParams.delete('search');
        }

        fetch(url.toString(), {
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                document.getElementById('teachersTableBody').innerHTML = data.html;
                document.getElementById('paginationContainer').innerHTML = data.pagination;
                
                // Update URL without reloading the page
                window.history.pushState({}, '', url.toString());
            } else {
                throw new Error(data.message || 'Error loading teachers');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error loading teachers. Please try again.');
        });
    }
});

</script>

@endsection