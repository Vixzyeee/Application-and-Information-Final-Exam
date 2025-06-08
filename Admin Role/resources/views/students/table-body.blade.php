@foreach($students as $student)
<tr>
    <td class="align-left text-sm text-[#EFEFEF] p-1">
        <div class="flex items-center">
            <img class="h-10 w-10 rounded-full ml-3 mr-1 object-cover shadow-sm transform hover:scale-125 transition-transform duration-300" 
                src="{{ $student->student_photo ? asset('storage/'.$student->student_photo) : asset('storage/images/students/default-avatar.jpg') }}" 
                alt="{{ $student->student_name }}">
            <div class="flex flex-col px-2 py-2">
                <div class="text-sm font-medium text-[#EFEFEF]">{{ $student->student_name }}</div>
                <div class="text-xs text-gray-400">{{ $student->student_class }} - {{ $student->student_major }}</div>
            </div>
        </div>
    </td>
    <td class="align-left text-sm text-[#EFEFEF] pl-4">{{ $student->student_specialization }}</td>
    <td class="align-left text-sm text-[#EFEFEF] pl-4">{{ $student->student_email }}</td>
    <td class="align-left pl-3">
        <div class="flex align-left space-x-2">
            <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" onclick="openProfileModal('{{ $student->student_id }}')">
                <i class="bi bi-person-square text-lg"></i>
            </button>
            <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" data-action="edit" onclick="openEditModal('{{ $student->student_id }}')">
                <i class="bi bi-pencil-square text-lg"></i>
            </button>
            <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" onclick="openChangePasswordModal('{{ $student->student_id }}')">
                <i class="bi bi-key-fill text-lg"></i>
            </button>
            <form action="{{ route('students.destroy', $student->student_id) }}" method="POST" class="inline-block delete-form">
                @csrf
                @method('DELETE')
                <button type="button" class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" onclick="confirmDelete(this)">
                    <i class="bi bi-x-square text-lg"></i>
                </button>
            </form>
        </div>
    </td>
</tr>
@endforeach 