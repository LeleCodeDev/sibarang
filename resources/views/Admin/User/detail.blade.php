<dialog id="user_detail_modal_{{ $user->id }}" class="modal">
    <div class="modal-box max-w-3xl">
        <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
            User Detail
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- User Avatar Section -->
            <div class="flex flex-col items-center justify-center">
                <div class="avatar placeholder mb-4">
                    <div class="bg-neutral-focus text-neutral-content rounded-full w-24">
                        <span class="text-3xl">{{ substr($user->name, 0, 1) }}</span>
                    </div>
                </div>
                <span class="badge {{ $user->role === 'operator' ? 'badge-primary' : 'badge-secondary' }} badge-lg">
                    {{ ucfirst($user->role) }}
                </span>
            </div>

            <!-- User Info Section -->
            <div class="md:col-span-2">
                <div class="grid grid-cols-1 gap-3">
                    <!-- User ID -->
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-base-content/70">User ID</span>
                        <span class="text-base-content">{{ $user->id }}</span>
                    </div>

                    <!-- Name -->
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-base-content/70">Name</span>
                        <span class="text-base-content">{{ $user->name }}</span>
                    </div>

                    <!-- Email -->
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-base-content/70">Email</span>
                        <span class="text-base-content">{{ $user->email }}</span>
                    </div>

                    <!-- Phone (if available) -->
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-base-content/70">Phone</span>
                        <span class="text-base-content">{{ $user->phone ?? 'Not provided' }}</span>
                    </div>

                    <!-- Created At -->
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-base-content/70">Registered On</span>
                        <span class="text-base-content">{{ $user->created_at->format('d M Y, H:i') }}</span>
                    </div>

                    <!-- Last Updated -->
                    <div class="flex flex-col">
                        <span class="text-sm font-semibold text-base-content/70">Last Updated</span>
                        <span class="text-base-content">{{ $user->updated_at->format('d M Y, H:i') }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Activity Summary (Optional, if available) -->
        <div class="divider mt-4">Activity Summary</div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-4">
            <!-- Borrowing History -->
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-secondary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
                            <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
                        </svg>
                    </div>
                    <div class="stat-title">Total Borrowings</div>
                    <div class="stat-value text-secondary">{{ $user->borrowings_count ?? 0 }}</div>
                    <div class="stat-desc">Borrowing history</div>
                </div>
            </div>

            <!-- Account Status -->
            <div class="stats shadow">
                <div class="stat">
                    <div class="stat-figure text-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <div class="stat-title">Account Status</div>
                    <div class="stat-value text-primary">Active</div>
                    <div class="stat-desc">Since {{ $user->created_at->diffForHumans() }}</div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row justify-end gap-3 mt-6">
            <button onclick="edit_modal_{{ $user->id }}.showModal()" class="btn btn-sm btn-primary gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                </svg>
                Edit User
            </button>
            {{-- <form method="POST" action="{{ route('user.reset-password', $user->id) }}" class="w-full sm:w-auto">
                @csrf
                @method('POST')
                <button type="submit" class="btn btn-sm btn-warning gap-2 w-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                    Reset Password
                </button>
            </form> --}}
        </div>

        <!-- Close Button -->
        <div class="modal-action">
            <form method="dialog">
                <button class="btn">Close</button>
            </form>
        </div>
    </div>

    <!-- Modal Background -->
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
