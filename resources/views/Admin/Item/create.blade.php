<dialog id="add_modal" class="modal">
    <form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data" class="modal-box">
        @csrf
        <h3 class="font-bold text-lg mb-4">Add Item</h3>

        {{-- Name --}}
        <div class="form-control mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                class="input input-bordered w-full @error('name') input-error @enderror" placeholder="Enter item name">
            @error('name')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        {{-- Category --}}
        <div class="form-control mb-3">
            <label for="category_id" class="form-label">Category</label>
            <select name="category_id" id="category_id"
                class="select w-full input input-bordered @error('category_id') input-error @enderror">
                <option disabled selected>Choose a category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>


        {{-- Description --}}
        <div class="form-control mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" rows="6"
                class="textarea textarea-bordered w-full @error('description') textarea-error @enderror"
                placeholder="Enter item description">{{ old('description') }}</textarea>
            @error('description')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        {{-- Quantity --}}
        <div class="form-control mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}"
                class="input input-bordered w-full @error('quantity') input-error @enderror"
                placeholder="Enter quantity">
            @error('quantity')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        {{-- Image --}}
        <div class="form-control mb-3">
            <label for="image" class="form-label">Image</label>
            <img src="" class="rounded w-full" id="image-preview-add" alt="">
            <input type="file" name="image" id="image" onchange="previewImage(event)"
                class="file-input file-input-bordered w-full @error('image') input-error @enderror">
            @error('image')
                <label class="label">
                    <span class="label-text-alt text-error">{{ $message }}</span>
                </label>
            @enderror
        </div>

        {{-- Action Buttons --}}
        <div class="modal-action">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn" onclick="add_modal.close(); resetImage()">Cancel</button>
        </div>
    </form>
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('image-preview-add');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.add('my-3')
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

        function resetImage() {
            const preview = document.getElementById('image-preview-add');
            preview.src = '';
            preview.classList.remove('my-3')

        }
    </script>
</dialog>
