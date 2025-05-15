    @extends('layout.homelayouts')
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @section('konten')

    @php
    $features = [
        [
            'title' => 'Barang Terpopuler',
            'desc' => 'Temukan barang-barang yang paling sering dipinjam oleh pengguna lain. Mulai dari elektronik, hingga perlengkapan event.',
        ],
        [
            'title' => 'Pinjam Mudah & Cepat',
            'desc' => 'Proses peminjaman simpel dan cepat. Cukup pilih barang, ajukan pinjam, dan tunggu konfirmasi dari pemilik barang.',
        ],
        [
            'title' => 'Kategori Lengkap',
            'desc' => 'Jelajahi berbagai kategori seperti alat dapur, perlengkapan olahraga, gadget, hingga kostum. Semua tersedia di Si Barang!',
        ],
        [
            'title' => 'Keamanan Terjamin',
            'desc' => 'Sistem verifikasi akun dan ulasan dari pengguna lain membuat transaksi menjadi aman dan terpercaya.',
        ],
    ];
    @endphp

    <!-- Hero + Feature Cards -->
    <section class="bg-white text-gray-700 body-font">
    <div class="container px-5 py-24 mx-auto text-center">
        <h2 class="text-xs text-purple-500 tracking-widest font-medium mb-1">Selamat Datang di</h2>
        <h1 class="sm:text-4xl text-3xl font-bold text-gray-900 mb-4">Si Barang</h1>
        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Platform peminjaman barang terpercaya. Temukan, pinjam, dan kelola barang dengan mudah hanya dalam beberapa klik.</p>
        <a href="{{ route('login') }}">
        <button class="mt-10 px-8 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">Mulai Sekarang</button>
        </a>
    </div>

    <div class="container mx-auto px-5 mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($features as $feature)
        <div class="bg-gray-50 shadow-md rounded-lg p-6 text-left hover:shadow-lg transition">
        <h3 class="text-lg font-semibold text-purple-600 mb-2">{{ $feature['title'] }}</h3>
        <p class="text-sm text-gray-600">{{ $feature['desc'] }}</p>
        </div>
        @endforeach
    </div>
    </section>

    <!-- Section: Statistik -->
    <section class="bg-gray-100 py-24">
    <div class="container mx-auto flex flex-col-reverse md:flex-row items-center px-5">
        <div class="md:w-1/2 mt-10 md:mt-0">
        <h2 class="text-3xl font-bold mb-4 text-gray-900">Statistik Mudah Dipantau</h2>
        <p class="text-gray-600 mb-6">Pantau semua aktivitas barangmu lewat dashboard yang interaktif dan informatif. Mulai dari jumlah peminjaman, kategori populer, hingga status pengembalian.</p>
        </div>
        <div class="md:w-1/2">
        <img src="{{ asset('image/statistik.png') }}" class="rounded-lg shadow-md" alt="Dashboard Statistik">
        </div>
    </div>
    </section>

    <!-- Section: Kelola Kategori -->
    <section class="bg-white py-24">
    <div class="container mx-auto flex flex-col md:flex-row items-center px-5">
        <div class="md:w-1/2">
        <img src="{{ asset('image/categories.png') }}" class="rounded-lg shadow-md" alt="Kelola Kategori">
        </div>
        <div class="md:w-1/2 md:pl-10 mt-10 md:mt-0">
        <h2 class="text-3xl font-bold mb-4 text-gray-900">Kelola Kategori Barang</h2>
        <p class="text-gray-600">Buat dan atur kategori barang sesuai kebutuhanmu. Si Barang membantu menyederhanakan pengelompokan barang agar pencarian lebih cepat dan efisien.</p>
        </div>
    </div>
    </section>



    <!-- FAQ Section -->
    <section class="py-24 bg-white">
    <div class="max-w-5xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-12">Pertanyaan yang Sering Diajukan</h2>
        <div class="space-y-8">
        <div>
            <h3 class="text-lg font-semibold text-gray-700">Apakah aplikasi ini gratis digunakan?</h3>
            <p class="text-gray-600">Ya, Si Barang dapat digunakan secara gratis untuk kebutuhan pribadi maupun komunitas kecil.</p>
        </div>
        <div>
            <h3 class="text-lg font-semibold text-gray-700">Apakah data barang saya aman?</h3>
            <p class="text-gray-600">Tentu. Kami menggunakan sistem yang simple untuk mudah di gunakan oleh pengguna.</p>
        </div>
        <div>
            <h3 class="text-lg font-semibold text-gray-700">Siapa saja yang bisa menggunakan Si Barang?</h3>
            <p class="text-gray-600">Siapapun! Mulai dari individu, komunitas, dll.</p>
        </div>
        </div>
    </div>
    </section>

    @endsection
