@extends('layouts.app')

@section('content')
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
                        <input type="text" placeholder="Search..." class="bg-transparent border-none focus:border-none focus:ring-0 focus:outline-none text-md w-64 text-white">
                    </div>
                </div>
                
                <!-- Add Teacher Button -->
                <button class="flex items-center bg-blue-600 hover:bg-blue-700 text-md text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out transform hover:scale-110 transition-transform duration-300" data-action="add" onclick="openAddModal()">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Add Teacher
                </button>
            </div>
        </div>
        
        <!-- Teachers Table (Dinaikkan karena button list/card dihapus) -->
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
                <tbody class="bg-[#1E1F25] divide-y divide-gray-700">
                    <!-- Teacher 1 -->
                    <tr>
                    <td class="align-left text-sm text-[#EFEFEF] p-1.5">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full ml-3 mr-1 object-cover shadow-sm transform hover:scale-125 transition-transform duration-300" src="{{ asset('storage/images/20221225_144536.jpg') }}" alt="">
                            <div class="flex flex-col px-2 py-2">
                                <div class="text-sm font-medium text-[#EFEFEF]">Guy Hawkins</div>
                                <div class="text-xs text-gray-400">Managing Director</div>
                            </div>
                        </div>
                    </td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">Technology Management Information</td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">dewa_vokasi@ub.ac.id</td>
                    <td class="align-left pl-3">
                        <div class="flex align-left space-x-2">
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-person-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" data-action="edit" onclick="openEditModal()">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-x-square text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                    <td class="align-left text-sm text-[#EFEFEF] p-1.5">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full ml-3 mr-1 object-cover shadow-sm transform hover:scale-125 transition-transform duration-300" src="{{ asset('storage/images/20221225_144536.jpg') }}" alt="">
                            <div class="flex flex-col px-2 py-2">
                                <div class="text-sm font-medium text-[#EFEFEF]">Guy Hawkins</div>
                                <div class="text-xs text-gray-400">Managing Director</div>
                            </div>
                        </div>
                    </td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">Technology Management Information</td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">dewa_vokasi@ub.ac.id</td>
                    <td class="align-left pl-3">
                        <div class="flex align-left space-x-2">
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-person-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" data-action="edit" onclick="openEditModal()">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-x-square text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                    <td class="align-left text-sm text-[#EFEFEF] p-1.5">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full ml-3 mr-1 object-cover shadow-sm transform hover:scale-125 transition-transform duration-300" src="{{ asset('storage/images/20221225_144536.jpg') }}" alt="">
                            <div class="flex flex-col px-2 py-2">
                                <div class="text-sm font-medium text-[#EFEFEF]">Guy Hawkins</div>
                                <div class="text-xs text-gray-400">Managing Director</div>
                            </div>
                        </div>
                    </td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">Technology Management Information</td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">dewa_vokasi@ub.ac.id</td>
                    <td class="align-left pl-3">
                        <div class="flex align-left space-x-2">
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-person-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" data-action="edit" onclick="openEditModal()">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-x-square text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                    <td class="align-left text-sm text-[#EFEFEF] p-1.5">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full ml-3 mr-1 object-cover shadow-sm transform hover:scale-125 transition-transform duration-300" src="{{ asset('storage/images/20221225_144536.jpg') }}" alt="">
                            <div class="flex flex-col px-2 py-2">
                                <div class="text-sm font-medium text-[#EFEFEF]">Guy Hawkins</div>
                                <div class="text-xs text-gray-400">Managing Director</div>
                            </div>
                        </div>
                    </td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">Technology Management Information</td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">dewa_vokasi@ub.ac.id</td>
                    <td class="align-left pl-3">
                        <div class="flex align-left space-x-2">
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-person-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" data-action="edit" onclick="openEditModal()">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-x-square text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                    <td class="align-left text-sm text-[#EFEFEF] p-1.5">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full ml-3 mr-1 object-cover shadow-sm transform hover:scale-125 transition-transform duration-300" src="{{ asset('storage/images/20221225_144536.jpg') }}" alt="">
                            <div class="flex flex-col px-2 py-2">
                                <div class="text-sm font-medium text-[#EFEFEF]">Guy Hawkins</div>
                                <div class="text-xs text-gray-400">Managing Director</div>
                            </div>
                        </div>
                    </td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">Technology Management Information</td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">dewa_vokasi@ub.ac.id</td>
                    <td class="align-left pl-3">
                        <div class="flex align-left space-x-2">
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-person-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" data-action="edit" onclick="openEditModal()">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-x-square text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                    <td class="align-left text-sm text-[#EFEFEF] p-1.5">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full ml-3 mr-1 object-cover shadow-sm transform hover:scale-125 transition-transform duration-300" src="{{ asset('storage/images/20221225_144536.jpg') }}" alt="">
                            <div class="flex flex-col px-2 py-2">
                                <div class="text-sm font-medium text-[#EFEFEF]">Guy Hawkins</div>
                                <div class="text-xs text-gray-400">Managing Director</div>
                            </div>
                        </div>
                    </td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">Technology Management Information</td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">dewa_vokasi@ub.ac.id</td>
                    <td class="align-left pl-3">
                        <div class="flex align-left space-x-2">
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-person-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" data-action="edit" onclick="openEditModal()">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-x-square text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                    <td class="align-left text-sm text-[#EFEFEF] p-1.5">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full ml-3 mr-1 object-cover shadow-sm transform hover:scale-125 transition-transform duration-300" src="{{ asset('storage/images/20221225_144536.jpg') }}" alt="">
                            <div class="flex flex-col px-2 py-2">
                                <div class="text-sm font-medium text-[#EFEFEF]">Guy Hawkins</div>
                                <div class="text-xs text-gray-400">Managing Director</div>
                            </div>
                        </div>
                    </td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">Technology Management Information</td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">dewa_vokasi@ub.ac.id</td>
                    <td class="align-left pl-3">
                        <div class="flex align-left space-x-2">
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-person-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" data-action="edit" onclick="openEditModal()">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-x-square text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                    <td class="align-left text-sm text-[#EFEFEF] p-1.5">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full ml-3 mr-1 object-cover shadow-sm transform hover:scale-125 transition-transform duration-300" src="{{ asset('storage/images/20221225_144536.jpg') }}" alt="">
                            <div class="flex flex-col px-2 py-2">
                                <div class="text-sm font-medium text-[#EFEFEF]">Guy Hawkins</div>
                                <div class="text-xs text-gray-400">Managing Director</div>
                            </div>
                        </div>
                    </td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">Technology Management Information</td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">dewa_vokasi@ub.ac.id</td>
                    <td class="align-left pl-3">
                        <div class="flex align-left space-x-2">
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-person-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" data-action="edit" onclick="openEditModal()">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-x-square text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                    <td class="align-left text-sm text-[#EFEFEF] p-1.5">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full ml-3 mr-1 object-cover shadow-sm transform hover:scale-125 transition-transform duration-300" src="{{ asset('storage/images/20221225_144536.jpg') }}" alt="">
                            <div class="flex flex-col px-2 py-2">
                                <div class="text-sm font-medium text-[#EFEFEF]">Guy Hawkins</div>
                                <div class="text-xs text-gray-400">Managing Director</div>
                            </div>
                        </div>
                    </td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">Technology Management Information</td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">dewa_vokasi@ub.ac.id</td>
                    <td class="align-left pl-3">
                        <div class="flex align-left space-x-2">
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-person-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" data-action="edit" onclick="openEditModal()">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-x-square text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr>
                    <td class="align-left text-sm text-[#EFEFEF] p-1.5">
                        <div class="flex items-center">
                            <img class="h-10 w-10 rounded-full ml-3 mr-1 object-cover shadow-sm transform hover:scale-125 transition-transform duration-300" src="{{ asset('storage/images/20221225_144536.jpg') }}" alt="">
                            <div class="flex flex-col px-2 py-2">
                                <div class="text-sm font-medium text-[#EFEFEF]">Guy Hawkins</div>
                                <div class="text-xs text-gray-400">Managing Director</div>
                            </div>
                        </div>
                    </td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">Technology Management Information</td>
                    <td class="align-left text-sm text-[#EFEFEF] pl-4">dewa_vokasi@ub.ac.id</td>
                    <td class="align-left pl-3">
                        <div class="flex align-left space-x-2">
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-person-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" data-action="edit" onclick="openEditModal()">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300">
                                    <i class="bi bi-x-square text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
        <!-- Pagination -->
        <div class="relative bottom-[64px]">
            <div class="ml-8 text-sm text-[#EFEFEF] text-center w-[200px] bg-[#12131A] rounded-lg p-2">
                Showing 1 to 10 of 25 entries
            </div>
        </div>
        <div class="fixed bottom-0 right-10 justify-between items-center mb-[38px] bg-[#12131A] rounded-lg p-2">
            <div class="flex space-x-2">
                    <button class="px-3 py-1 bg-[#1E1F25] text-white rounded-md hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">Previous</button>
                    <button class="px-3 py-1 bg-[#1E1F25] text-white rounded-md hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">Next</button>
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
            <form id="editTeacherForm">
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Name</label>
                    <input type="text" id="edit_name" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">NIK</label>
                    <input type="text" id="edit_nik" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Specialization</label>
                    <select id="edit_specialization" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                    <div class="absolute top-0 right-0 top-1/2 transform -translate-y-1/2 pointer-events-none">
                        <i class="bi bi-chevron-down text-gray-400"></i>
                    </div>
                        <option value="Technology Management Information">Technology Management Information</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Information Systems">Information Systems</option>
                    </select>
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Position</label>
                    <select id="edit_position" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                        <option value="Managing Director">Managing Director</option>
                        <option value="Lecturer">Lecturer</option>
                        <option value="Professor">Professor</option>
                    </select>
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Email</label>
                    <input type="email" id="edit_email" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Phone Number</label>
                    <input type="text" id="edit_phone" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Photo</label>
                    <div class="flex items-center px-3 py-2 bg-[#12131A] rounded-md transform hover:scale-110 transition-transform duration-300">
                        <div class="flex items-center space-x-2">
                            <button type="button" id="chooseFileBtn" class="bg-[#1E1F25] text-sm px-3 py-1 rounded-md hover:bg-[#1E1F25]">Choose File</button>
                            <span id="fileChosen" class="text-sm text-gray-400">No File Chosen</span>
                            <input type="file" id="edit_photo" class="hidden">
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-center pt-[10px]">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-8 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-110">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Final Modal Add Teacherrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr -->
 <!-- Add Teacher Button -->
<button id="addTeacherBtn" class="flex items-center bg-blue-600 hover:bg-blue-700 text-md text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out transform hover:scale-110 transition-transform duration-300">
    Add Teacher
</button>
<!-- Modal Edit Teacher -->
<div id="addTeacherModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 transform transition-opacity duration-300 opacity-0 invisible">
    <div class="bg-[#1A1B23] text-white rounded-lg shadow-xl w-full max-w-md transform transition-all duration-300 scale-90 translate-y-4">
        <!-- Modal Header -->
        <div class="flex items-center justify-between px-4 pt-4">
            <div class="flex items-center">
                <div class="w-10 h-10 rounded-lg bg-[#12131A] transform hover:scale-125 transition-transform duration-300 flex items-center justify-center mr-2">
                    <i class="bi bi-person-fill text-[#EFEFEF] text-2xl"></i>
                </div>
                <h2 class="text-xl text-[#EFEFEF] font-semibold px-2 py-1 bg-[#1A1B23] text-white rounded-md transform hover:scale-110 transition-transform duration-300">Teachers Add</h2>
            </div>
            <button id="closeAddModal" class="text-gray-400 hover:text-white focus:outline-none transform hover:scale-110 transition-transform duration-300">
                <i class="bi bi-x-lg text-2xl"></i>
            </button>
        </div>
        
        <!-- Modal Body -->
        <div class="px-4 py-4">
            <form id="AddTeacherForm">
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Name</label>
                    <input type="text" id="edit_name" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">NIK</label>
                    <input type="text" id="edit_nik" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Specialization</label>
                    <select id="edit_specialization" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                    <div class="absolute top-0 right-0 top-1/2 transform -translate-y-1/2 pointer-events-none">
                        <i class="bi bi-chevron-down text-gray-400"></i>
                    </div>
                        <option value="Technology Management Information">Technology Management Information</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Information Systems">Information Systems</option>
                    </select>
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Position</label>
                    <select id="edit_position" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                        <option value="Managing Director">Managing Director</option>
                        <option value="Lecturer">Lecturer</option>
                        <option value="Professor">Professor</option>
                    </select>
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Email</label>
                    <input type="email" id="edit_email" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Phone Number</label>
                    <input type="text" id="edit_phone" class="text-sm w-full bg-[#12131A] rounded-md px-3 py-2 focus:outline-none focus:ring-1 focus:ring-[#1A1B23] transform hover:scale-110 transition-transform duration-300">
                </div>
                
                <div class="mb-[10px]">
                    <label class="block text-sm font-medium mb-[10px] transform hover:scale-125 transition-transform duration-300 origin-center inline-block">Photo</label>
                    <div class="flex items-center px-3 py-2 bg-[#12131A] rounded-md transform hover:scale-110 transition-transform duration-300">
                        <div class="flex items-center space-x-2">
                            <button type="button" id="chooseFileBtn" class="bg-[#1E1F25] text-sm px-3 py-1 rounded-md hover:bg-[#1E1F25]">Choose File</button>
                            <span id="fileChosen" class="text-sm text-gray-400">No File Chosen</span>
                            <input type="file" id="edit_photo" class="hidden">
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-center pt-[10px]">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-8 py-2 rounded-md transition duration-300 ease-in-out transform hover:scale-110">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>





<!-- JavaScript untuk Modal -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('[data-action="edit"]');
        const editModal = document.getElementById('editTeacherModal');
        const closeEditModal = document.getElementById('closeEditModal');
        const chooseFileBtn = document.getElementById('chooseFileBtn');
        const fileInput = document.getElementById('edit_photo');
        const fileChosen = document.getElementById('fileChosen');
        
        // Fungsi untuk membuka modal
        function openEditModal() {
            editModal.classList.remove('invisible', 'opacity-0');
            editModal.classList.add('opacity-100');
            
            setTimeout(() => {
                const modalContent = editModal.querySelector('.max-w-md');
                modalContent.classList.remove('scale-90', 'translate-y-4');
                modalContent.classList.add('scale-100', 'translate-y-0');
            }, 10);
        }
        
        // Fungsi untuk menutup modal
        function closeModal() {
            const modalContent = editModal.querySelector('.max-w-md');
            modalContent.classList.remove('scale-100', 'translate-y-0');
            modalContent.classList.add('scale-90', 'translate-y-4');
            
            setTimeout(() => {
                editModal.classList.remove('opacity-100');
                editModal.classList.add('invisible', 'opacity-0');
            }, 300);
        }
        
        // Event listener untuk tombol edit
        editButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                openEditModal();
                
                // Di sini Anda bisa menambahkan kode untuk mengisi form dengan data guru yang dipilih
                // Contoh: mengambil data dari baris tabel
                const row = this.closest('tr');
                const nik = row.querySelector('td:nth-child(1)').textContent;
                const name = row.querySelector('td:nth-child(2) .text-sm').textContent;
                const specialization = row.querySelector('td:nth-child(3)').textContent;
                const email = row.querySelector('td:nth-child(4)').textContent;
                const phone = row.querySelector('td:nth-child(5)').textContent;
                const position = row.querySelector('td:nth-child(6)').textContent.trim();
                
                // Mengisi form dengan data
                document.getElementById('edit_nik').value = nik;
                document.getElementById('edit_name').value = name;
                document.getElementById('edit_specialization').value = specialization;
                document.getElementById('edit_position').value = position;
                document.getElementById('edit_email').value = email;
                document.getElementById('edit_phone').value = phone;
            });
        });
        
        // Event listener untuk tombol close
        closeEditModal.addEventListener('click', closeModal);
        
        // Event listener untuk klik di luar modal
        editModal.addEventListener('click', function(e) {
            if (e.target === editModal) {
                closeModal();
            }
        });
        
        // Event listener untuk tombol Choose File
        chooseFileBtn.addEventListener('click', function() {
            fileInput.click();
        });
        
        // Event listener untuk perubahan file
        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                fileChosen.textContent = fileInput.files[0].name;
            } else {
                fileChosen.textContent = 'No File Chosen';
            }
        });
        
        // Event listener untuk form submit
        document.getElementById('editTeacherForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Di sini Anda bisa menambahkan kode untuk menyimpan perubahan
            // Contoh: mengirim data ke server dengan AJAX
            
            // Setelah berhasil, tutup modal
            closeModal();
        });
    });

