<dialog id="edit_modal_{{ $category->id }}" class="modal">
    <div class="modal-box">
        <form method="POST" action="{{ route('category.update', $category->id) }}">
            @csrf
            @method('PUT')
            <h3 class="font-bold text-lg mb-4">Edit Category</h3>

            {{-- Name --}}
            <div class="form-control mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}"
                    class="input input-bordered w-full @error('name') input-error @enderror"
                    placeholder="Enter item name">
                @error('name')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            {{-- Description --}}
            <div class="form-control mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" rows="3"
                    class="textarea textarea-bordered w-full @error('description') textarea-error @enderror"
                    placeholder="Enter item description">{{ old('description', $category->description) }}</textarea>
                @error('description')
                    <label class="label">
                        <span class="label-text-alt text-error">{{ $message }}</span>
                    </label>
                @enderror
            </div>

            <div class="modal-action">
                <button type="submit" class="btn btn-primary">Edit</button>
                <button type="button" class="btn" onclick="edit_modal_{{ $category->id }}.close()">Cancel</button>
            </div>
        </form>
    </div>
</dialog>
