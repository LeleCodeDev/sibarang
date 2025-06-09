<!-- Item Detail Modal -->
<dialog id="detail_modal_{{ $item->id }}" class="modal modal-bottom sm:modal-middle">
  <div class="modal-box bg-base-100 w-full space-y-2" style="max-width:70rem;">
    <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
        <circle cx="12" cy="12" r="3"></circle>
      </svg>
      Item Details
    </h3>

    <!-- Main Content: Image + Details -->
    <div class="flex flex-col md:flex-row gap-6">
      <!-- Item Image -->
      <div class="w-full md:w-1/2 lg:w-3/5">
        <div class="rounded-lg overflow-hidden shadow-md bg-base-200">
          <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
            class="w-full h-64 md:h-80 object-cover">
        </div>
      </div>

      <!-- Item Information -->
      <div class="w-full md:w-1/2 lg:w-2/5">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 space-y-2">
          <div>
            <h4 class="text-sm font-medium text-base-content/70">Item Name</h4>
            <p class="text-base-content font-semibold text-lg">{{ $item->name }}</p>
          </div>
          <div>
            <h4 class="text-sm font-medium text-base-content/70">Category</h4>
            <p class="text-base-content">{{ $item->category->name }}</p>
          </div>
          <div>
            <h4 class="text-sm font-medium text-base-content/70">Quantity</h4>
            <div
              class="badge badge-lg badge-soft {{ $item->quantity > 10 ? 'badge-success' : ($item->quantity > 0 ? 'badge-accent' : 'badge-error') }}">
              {{ $item->quantity }}
            </div>
          </div>
          <div>
            <h4 class="text-sm font-medium text-base-content/70">Status</h4>
            <div class="badge badge-lg badge-soft {{ $item->status == 'available' ? 'badge-success' : 'badge-error' }}">
              {{ $item->status }}
            </div>
          </div>
        </div>

        <!-- Description Section -->
        <div class="mt-6">
          <h4 class="text-sm font-medium text-base-content/70 mb-2">Description</h4>
          <div class="bg-base-200 p-4 rounded-lg">
            <p class="text-base-content">{{ $item->description }}</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Additional Details/Metadata -->
    <div class="divider my-4"></div>
    <div class="grid grid-cols-2 gap-4 text-sm">
      <div>
        <span class="text-base-content/70">Created At:</span>
        <span class="ml-1">{{ $item->created_at->format('d M Y') }}</span>
      </div>
      <div>
        <span class="text-base-content/70">Last Updated:</span>
        <span class="ml-1">{{ $item->updated_at->format('d M Y') }}</span>
      </div>
    </div>

    <!-- Actions -->
    <div class="modal-action">
      <button onclick="detail_modal_{{ $item->id }}.close()" type="submit" class="btn">Close</button>
    </div>
  </div>

  <!-- Close button for the modal -->
  <form method="dialog" class="modal-backdrop">
    <button>close</button>
  </form>
</dialog>
