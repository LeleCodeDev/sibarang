<x-layoutAdmin>
    <div class="p-6 space-y-6">
        <div class="flex justify-between items-center">
            <h2 class="text-2xl font-bold">Dashboard Inventaris</h2>

        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <!-- Total Peminjaman -->
            <div class="card bg-base-200 shadow-md">
                <div class="card-body">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-primary/20">
                            <i class="fa-solid fa-inbox text-primary text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-base-content/70">Total Peminjaman</p>
                            <p class="text-xl font-bold">19</p>
                        </div>
                    </div>
                    <p class="text-sm mt-4 text-base-content/70">Seluruh barang dipinjam</p>
                    <progress class="progress progress-primary mt-2" value="70" max="100"></progress>
                </div>
            </div>

            <!-- Barang Belum Kembali -->
            <div class="card bg-base-200 shadow-md">
                <div class="card-body">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-secondary/20">
                            <i class="fa-solid fa-clock text-secondary text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-base-content/70">Barang Belum Kembali</p>
                            <p class="text-xl font-bold">18</p>
                        </div>
                    </div>
                    <p class="text-sm mt-4 text-base-content/70">Sedang dalam masa pinjam</p>
                    <progress class="progress progress-secondary mt-2" value="27" max="124"></progress>
                </div>
            </div>

            <!-- Sudah Dikembalikan -->
            <div class="card bg-base-200 shadow-md">
                <div class="card-body">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-accent/20">
                            <i class="fa-solid fa-check-circle text-accent text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-base-content/70">Sudah Dikembalikan</p>
                            <p class="text-xl font-bold">1</p>
                        </div>
                    </div>
                    <p class="text-sm mt-4 text-base-content/70">Barang yang sudah kembali</p>
                    <progress class="progress progress-accent mt-2" value="97" max="124"></progress>
                </div>
            </div>

            <!-- Barang Favorit -->
            <div class="card bg-base-200 shadow-md">
                <div class="card-body">
                    <div class="flex items-center gap-3">
                        <div class="p-2 rounded-lg bg-info/20">
                            <i class="fa-solid fa-star text-info text-xl"></i>
                        </div>
                        <div>
                            <p class="text-sm text-base-content/70">Barang Favorit</p>
                            <p class="text-xl font-bold">Laptop</p>
                        </div>
                    </div>
                    <p class="text-sm mt-4 text-base-content/70">Paling sering dipinjam</p>
                </div>
            </div>
        </div>


        <div class="grid grid-cols-1 lg:grid-cols-1 gap-6 ">
            <div class="card bg-base-200 shadow-xl">
                <div class="card-body">
                    <h3 class="card-title">Peminjaman Mingguan</h3>
                    <div class="w-full h-64" id="weeklyChart"></div>
                </div>
            </div>

            <div class="card bg-base-200 shadow-xl">
                <div class="card-body">
                    <h3 class="card-title">Kategori Peminjaman</h3>
                    <div class="w-full h-64" id="categoryChart"></div>
                </div>
            </div>
        </div>

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
                                <td>
                                    <div class="badge badge-primary">Dipinjam</div>
                                </td>
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
                                <td>
                                    <div class="badge badge-accent">Dikembalikan</div>
                                </td>
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
                                <td>
                                    <div class="badge badge-primary">Dipinjam</div>
                                </td>
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
                                <td>
                                    <div class="badge badge-primary">Dipinjam</div>
                                </td>
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
                                <td>
                                    <div class="badge badge-primary">Dipinjam</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.40.0/apexcharts.min.js"></script>

    <script>
        // Initialize charts when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize Weekly Chart
            // Updated Weekly Chart Options
            const weeklyChartOptions = {
                series: [{
                        name: 'Peminjaman',
                        data: [31, 40, 28, 51, 42, 33, 44]
                    },
                    {
                        name: 'Pengembalian',
                        data: [25, 32, 26, 41, 40, 28, 37]
                    }
                ],
                chart: {
                    height: 250,
                    type: 'area',
                    toolbar: {
                        show: false
                    },
                    fontFamily: 'inherit',
                    foreColor: '#a3a3a3',
                },
                colors: ['#36D399', '#3ABFF8'],
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 3
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.4,
                        opacityTo: 0,
                        stops: [0, 100]
                    }
                },
                grid: {
                    borderColor: '#E5E7EB',
                    strokeDashArray: 4,
                },
                xaxis: {
                    categories: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
                    labels: {
                        style: {
                            colors: '#9CA3AF',
                            fontSize: '12px'
                        }
                    }
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: '#9CA3AF',
                            fontSize: '12px'
                        }
                    }
                },
                legend: {
                    position: 'top',
                    horizontalAlign: 'right',
                    labels: {
                        colors: '#6B7280'
                    }
                },
                tooltip: {
                    theme: 'dark'
                }
            };


            // Initialize Category Chart
            // Updated Category Chart Options
            const categoryChartOptions = {
                series: [44, 55, 13, 33, 22],
                chart: {
                    type: 'donut',
                    height: 250,
                    fontFamily: 'inherit',
                    foreColor: '#a3a3a3'
                },
                labels: ['Laptop', 'Proyektor', 'Kamera', 'Speaker', 'Lainnya'],
                colors: ['#FF9F43', '#36D399', '#3ABFF8', '#F87272', '#A78BFA'],
                legend: {
                    position: 'bottom',
                    labels: {
                        colors: '#6B7280'
                    }
                },
                dataLabels: {
                    style: {
                        colors: ['#ffffff']
                    }
                },
                tooltip: {
                    theme: 'dark'
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
                }]
            };


            const weeklyChart = new ApexCharts(document.querySelector("#weeklyChart"), weeklyChartOptions);
            const categoryChart = new ApexCharts(document.querySelector("#categoryChart"), categoryChartOptions);

            weeklyChart.render();
            categoryChart.render();
        });
    </script>
</x-layoutAdmin>
