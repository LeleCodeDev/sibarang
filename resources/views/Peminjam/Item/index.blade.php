<x-layoutPeminjam>
  <div class="min-h-screen w-full bg-base-100 p-5">
    <div class="max-w-7xl mx-auto">
      <!-- Header -->
      <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-bold text-base-content">Items List</h1>
        {{--        <input type="text" placeholder="Search items..." class="input input-bordered w-full max-w-xs" /> --}}
        <form method="GET" action="" class="w-full md:w-auto flex items-center gap-2">
          <div class="join w-full">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Item..."
              class="input input-bordered input-md join-item w-full" />
            <button type="submit" class="btn btn-md btn-primary join-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"></circle>
                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
              </svg>
            </button>
          </div>
        </form>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3  gap-8">
        @forelse ($items as $item)
          <div
            class="card bg-base-100 shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 md:hover:-translate-y-0 border border-base-300/50 group">
            <!-- Image Container with Overlay -->
            <figure onclick="detail_modal_{{ $item->id }}.showModal()"
              class="relative overflow-hidden rounded-t-2xl">
              <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                class="h-56 w-full object-cover transition-transform duration-300 group-hover:scale-110" />
              <div
                class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
              </div>

              <!-- Availability Badge -->

              <div class="absolute top-3 right-4">
                @if ($item->status === 'available')
                  <div class="badge badge-soft badge-success  font-semibold">
                    {{ $item->quantity }} Available
                  </div>
                @elseif($item->status === 'unavailable')
                  <div class="badge badge-soft badge-error  font-semibold">
                    Unavailable
                  </div>
                @endif
              </div>
            </figure>

            <!-- Card Content -->
            <div class="card-body p-6">
              <h2 class="card-title text-xl font-bold text-base-content mb-2 line-clamp-2">
                {{ $item->name }}
              </h2>

              <p class="text-base-content/70 text-sm leading-relaxed line-clamp-3 mb-4 truncate">
                {{ $item->description }}
              </p>

              <!-- Status and Actions -->
              <div class="flex items-center justify-end gap-3 mt-auto">
                <button onclick="detail_modal_{{ $item->id }}.showModal()"
                  class="btn btn-secondary hidden md:flex
                  btn-sm transition-all duration-300 shadow-lg hover:shadow-xl group/btn">
                  <svg class="w-4 h-4  transition-transform group-hover/btn:rotate-45"
                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                    </path>
                    <circle cx="12" cy="12" r="3"></circle>
                  </svg>
                  Detail
                </button>

                <button onclick="borrow_modal_{{ $item->id }}.showModal()"
                  class="btn btn-primary btn-sm  transition-all duration-300 shadow-lg hover:shadow-xl group/btn">
                  <svg class="w-4 h-4  transition-transform group-hover/btn:rotate-45" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                  </svg>
                  Borrow
                </button>
              </div>
            </div>
          </div>


          @include('Peminjam.Item.detail')
          @include('Peminjam.Item.borrow')
        @empty
          <div class="text-center py-16 col-span-4">
            <div class="bg-base-100 rounded-2xl shadow-lg p-12 border border-base-300 max-w-md mx-auto">
              <svg class="w-16 h-16 text-base-content/30 mx-auto mb-4" fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                </path>
              </svg>
              <h3 class="text-xl font-semibold text-base-content mb-2">No Items Found</h3>
              <p class="text-base-content/70">Try adjusting your search criteria or check back later.</p>
            </div>
          </div>
        @endforelse
      </div>
    </div>

    <div class="mt-6 ">
      {{ $items->links('pagination::daisyui') }}
    </div>

  </div>
</x-layoutPeminjam>
