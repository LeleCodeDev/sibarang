<x-layoutAdmin>
    <div class="min-h-screen w-full bg-base-100 p-5">

        <div class="flex flex-col gap-5 mb-6">

            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                <div>
                    <h1 class="text-2xl font-bold text-base-content">User Management</h1>
                    <p class="text-sm text-base-content/70">Manage all users including operator and peminjam.</p>
                </div>

            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="card bg-primary text-primary-content shadow-md">
                    <div class="card-body">
                        <h2 class="card-title">Total Operators</h2>
                        <p class="text-3xl font-bold">{{ $operatorCount }}</p>
                    </div>
                </div>
                <div class="card bg-secondary text-secondary-content shadow-md">
                    <div class="card-body">
                        <h2 class="card-title">Total Peminjam</h2>
                        <p class="text-3xl font-bold">{{ $peminjamCount }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex w-full justify-between gap-2 mb-3">
            <a href="{{ route('user.create') }}" class="btn btn-sm btn-success">+ Add User</a>

            <form method="GET" action="{{ route('user.index') }}" class=" flex items-center gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Search user..."
                    class="input input-bordered input-sm w-52" />
                <button type="submit" class="btn btn-sm btn-primary">Search</button>
            </form>
        </div>

        <div class="overflow-x-auto rounded-box border border-base-content/10 bg-base-200">
            <table class="table table-zebra">
                <thead>
                    <tr class="text-base-content">
                        <th></th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <th>{{ $loop->iteration + ($users->currentPage() - 1) * $users->perPage() }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <span
                                    class="badge badge-outline badge-sm
                                {{ $user->role === 'operator' ? 'badge-primary' : 'badge-secondary' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td>
                                <div class="dropdown dropdown-end">
                                    <div tabindex="0" role="button" class="btn btn-ghost btn-circle btn-sm">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                            fill="currentColor">
                                            <path
                                                d="M6 10a2 2 0 114 0 2 2 0 01-4 0zm4-6a2 2 0 11-4 0 2 2 0 014 0zm0 12a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                    </div>
                                    <ul tabindex="0"
                                        class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-40">
                                        <li>
                                            <a href="{{ route('user.show', $user->id) }}">Detail</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.edit', $user->id) }}">Edit</a>
                                        </li>
                                        <li>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this user?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-base-content/60">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $users->links('pagination::tailwind') }}
        </div>

        <!-- Modal Trigger -->
        {{-- <div class="mt-6">
            <button class="btn btn-info btn-sm" onclick="userStats.showModal()">Show User Stats</button>
        </div>

        <!-- Modal -->
        <dialog id="userStats" class="modal">
            <div class="modal-box">
                <h3 class="font-bold text-lg">User Statistics</h3>
                <p class="py-2">Total Operators: <span class="font-semibold">{{ $operatorCount }}</span></p>
                <p class="py-2">Total Peminjam: <span class="font-semibold">{{ $peminjamCount }}</span></p>
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn btn-sm">Close</button>
                    </form>
                </div>
            </div>
        </dialog> --}}
    </div>
</x-layoutAdmin>
