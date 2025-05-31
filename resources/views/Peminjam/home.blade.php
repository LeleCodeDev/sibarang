<x-layoutPeminjam>
    <div class="min-h-screen w-full bg-base-100 p-5">
        <div class="card bg-base-200 shadow-md mb-6">
            <div class="card-body">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                    <div>
                        <h1 class="text-2xl font-bold text-base-content">Selamat Datang Kembali, {{ $username }}!
                        </h1>
                        <p class="text-sm text-base-content/70">Siap meminjam barang lagi?</p>
                    </div>
                    <form action="#" method="get">
                        <button type="submit" class="btn btn-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M12 5v14m-7-7h14"></path>
                            </svg>
                            Pinjam Barang
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <div class="card bg-base-200 shadow-md">
                <div class="card-body">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-primary/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="text-primary">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                </path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-base-content/70">Total Peminjaman</p>
                            <p class="text-xl font-bold">{{ $totalPeminjaman ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-base-200 shadow-md">
                <div class="card-body">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-warning/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="text-warning">
                                <circle cx="12" cy="12" r="10"></circle>
                                <polyline points="12,6 12,12 16,14"></polyline>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-base-content/70">Sedang Dipinjam</p>
                            <p class="text-xl font-bold">{{ $sedangDipinjam ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-base-200 shadow-md">
                <div class="card-body">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-success/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="text-success">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22,4 12,14.01 9,11.01"></polyline>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-base-content/70">Telah Dikembalikan</p>
                            <p class="text-xl font-bold">{{ $telahDikembalikan ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-base-200 shadow-md">
                <div class="card-body">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-error/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="text-error">
                                <circle cx="12" cy="12" r="10"></circle>
                                <line x1="15" y1="9" x2="9" y2="15"></line>
                                <line x1="9" y1="9" x2="15" y2="15"></line>
                            </svg>
                        </div>
                        <div>
                            <p class="text-sm text-base-content/70">Terlambat</p>
                            <p class="text-xl font-bold">{{ $terlambat ?? 0 }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Borrowings -->
        <div class="card bg-base-200 shadow-md mb-6">
            <div class="card-body p-0">
                <div class="p-6 pb-0">
                    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                        <div>
                            <h2 class="text-xl font-bold text-base-content">Peminjaman Terbaru</h2>
                            <p class="text-sm text-base-content/70">Riwayat peminjaman barang Anda.</p>
                        </div>
                        <a href="#" class="btn btn-sm btn-outline">
                            Lihat Semua
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto rounded-box">
                    <table class="table table-zebra">
                        <thead class="bg-base-300 text-base-content">
                            <tr>
                                <th></th>
                                <th>Barang</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Status</th>
                                <th class="text-right"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($recentBorrowings ?? [] as $borrowing)
                                {{-- @php
                                    $firstItem = $borrowing->requestItems->first()->item ?? null;
                                @endphp --}}
                                <tr class="hover">
                                    <th>{{ $loop->iteration }}</th>
                                    <td>
                                        @foreach ($borrowing->requestItems as $requestItem)
                                            @php
                                                $item = $requestItem->item;
                                            @endphp
                                            <div class="flex items-center gap-3 mb-2">
                                                <div class="avatar">
                                                    <div class="mask mask-squircle w-12 h-12">
                                                        <img src="{{ $item && $item->image ? asset('storage/' . $item->image) : asset('images/default.png') }}"
                                                            alt="{{ $item->name ?? 'Unknown Item' }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </td>

                                    <td>{{ \Carbon\Carbon::parse($borrowing->request_date)->format('d M Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($borrowing->return_date)->format('d M Y') }}</td>
                                    <td>
                                        @if ($borrowing->status === 'approved')
                                            <div class="badge badge-success">Dipinjam</div>
                                        @elseif($borrowing->status === 'returned')
                                            <div class="badge badge-info">Dikembalikan</div>
                                        @elseif($borrowing->status === 'terlambat')
                                            <div class="badge badge-error">Terlambat</div>
                                        @else
                                            <div class="badge badge-neutral">{{ ucfirst($borrowing->status) }}</div>
                                        @endif
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-end">
                                            <div tabindex="0" role="button"
                                                class="btn btn-ghost btn-circle btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                                    viewBox="0 0 20 20" fill="currentColor">
                                                    <path
                                                        d="M6 10a2 2 0 114 0 2 2 0 01-4 0zm4-6a2 2 0 11-4 0 2 2 0 014 0zm0 12a2 2 0 11-4 0 2 2 0 014 0z" />
                                                </svg>
                                            </div>
                                            <ul tabindex="0"
                                                class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-40">
                                                <li>
                                                    <button onclick="detail_modal_{{ $borrowing->id }}.showModal()"
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
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-8 text-base-content/60">
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
                                        Belum ada peminjaman.
                                    </td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
            <div class="card bg-base-200 shadow-md">
                <div class="card-body">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-2 rounded-lg bg-primary/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                                <path d="M19 7V4a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v16a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2">
                                </path>
                                <path d="M13 11h7m-3-3l3 3-3 3"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold">Pinjam Barang</h3>
                            <p class="text-sm text-base-content/70">Ajukan peminjaman baru</p>
                        </div>
                    </div>
                    <div class="card-actions">
                        <a href="#" class="btn btn-primary btn-sm">Mulai Pinjam</a>
                    </div>
                </div>
            </div>

            <div class="card bg-base-200 shadow-md">
                <div class="card-body">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="p-2 rounded-lg bg-info/20">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="text-info">
                                <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                </path>
                                <rect x="8" y="2" width="8" height="4" rx="1" ry="1">
                                </rect>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold">Riwayat Peminjaman</h3>
                            <p class="text-sm text-base-content/70">Lihat semua riwayat</p>
                        </div>
                    </div>
                    <div class="card-actions">
                        <a href="#" class="btn btn-info btn-sm">Lihat Riwayat</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layoutPeminjam>
