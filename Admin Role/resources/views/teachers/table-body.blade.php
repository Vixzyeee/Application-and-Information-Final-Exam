@foreach($teachers as $teacher)
<tr>
    <td class="align-left text-sm text-[#EFEFEF] p-1">
        <div class="flex items-center">
            <img class="h-10 w-10 rounded-full ml-3 mr-1 object-cover shadow-sm transform hover:scale-125 transition-transform duration-300" 
                src="{{ $teacher->teacher_photo ? asset('storage/'.$teacher->teacher_photo) : asset('storage/images/teachers/default-avatar.jpg') }}" 
                alt="{{ $teacher->teacher_name }}">
            <div class="flex flex-col px-2 py-2">
                <div class="text-sm font-medium text-[#EFEFEF]">{{ $teacher->teacher_name }}</div>
                <div class="text-xs text-gray-400">{{ $teacher->teacher_position }}</div>
            </div>
        </div>
    </td>
    <td class="align-left text-sm text-[#EFEFEF] pl-4">{{ $teacher->teacher_specialization }}</td>
    <td class="align-left text-sm text-[#EFEFEF] pl-4">{{ $teacher->teacher_email }}</td>
    <td class="align-left pl-3">
        <div class="flex align-left space-x-2">
            <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" onclick="openProfileModal('{{ $teacher->teacher_id }}')">
                <i class="bi bi-person-square text-lg"></i>
            </button>
            <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" data-action="edit" onclick="openEditModal('{{ $teacher->teacher_id }}')">
                <i class="bi bi-pencil-square text-lg"></i>
            </button>
            <button class="text-white-300 hover:text-white-200 p-1 rounded transform hover:scale-125 transition-transform duration-300" onclick="openChangePasswordModal('{{ $teacher->teacher_id }}')">
                <i class="bi bi-key-fill text-lg"></i>
            </button>
            <form action="{{ route('teachers.destroy', $teacher->teacher_id) }}" method="POST" class="inline-block delete-form">
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