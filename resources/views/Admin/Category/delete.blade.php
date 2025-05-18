<dialog id="delete_modal_{{ $category->id }}" class="modal">
    <div class="modal-box">
        <form method="POST" action="{{ route('category.destroy', $category->id) }}">
            @csrf
            @method('DELETE')

            <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 mx-auto mb-2 opacity-30" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10"></circle>
                <line x1="12" y1="8" x2="12" y2="12">
                </line>
                <line x1="12" y1="16" x2="12.01" y2="16">
                </line>
            </svg>

            <h3 class="font-bold text-xl mb-4 text-center">Are you sure to delete this category ?</h3>

            <div class="w-full flex justify-center gap-2">
                <button type="submit" class="btn btn-error ">Delete</button>
                <button type="button" class="btn" onclick="delete_modal_{{ $category->id }}.close()">Cancel</button>
            </div>
        </form>
    </div>
</dialog>
