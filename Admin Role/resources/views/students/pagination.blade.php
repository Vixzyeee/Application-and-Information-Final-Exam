@if ($students->hasPages())
    <div class="flex items-center justify-between w-full ml-[108px]">
        <div class="flex items-center gap-2">
            <span class="text-sm text-gray-400">
                Showing {{ $students->firstItem() }} to {{ $students->lastItem() }} of {{ $students->total() }} entries
            </span>
        </div>

        <div class="flex items-center gap-2 mr-4 bottom-2">
            {{-- Previous Page Link --}}
            <button 
                onclick="changePage({{ $students->currentPage() - 1 }})"
                class="px-3 py-1 rounded-md {{ !$students->onFirstPage() ? 'bg-[#1E1F25] text-white hover:bg-blue-600' : 'bg-[#17181F] text-gray-500 cursor-not-allowed' }}"
                {{ $students->onFirstPage() ? 'disabled' : '' }}
            >
                Previous
            </button>

            {{-- Page Numbers --}}
            @foreach ($students->getUrlRange(max($students->currentPage() - 2, 1), min($students->currentPage() + 2, $students->lastPage())) as $page => $url)
                <button 
                    onclick="changePage({{ $page }})"
                    class="px-3 py-1 rounded-md {{ $page == $students->currentPage() ? 'bg-[#17181F] text-white' : 'bg-[#1E1F25] text-white hover:bg-blue-600' }}"
                >
                    {{ $page }}
                </button>
            @endforeach

            {{-- Next Page Link --}}
            <button 
                onclick="changePage({{ $students->currentPage() + 1 }})"
                class="px-3 py-1 rounded-md {{ $students->hasMorePages() ? 'bg-[#1E1F25] text-white hover:bg-blue-600' : 'bg-[#17181F] text-gray-500 cursor-not-allowed' }}"
                {{ !$students->hasMorePages() ? 'disabled' : '' }}
            >
                Next
            </button>
        </div>
    </div>
@endif 