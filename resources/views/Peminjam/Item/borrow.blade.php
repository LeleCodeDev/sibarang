<dialog id="borrow_modal_{{ $item->id }}" class="modal">
  <div class="modal-box">
    <form method="POST" enctype="multipart/form-data" action="{{ route('borrow-request.store', $item->id) }}">
      @csrf
      <h3 class="font-bold text-lg mb-4">Borrow Item</h3>

      <div class="form-control mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" name="quantity" id="quantity" value="{{ old('quantity') }}"
          class="input input-bordered w-full @error('quantity') input-error @enderror"
          placeholder="Enter item quantity">
        @error('quantity')
          <label class="label">
            <span class="label-text-alt text-error">{{ $message }}</span>
          </label>
        @enderror
      </div>

      <div class="form-control mb-3">
        <label for="return_date" class="form-label">Return Date</label>
        <input type="date" name="return_date" id="return_date" value="{{ old('return_date') }}"
          class="input input-bordered w-full @error('return_date') input-error @enderror"
          placeholder="Enter item return_date">
        @error('return_date')
          <label class="label">
            <span class="label-text-alt text-error">{{ $message }}</span>
          </label>
        @enderror
      </div>

      <div class="modal-action">
        <button type="submit" class="btn btn-primary">Borrow</button>
        <button type="button" class="btn" onclick="borrow_modal_{{ $item->id }}.close()">Cancel</button>
      </div>
    </form>
  </div>
</dialog>
