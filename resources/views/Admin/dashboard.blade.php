<x-layoutAdmin>
    <div class="p-6 space-y-6">
        {{-- Page Header --}}
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">Dashboard Inventaris</h2>

        </div>

        {{-- Statistik Utama --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="card bg-primary text-primary-content shadow-xl">
                <div class="card-body">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="card-title">Total Peminjaman</h4>
                            <p class="text-3xl font-bold mt-2">19</p>
                        </div>
                        <div class="avatar placeholder">
                            <div class="bg-primary-focus text-primary-content rounded-full w-12">
                                <span class="text-xl">
                                    <i class="fa-solid fa-inbox"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm mt-2">Seluruh barang dipinjam</p>
                    <div class="mt-2">
                        <progress class="progress progress-secondary" value="70" max="100"></progress>
                    </div>
                </div>
            </div>

            <div class="card bg-secondary text-secondary-content shadow-xl">
                <div class="card-body">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="card-title">Barang Belum Kembali</h4>
                            <p class="text-3xl font-bold mt-2">18</p>
                        </div>
                        <div class="avatar placeholder">
                            <div class="bg-secondary-focus text-secondary-content rounded-full w-12">
                                <span class="text-xl">
                                    <i class="fa-solid fa-clock"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm mt-2">Sedang dalam masa pinjam</p>
                    <div class="mt-2">
                        <progress class="progress progress-primary" value="27" max="124"></progress>
                    </div>
                </div>
            </div>

            <div class="card bg-accent text-accent-content shadow-xl">
                <div class="card-body">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="card-title">Sudah Dikembalikan</h4>
                            <p class="text-3xl font-bold mt-2">1</p>
                        </div>
                        <div class="avatar placeholder">
                            <div class="bg-accent-focus text-accent-content rounded-full w-12">
                                <span class="text-xl">
                                    <i class="fa-solid fa-check-circle"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm mt-2">Barang yang sudah kembali</p>
                    <div class="mt-2">
                        <progress class="progress progress-primary" value="97" max="124"></progress>
                    </div>
                </div>
            </div>

            <div class="card bg-info text-info-content shadow-xl">
                <div class="card-body">
                    <div class="flex justify-between items-center">
                        <div>
                            <h4 class="card-title">Barang Favorit</h4>
                            <p class="text-3xl font-bold mt-2">Laptop</p>
                        </div>
                        <div class="avatar placeholder">
                            <div class="bg-info-focus text-info-content rounded-full w-12">
                                <span class="text-xl">
                                    <i class="fa-solid fa-star"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <p class="text-sm mt-2">Paling sering dipinjam</p>
                    <div class="mt-2">
                        <progress class="progress progress-primary" value="85" max="100"></progress>
                    </div>
                </div>
            </div>
        </div>

        {{-- Charts Section --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 ">
            {{-- Chart 1: Peminjaman Mingguan --}}
            <div class="card bg-base-200 shadow-xl">
                <div class="card-body">
                    <h3 class="card-title">Peminjaman Mingguan</h3>
                    <div class="w-full h-64" id="weeklyChart"></div>
                </div>
            </div>

            {{-- Chart 2: Kategori Peminjaman --}}
            <div class="card bg-base-200 shadow-xl">
                <div class="card-body">
                    <h3 class="card-title">Kategori Peminjaman</h3>
                    <div class="w-full h-64" id="categoryChart"></div>
                </div>
            </div>
        </div>

        {{-- Aktivitas Terbaru --}}
        <div class="card bg-base-200 shadow-xl">
            <div class="card-body">
                <h3 class="card-title">Aktivitas Terbaru</h3>
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th>Pengguna</th>
                                <th>Aktivitas</th>
                                <th>Barang</th>
                                <th>Waktu</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="avatar placeholder">
                                            <div class="bg-neutral-focus text-neutral-content rounded-full w-8">
                                                <span>AS</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">Asep</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Meminjam</td>
                                <td>Proyektor</td>
                                <td>2 menit lalu</td>
                                <td><div class="badge badge-primary">Dipinjam</div></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="avatar placeholder">
                                            <div class="bg-neutral-focus text-neutral-content rounded-full w-8">
                                                <span>SI</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">Siti</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Mengembalikan</td>
                                <td>Laptop</td>
                                <td>10 menit lalu</td>
                                <td><div class="badge badge-accent">Dikembalikan</div></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="avatar placeholder">
                                            <div class="bg-neutral-focus text-neutral-content rounded-full w-8">
                                                <span>DA</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">Dani</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Meminjam</td>
                                <td>Kamera</td>
                                <td>30 menit lalu</td>
                                <td><div class="badge badge-primary">Dipinjam</div></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="avatar placeholder">
                                            <div class="bg-neutral-focus text-neutral-content rounded-full w-8">
                                                <span>RA</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">Rani</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Meminjam</td>
                                <td>Microphone</td>
                                <td>1 jam lalu</td>
                                <td><div class="badge badge-primary">Dipinjam</div></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="flex items-center space-x-3">
                                        <div class="avatar placeholder">
                                            <div class="bg-neutral-focus text-neutral-content rounded-full w-8">
                                                <span>BU</span>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="font-bold">Budi</div>
                                        </div>
                                    </div>
                                </td>
                                <td>Meminjam</td>
                                <td>Speaker</td>
                                <td>2 jam lalu</td>
                                <td><div class="badge badge-primary">Dipinjam</div></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Make sure to include Font Awesome for icons --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    {{-- Include ApexCharts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.40.0/apexcharts.min.js"></script>

    <script>
        // Initialize charts when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Weekly Chart
            const weeklyChartOptions = {
                series: [{
                    name: 'Peminjaman',
                    data: [31, 40, 28, 51, 42, 33, 44]
                }, {
                    name: 'Pengembalian',
                    data: [25, 32, 26, 41, 40, 28, 37]
                }],
                chart: {
                    height: 250,
                    type: 'line',
                    toolbar: {
                        show: false
                    }
                },
                colors: ['#36D399', '#3ABFF8'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                grid: {
                    borderColor: '#e0e0e0',
                    row: {
                        colors: ['transparent']
                    }
                },
                xaxis: {
                    categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                    labels: {
                        style: {
                            colors: '#718096'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#718096'
                        }
                    }
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right'
                },
                tooltip: {
                    theme: 'dark'
                }
            };

            // Initialize Category Chart
            const categoryChartOptions = {
                series: [44, 55, 13, 33, 22],
                chart: {
                    height: 250,
                    type: 'donut',
                },
                labels: ['Laptop', 'Proyektor', 'Kamera', 'Speaker', 'Lainnya'],
                colors: ['#FF9F43', '#36D399', '#3ABFF8', '#F87272', '#A78BFA'],
                legend: {
                    position: 'bottom'
                },
                responsive: [{
                    breakpoint: 480,
                    options: {
                        chart: {
                            width: 200
                        },
                        legend: {
                            position: 'bottom'
                        }
                    }
                }],
                tooltip: {
                    theme: 'dark'
                }
            };

            const weeklyChart = new ApexCharts(document.querySelector("#weeklyChart"), weeklyChartOptions);
            const categoryChart = new ApexCharts(document.querySelector("#categoryChart"), categoryChartOptions);

            weeklyChart.render();
            categoryChart.render();
        });
    </script>
</x-layoutAdmin>
