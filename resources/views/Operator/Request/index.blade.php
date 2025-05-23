<x-layoutOperator>
    <div class="min-h-screen w-full bg-base-100 p-5">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 mb-6">
            <div>
                <h1 class="text-2xl font-bold text-base-content">Borrow Requests</h1>
                <p class="text-sm text-base-content/70">Manage all borrowing requests.</p>
            </div>
        </div>

        <div class="flex flex-col sm:flex-row w-full justify-between gap-4 mb-4">
            <form method="GET" action="" class="w-full md:w-auto flex items-center gap-2">
                <div class="join w-full">
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Request..."
                        class="input input-bordered input-sm join-item w-full" />
                    <button type="submit" class="btn btn-sm btn-primary join-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </div>
            </form>

            <form method="GET" action="" class="w-full md:w-auto">
                <div class="join">
                    <select name="status" class="select select-bordered select-sm join-item">
                        <option value="">All Status</option>
                        <option value="processed" {{ request('status') == 'processed' ? 'selected' : '' }}>Processed
                        </option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Approved
                        </option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>Rejected
                        </option>
                        <option value="returned" {{ request('status') == 'returned' ? 'selected' : '' }}>Returned
                        </option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-primary join-item">Filter</button>
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
                                <th>Borrower</th>
                                <th>Items</th>
                                <th>Request Date</th>
                                <th>Return Date</th>
                                <th>Status</th>
                                <th class="text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($borrowRequests as $request)
                                <tr class="hover">
                                    <th>{{ $loop->iteration + ($borrowRequests->currentPage() - 1) * $borrowRequests->perPage() }}
                                    </th>
                                    <td>{{ $request->borrower->name }}</td>
                                    <td class="max-w-[200px]">
                                        <div class="flex flex-wrap gap-1">
                                            @foreach ($request->requestItems as $requestItem)
                                                <span class="badge badge-sm">{{ $requestItem->item->name }}
                                                    ({{ $requestItem->quantity }})
                                                </span>
                                            @endforeach
                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($request->request_date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($request->return_date)->format('d M Y') }}</td>
                                    <td>
                                        @if ($request->status == 'processed')
                                            <span class="badge badge-warning">processed</span>
                                        @elseif($request->status == 'approved')
                                            <span class="badge badge-success">Approved</span>
                                        @elseif($request->status == 'rejected')
                                            <span class="badge badge-error">Rejected</span>
                                        @elseif($request->status == 'returned')
                                            <span class="badge badge-info">Returned</span>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-end">
                                            <div tabindex="0" role="button" class="btn btn-ghost btn-circle btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M6 10a2 2 0 114 0 2 2 0 01-4 0zm4-6a2 2 0 11-4 0 2 2 0 014 0zm0 12a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                            </div>
                                            <ul tabindex="0"
                                                class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-40">
                                                <li>
                                                    <button onclick="detail_modal_{{ $request->id }}.showModal()"
                                                        class="flex items-center gap-2">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2"
                                                            stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z">
                                                            </path>
                                                            <circle cx="12" cy="12" r="3"></circle>
                                                        </svg>
                                                        Detail
                                                    </button>
                                                </li>

                                                @if ($request->status == 'processed')
                                                    <li>
                                                        <form action="" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="flex items-center gap-2 text-success w-full">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                                </svg>
                                                                Approve
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="flex items-center gap-2 text-error w-full">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <line x1="18" y1="6"
                                                                        x2="6" y2="18"></line>
                                                                    <line x1="6" y1="6"
                                                                        x2="18" y2="18"></line>
                                                                </svg>
                                                                Reject
                                                            </button>
                                                        </form>
                                                    </li>
                                                @endif

                                                @if ($request->status == 'approved')
                                                    <li>
                                                        <form action="" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit"
                                                                class="flex items-center gap-2 text-info w-full">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round">
                                                                    <path d="M15 17l5-5-5-5"></path>
                                                                    <path d="M19 12H4"></path>
                                                                </svg>
                                                                Mark as Returned
                                                            </button>
                                                        </form>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                {{-- @include('Operator.Request.detail') --}}

                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-8 text-base-content/60">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="h-10 w-10 mx-auto mb-2 opacity-30" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="1"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <line x1="12" y1="8" x2="12" y2="12">
                                            </line>
                                            <line x1="12" y1="16" x2="12.01" y2="16">
                                            </line>
                                        </svg>
                                        No borrow requests found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    @foreach ($borrowRequests as $request)
                        @include('Operator.Request.detail')
                    @endforeach

                </div>
            </div>
        </div>


        <!-- Pagination -->
        <div class="mt-6">
            {{ $borrowRequests->links('pagination::daisyui') }}
        </div>
    </div>
</x-layoutOperator>
