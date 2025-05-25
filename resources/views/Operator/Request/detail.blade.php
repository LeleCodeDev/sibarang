<dialog id="detail_modal_{{ $request->id }}" class="modal">
    <div class="modal-box max-w-3xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-lg mb-4">Borrow Request Details</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Request Information -->
            <div class="space-y-4">
                <div class="card bg-base-200">
                    <div class="card-body p-4">
                        <h4 class="font-semibold text-md mb-2">Request Information</h4>
                        <div class="grid grid-cols-3 gap-2 text-sm">
                            <span class="text-base-content/70">ID:</span>
                            <span class="col-span-2 font-medium">{{ $request->id }}</span>

                            <span class="text-base-content/70">Status:</span>
                            <span class="col-span-2">
                                @if ($request->status == 'processed')
                                    <span class="badge badge-warning">Processed</span>
                                @elseif($request->status == 'approved')
                                    <span class="badge badge-success">Approved</span>
                                @elseif($request->status == 'rejected')
                                    <span class="badge badge-error">Rejected</span>
                                @elseif($request->status == 'returned')
                                    <span class="badge badge-info">Returned</span>
                                @endif
                            </span>

                            <span class="text-base-content/70">Request Date:</span>
                            <span
                                class="col-span-2 font-medium">{{ \Carbon\Carbon::parse($request->request_date)->format('d M Y') }}</span>

                            <span class="text-base-content/70">Return Date:</span>
                            <span
                                class="col-span-2 font-medium">{{ \Carbon\Carbon::parse($request->return_date)->format('d M Y') }}</span>

                            <span class="text-base-content/70">Created At:</span>
                            <span
                                class="col-span-2 font-medium">{{ \Carbon\Carbon::parse($request->created_at)->format('d M Y H:i') }}</span>

                            @if ($request->operator)
                                <span class="text-base-content/70">Processed By:</span>
                                <span class="col-span-2 font-medium">{{ $request->operator->name }}</span>
                            @endif

                            @if ($request->status != 'processed')
                                <span class="text-base-content/70">Processed At:</span>
                                <span
                                    class="col-span-2 font-medium">{{ \Carbon\Carbon::parse($request->updated_at)->format('d M Y H:i') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Borrower Information -->
                <div class="card bg-base-200">
                    <div class="card-body p-4">
                        <h4 class="font-semibold text-md mb-2">Borrower Information</h4>
                        <div class="grid grid-cols-3 gap-2 text-sm">
                            <span class="text-base-content/70">Name:</span>
                            <span class="col-span-2 font-medium">{{ $request->borrower->name }}</span>

                            <span class="text-base-content/70">Email:</span>
                            <span class="col-span-2 font-medium">{{ $request->borrower->email }}</span>

                            @if ($request->borrower->phone)
                                <span class="text-base-content/70">Phone:</span>
                                <span class="col-span-2 font-medium">{{ $request->borrower->phone }}</span>
                            @endif
f
                        </div>
                    </div>
                </div>
            </div>

            <!-- Items Requested -->
            <divway class="card bg-base-200 h-fit">
                <div class="card-body p-4">
                    <h4 class="font-semibold text-md mb-2">Requested Items</h4>
                    <div class="overflow-x-auto">
                        <table class="table table-sm table-zebra">
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($request->requestItems as $item)
                                    <tr>
                                        <td>
                                            <div class="flex items-center gap-2">
                                                {{-- @if ($item->item->image)
                                                    <div class="avatar">
                                                        <div class="w-8 h-8 rounded">
                                                            <img src="{{ asset('storage/' . $item->item->image) }}"
                                                                alt="{{ $item->item->name }}">
                                                        </div>
                                                    </div>
                                                @endif --}}
                                                <span>{{ $item->item->name }}</span>
                                            </div>
                                        </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>
                                            @if ($item->item->quantity >= $item->quantity)
                                                <span class="badge badge-success badge-sm">Available</span>
                                            @else
                                                <span class="badge badge-error badge-sm">Insufficient</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </divway>
        </div>

        <!-- Notes -->
        @if ($request->notes)
            <div class="mt-4">
                <div class="card bg-base-200">
                    <div class="card-body p-4">
                        <h4 class="font-semibold text-md mb-2">Notes</h4>
                        <p class="text-sm">{{ $request->notes }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Action Buttons (Only for processed requests) -->
        @if ($request->status == 'processed')
            <div class="modal-action">
                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-error">Reject</button>
                </form>

                <form action="" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success">Approve</button>
                </form>
            </div>
        @endif
    </div>
</dialog>
