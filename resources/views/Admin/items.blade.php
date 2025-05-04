<x-layoutAdmin>
    <div class="min-h-screen w-full bg-base-100 p-5">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-base-content">Item Management</h1>
                <p class="text-sm text-base-content/70">Manage all items.</p>
            </div>

        </div>

        <div class="flex flex-col sm:flex-row w-full justify-between gap-4 mb-4">
            <a href="{{ route('item.create') }}" class="btn btn-sm btn-success gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                Add item
            </a>

            <form method="GET" action="{{ route('item.index') }}" class="w-full md:w-auto flex items-center gap-2">
                <div class="join w-full">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Item..." class="input input-bordered input-sm join-item w-full" />
                    <button type="submit" class="btn btn-sm btn-primary join-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    </button>
                </div>
            </form>
        </div>

        <div class="card bg-base-200 shadow-md">
            <div class="card-body p-0">
                <div class="overflow-x-auto rounded-box">
                    <table class="table table-zebra">
                        <thead class="bg-base-300 text-base-content">
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                                <tr class="hover">
                                    <th>{{ $loop->iteration + ($items->currentPage() - 1) * $items->perPage() }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td class="truncate max-w-[200px] overflow-hidden whitespace-nowrap">{{ $item->description }}</td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td><img src="{{ $item->image }}" alt=""></td>
                                    <td>{{ $item->status }}</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-end">
                                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M6 10a2 2 0 114 0 2 2 0 01-4 0zm4-6a2 2 0 11-4 0 2 2 0 014 0zm0 12a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                            </div>
                                            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-40">
                                                <li>
                                                    <a href="{{ route('item.show', $item->id) }}" class="flex items-center gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                                                        Detail
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('item.edit', $item->id) }}" class="flex items-center gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <form action="{{ route('item.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this item?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="flex items-center gap-2 text-error">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                            Delete
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-8 text-base-content/60">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 mx-auto mb-2 opacity-30" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12.01" y2="16"></line></svg>
                                        No items found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-6 ">
            {{ $items->links('pagination::daisyui') }}
        </div>
    </div>
</x-layoutAdmin>
