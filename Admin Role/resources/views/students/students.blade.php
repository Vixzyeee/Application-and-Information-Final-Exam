@extends('layouts.app')

@section('content')
<div class="container-fluid bg-[#12131A] ml-[10px] mt-[-10px] text-white rounded-lg shadow-sm p-4 h-[calc(100vh-120px)] w-[calc(100%+15px)] overflow-hidden">
    <div class="h-full pr-2 pl-2 flex flex-col">
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
                <button class="flex items-center bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition duration-150 ease-in-out transform hover:scale-110 transition-transform duration-300">
                    <i class="bi bi-plus-lg mr-2"></i>
                    Add Teacher
                </button>
            </div>
        </div>
        
        <!-- Teachers Table (Dinaikkan karena button list/card dihapus) -->
        <div class="flex-grow overflow-hidden">
        <div class="bg-[#1E1F25] rounded-lg overflow-hidden p-0 h-full">
        <table class="min-w-full divide-y divide-gray-700 border-separate border-spacing-x-0 [&_tr]:h-14">
                <thead class="bg-[#17181F]">
                    <tr>
                        <th class="px-6 py-3 text-center align-middle text-xs font-medium text-[#EFEFEF] uppercase tracking-wider">
                            <div class="flex items-center justify-center">
                                NIM
                            </div>
                        </th>
                        <th class="px-6 py-3 text-center align-middle text-xs font-medium text-[#EFEFEF] uppercase tracking-wider">
                            <div class="flex items-center justify-center">
                                Student
                            </div>
                        </th>
                        <th class="px-6 py-3 text-center align-middle text-xs font-medium text-[#EFEFEF] uppercase tracking-wider">
                            <div class="flex items-center justify-center">
                                Faculty
                            </div>
                        </th>
                        <th class="px-6 py-3 text-center align-middle text-xs font-medium text-[#EFEFEF] uppercase tracking-wider">
                            <div class="flex items-center justify-center">
                                Program
                            </div>
                        </th>
                        <th class="px-6 py-3 text-center align-middle text-xs font-medium text-[#EFEFEF] uppercase tracking-wider">
                            <div class="flex items-center justify-center">
                                Email
                            </div>
                        </th>
                        <th class="px-6 py-3 text-center align-middle text-xs font-medium text-[#EFEFEF] uppercase tracking-wider">
                            <div class="flex items-center justify-center">
                                Phone Number
                            </div>
                        </th>
                        <th class="px-6 py-3 text-center align-middle text-xs font-medium text-[#EFEFEF] uppercase tracking-wider">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-[#1E1F25] divide-y divide-gray-700">
                    <!-- Teacher 1 -->
                    <tr>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">2016096802091001</td>
                    <td class="px-4 py-[10px] whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full mr-2" src="https://via.placeholder.com/32" alt="">
                            <div class="text-sm font-medium text-[#EFEFEF]">Ir. I Dewa Made Widia, MT., MCF</div>
                        </div>
                    </td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Technology Management Information</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">dewa_vokasi@ub.ac.id</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">082141480465</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF] overflow-x-auto max-w-[200px]">
                    <div class="w-full overflow-x-auto scrollbar-thin scrollbar-thumb-gray-600 scrollbar-track-gray-800">
                    Ketua Departemen Industri Kreatif dan Digital
                    </div>
                    </td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center">
                        <div class="flex justify-center space-x-1">
                                <button class="text-blue-400 hover:text-blue-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-red-400 hover:text-red-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-trash text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Teacher 2 -->
                    <tr>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">2016096802091001</td>
                    <td class="px-4 py-[10px] whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full mr-2" src="https://via.placeholder.com/32" alt="">
                            <div class="text-sm font-medium text-[#EFEFEF]">Ir. I Dewa Made Widia, MT., MCF</div>
                        </div>
                    </td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Technology Management</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">dewa_vokasi@ub.ac.id</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">082141480465</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Ketua Departemen Industri Kreatif dan Digital</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center">
                        <div class="flex justify-center space-x-1">
                                <button class="text-blue-400 hover:text-blue-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-red-400 hover:text-red-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-trash text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Teacher 3 -->
                    <tr>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">2016096802091001</td>
                    <td class="px-4 py-[10px] whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full mr-2" src="https://via.placeholder.com/32" alt="">
                            <div class="text-sm font-medium text-[#EFEFEF]">Ir. I Dewa Made Widia, MT., MCF</div>
                        </div>
                    </td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Technology Management</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">dewa_vokasi@ub.ac.id</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">082141480465</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Ketua Departemen Industri Kreatif dan Digital</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center">
                        <div class="flex justify-center space-x-1">
                                <button class="text-blue-400 hover:text-blue-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-red-400 hover:text-red-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-trash text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Teacher 4 -->
                    <tr>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">2016096802091001</td>
                    <td class="px-4 py-[10px] whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full mr-2" src="https://via.placeholder.com/32" alt="">
                            <div class="text-sm font-medium text-[#EFEFEF]">Ir. I Dewa Made Widia, MT., MCF</div>
                        </div>
                    </td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Technology Management</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">dewa_vokasi@ub.ac.id</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">082141480465</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Ketua Departemen Industri Kreatif dan Digital</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center">
                        <div class="flex justify-center space-x-1">
                                <button class="text-blue-400 hover:text-blue-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-red-400 hover:text-red-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-trash text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Teacher 5 -->
                    <tr>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">2016096802091001</td>
                    <td class="px-4 py-[10px] whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full mr-2" src="https://via.placeholder.com/32" alt="">
                            <div class="text-sm font-medium text-[#EFEFEF]">Ir. I Dewa Made Widia, MT., MCF</div>
                        </div>
                    </td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Technology Management</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">dewa_vokasi@ub.ac.id</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">082141480465</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Ketua Departemen Industri Kreatif dan Digital</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center">
                        <div class="flex justify-center space-x-1">
                                <button class="text-blue-400 hover:text-blue-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-red-400 hover:text-red-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-trash text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Teacher 6 -->
                    <tr>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">2016096802091001</td>
                    <td class="px-4 py-[10px] whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full mr-2" src="https://via.placeholder.com/32" alt="">
                            <div class="text-sm font-medium text-[#EFEFEF]">Ir. I Dewa Made Widia, MT., MCF</div>
                        </div>
                    </td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Technology Management</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">dewa_vokasi@ub.ac.id</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">082141480465</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Ketua Departemen Industri Kreatif dan Digital</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center">
                        <div class="flex justify-center space-x-1">
                                <button class="text-blue-400 hover:text-blue-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-red-400 hover:text-red-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-trash text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Teacher 7 -->
                    <tr>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">2016096802091001</td>
                    <td class="px-4 py-[10px] whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full mr-2" src="https://via.placeholder.com/32" alt="">
                            <div class="text-sm font-medium text-[#EFEFEF]">Ir. I Dewa Made Widia, MT., MCF</div>
                        </div>
                    </td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Technology Management</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">dewa_vokasi@ub.ac.id</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">082141480465</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Ketua Departemen Industri Kreatif dan Digital</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center">
                        <div class="flex justify-center space-x-1">
                                <button class="text-blue-400 hover:text-blue-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-red-400 hover:text-red-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-trash text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Teacher 8 -->
                    <tr>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">2016096802091001</td>
                    <td class="px-4 py-[10px] whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full mr-2" src="https://via.placeholder.com/32" alt="">
                            <div class="text-sm font-medium text-[#EFEFEF]">Ir. I Dewa Made Widia, MT., MCF</div>
                        </div>
                    </td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Technology Management</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">dewa_vokasi@ub.ac.id</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">082141480465</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Ketua Departemen Industri Kreatif dan Digital</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center">
                        <div class="flex justify-center space-x-1">
                                <button class="text-blue-400 hover:text-blue-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-red-400 hover:text-red-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-trash text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Teacher 9 -->
                    <tr>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">2016096802091001</td>
                    <td class="px-4 py-[10px] whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full mr-2" src="https://via.placeholder.com/32" alt="">
                            <div class="text-sm font-medium text-[#EFEFEF]">Ir. I Dewa Made Widia, MT., MCF</div>
                        </div>
                    </td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Technology Management</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">dewa_vokasi@ub.ac.id</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">082141480465</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Ketua Departemen Industri Kreatif dan Digital</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center">
                        <div class="flex justify-center space-x-1">
                                <button class="text-blue-400 hover:text-blue-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-red-400 hover:text-red-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-trash text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Teacher 10 -->
                    <tr>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">2016096802091001</td>
                    <td class="px-4 py-[10px] whitespace-nowrap">
                        <div class="flex items-center">
                            <img class="h-8 w-8 rounded-full mr-2" src="https://via.placeholder.com/32" alt="">
                            <div class="text-sm font-medium text-[#EFEFEF]">Ir. I Dewa Made Widia, MT., MCF</div>
                        </div>
                    </td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Technology Management</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">dewa_vokasi@ub.ac.id</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">082141480465</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center text-sm text-[#EFEFEF]">Ketua Departemen Industri Kreatif dan Digital</td>
                    <td class="px-4 py-[10px] whitespace-nowrap text-center">
                        <div class="flex justify-center space-x-1">
                                <button class="text-blue-400 hover:text-blue-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-pencil-square text-lg"></i>
                                </button>
                                <button class="text-red-400 hover:text-red-300 p-2 rounded hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">
                                    <i class="bi bi-trash text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        
        <!-- Pagination Section -->
        <div class="mt-8 w-full">
            <div class="flex justify-between items-center">
                <div class="text-sm text-[#EFEFEF]">
                    Showing 1 to 10 of 25 entries
                </div>
                <div class="flex space-x-2">
                    <button class="px-3 py-1 bg-[#1E1F25] text-white rounded-md hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">Previous</button>
                    <button class="px-3 py-1 bg-[#1E1F25] text-white rounded-md hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">1</button>
                    <button class="px-3 py-1 bg-[#1E1F25] text-white rounded-md hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">2</button>
                    <button class="px-3 py-1 bg-[#1E1F25] text-white rounded-md hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">3</button>
                    <button class="px-3 py-1 bg-[#1E1F25] text-white rounded-md hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">4</button>
                    <button class="px-3 py-1 bg-[#1E1F25] text-white rounded-md hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">5</button>
                    <button class="px-3 py-1 bg-[#1E1F25] text-white rounded-md hover:bg-[#2B2C32] transform hover:scale-110 transition-transform duration-300">Next</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
@endsection