// Add Teacher Modalllllllll
document.addEventListener('DOMContentLoaded', function() {
        const addButtons = document.querySelectorAll('[data-action="add"]');
        const addModal = document.getElementById('addTeacherModal');
        const closeAddModal = document.getElementById('closeAddModal');
        const chooseFileBtn = document.getElementById('chooseFileBtn');
        const fileInput = document.getElementById('edit_photo');
        const fileChosen = document.getElementById('fileChosen');
        
        // Fungsi untuk membuka modal
        function openAddModal() {
            addModal.classList.remove('invisible', 'opacity-0');
            addModal.classList.add('opacity-100');
            
            setTimeout(() => {
                const modalContent = addModal.querySelector('.max-w-md');
                modalContent.classList.remove('scale-90', 'translate-y-4');
                modalContent.classList.add('scale-100', 'translate-y-0');
            }, 10);
        }
        
        // Fungsi untuk menutup modal
        function closeModal() {
            const modalContent = addModal.querySelector('.max-w-md');
            modalContent.classList.remove('scale-100', 'translate-y-0');
            modalContent.classList.add('scale-90', 'translate-y-4');
            
            setTimeout(() => {
                addModal.classList.remove('opacity-100');
                addModal.classList.add('invisible', 'opacity-0');
            }, 300);
        }
        
        // Event listener untuk tombol edit
        addButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                openAddModal();
                
                // Di sini Anda bisa menambahkan kode untuk mengisi form dengan data guru yang dipilih
                // Contoh: mengambil data dari baris tabel
                const row = this.closest('tr');
                const nik = row.querySelector('td:nth-child(1)').textContent;
                const name = row.querySelector('td:nth-child(2) .text-sm').textContent;
                const specialization = row.querySelector('td:nth-child(3)').textContent;
                const email = row.querySelector('td:nth-child(4)').textContent;
                const phone = row.querySelector('td:nth-child(5)').textContent;
                const position = row.querySelector('td:nth-child(6)').textContent.trim();
                
                // Mengisi form dengan data
                document.getElementById('add_nik').value = nik;
                document.getElementById('add_name').value = name;
                document.getElementById('add_specialization').value = specialization;
                document.getElementById('add_position').value = position;
                document.getElementById('add_email').value = email;
                document.getElementById('add_phone').value = phone;
            });
        });
        
        // Event listener untuk tombol close
        closeAddModal.addEventListener('click', closeModal);
        
        // Event listener untuk klik di luar modal
        addModal.addEventListener('click', function(e) {
            if (e.target === addModal) {
                closeModal();
            }
        });
        
        // Event listener untuk tombol Choose File
        chooseFileBtn.addEventListener('click', function() {
            fileInput.click();
        });
        
        // Event listener untuk perubahan file
        fileInput.addEventListener('change', function() {
            if (fileInput.files.length > 0) {
                fileChosen.textContent = fileInput.files[0].name;
            } else {
                fileChosen.textContent = 'No File Chosen';
            }
        });
        
        // Event listener untuk form submit
        document.getElementById('addTeacherForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Di sini Anda bisa menambahkan kode untuk menyimpan perubahan
            // Contoh: mengirim data ke server dengan AJAX
            
            // Setelah berhasil, tutup modal
            closeModal();
        });
    });


</script>

@endsection