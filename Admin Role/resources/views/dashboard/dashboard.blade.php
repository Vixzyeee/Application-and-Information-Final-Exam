@extends('layouts.app')

@section('content')
    <!-- Main Content -->
    <div class="mt-[-20px] mr-[-33px] p-[10px] text-[#EBEBEB] transition-all duration-300 overflow-hidden">
        <!-- Statistik Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-[10px]">
            <!-- New Students Card -->
            <div class="bg-[#12131A] p-4 rounded-2xl">
                <h3 class="text-lg font-medium mb-2">New Students</h3>
                <div class="flex justify-between items-end">
                    <div>
                        <h2 class="text-3xl font-bold">100</h2>
                        <p class="text-sm text-gray-400">90% increase</p>
                    </div>
                    <div class="w-20 h-14">
                        <canvas id="newStudentsChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Total Students Card -->
            <div class="bg-[#12131A] p-4 rounded-2xl">
                <h3 class="text-lg font-medium mb-2">Total Students</h3>
                <div class="flex justify-between items-end">
                    <div>
                        <h2 class="text-3xl font-bold">10,100</h2>
                        <p class="text-sm text-gray-400">40% increase</p>
                    </div>
                    <div class="w-20 h-14">
                        <canvas id="totalStudentsChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- New Teachers Card -->
            <div class="bg-[#12131A] p-4 rounded-2xl">
                <h3 class="text-lg font-medium mb-2">New Teachers</h3>
                <div class="flex justify-between items-end">
                    <div>
                        <h2 class="text-3xl font-bold">531</h2>
                        <p class="text-sm text-gray-400">40% increase</p>
                    </div>
                    <div class="w-20 h-14">
                        <canvas id="newTeachersChart"></canvas>
                    </div>
                </div>
            </div>
            
            <!-- Total Teachers Card -->
            <div class="bg-[#12131A] p-4 rounded-2xl">
                <h3 class="text-lg font-medium mb-2">Total Teachers</h3>
                <div class="flex justify-between items-end">
                    <div>
                        <h2 class="text-3xl font-bold">1,000</h2>
                        <p class="text-sm text-gray-400">40% increase</p>
                    </div>
                    <div class="w-20 h-14">
                        <canvas id="totalTeachersChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Grafik dan Attendance -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-3 pt-2">
            <!-- Student Activist Chart -->
            <div class="bg-[#12131A] p-4 rounded-2xl lg:col-span-2 h-[680px] overflow-hidden">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold">Student Activist</h3>
                    <div class="flex items-center space-x-4">
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-purple-500 rounded-full mr-2"></span>
                            <span class="text-sm">This month</span>
                        </div>
                        <div class="flex items-center">
                            <span class="w-3 h-3 bg-orange-500 rounded-full mr-2"></span>
                            <span class="text-sm">Last months</span>
                        </div>
                    </div>
                </div>
                <div class="h-[590px]">
                    <canvas id="activityChart"></canvas>
                </div>
            </div>
            
            <!-- Student Attendance -->
            <div class="bg-[#12131A] p-4 rounded-2xl h-[680px] overflow-hidden pt-2">
            <h3 class="text-xl font-bold mb-4 sticky top-0 bg-[#12131A] pt-3 pb-2">Student <span class="text-gray-400 font-normal">Attendance</span></h3>
                <div class="space-y-4 max-h-[calc(100%-50px)] pb-4 overflow-y-auto">
                    <!-- Course A -->
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology A</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-cyan-400 h-2 rounded-full" style="width: 95%"></div>
                        </div>
                    </div>
                    
                    <!-- Course B -->
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology B</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-green-400 h-2 rounded-full" style="width: 85%"></div>
                        </div>
                    </div>
                    
                    <!-- Course C -->
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology C</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-green-400 h-2 rounded-full" style="width: 90%"></div>
                        </div>
                    </div>
                    
                    <!-- Course D -->
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology D</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-green-400 h-2 rounded-full" style="width: 80%"></div>
                        </div>
                    </div>
                    
                    <!-- Course E -->
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology E</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-orange-400 h-2 rounded-full" style="width: 75%"></div>
                        </div>
                    </div>
                    
                    <!-- Course F -->
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology F</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-orange-400 h-2 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology F</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-orange-400 h-2 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology F</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-orange-400 h-2 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology F</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-orange-400 h-2 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology F</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-orange-400 h-2 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology F</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-orange-400 h-2 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology F</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-orange-400 h-2 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology F</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-orange-400 h-2 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology F</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-orange-400 h-2 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology F</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-orange-400 h-2 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>

                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology F</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-orange-400 h-2 rounded-full" style="width: 70%"></div>
                        </div>
                    </div>
                    
                    <!-- Course G -->
                    <div>
                        <div class="flex items-center mb-1">
                            <div class="bg-gray-200 p-2 rounded-lg mr-2">
                                <i class="bi bi-building text-gray-600"></i>
                            </div>
                            <span>Information Technology G</span>
                        </div>
                        <div class="w-full bg-gray-700 rounded-full h-2">
                            <div class="bg-red-400 h-2 rounded-full" style="width: 65%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection