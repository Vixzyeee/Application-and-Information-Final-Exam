@if ($teachers->hasPages())
    <div class="flex items-center justify-between w-full ml-[108px]">
        <div class="flex items-center gap-2">
            <span class="text-sm text-gray-400">
                Showing {{ $teachers->firstItem() }} to {{ $teachers->lastItem() }} of {{ $teachers->total() }} entries
            </span>
        </div>

        <div class="flex items-center gap-2 mr-4 bottom-2">
            {{-- Previous Page Link --}}
            <button 
                onclick="changePage({{ $teachers->currentPage() - 1 }})"
                class="px-3 py-1 rounded-md {{ !$teachers->onFirstPage() ? 'bg-[#1E1F25] text-white hover:bg-blue-600' : 'bg-[#17181F] text-gray-500 cursor-not-allowed' }}"
                {{ $teachers->onFirstPage() ? 'disabled' : '' }}
            >
                Previous
            </button>

            {{-- Page Numbers --}}
            @foreach ($teachers->getUrlRange(max($teachers->currentPage() - 2, 1), min($teachers->currentPage() + 2, $teachers->lastPage())) as $page => $url)
                <button 
                    onclick="changePage({{ $page }})"
                    class="px-3 py-1 rounded-md {{ $page == $teachers->currentPage() ? 'bg-[#17181F] text-white' : 'bg-[#1E1F25] text-white hover:bg-blue-600' }}"
                >
                    {{ $page }}
                </button>
            @endforeach

            {{-- Next Page Link --}}
            <button 
                onclick="changePage({{ $teachers->currentPage() + 1 }})"
                class="px-3 py-1 rounded-md {{ $teachers->hasMorePages() ? 'bg-[#1E1F25] text-white hover:bg-blue-600' : 'bg-[#17181F] text-gray-500 cursor-not-allowed' }}"
                {{ !$teachers->hasMorePages() ? 'disabled' : '' }}
            >
                Next
            </button>
        </div>
    </div>
@endif 