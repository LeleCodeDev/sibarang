@extends('layout.homelayouts')

@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('konten')

<section class="bg-white text-gray-700 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h2 class="text-xs text-purple-500 tracking-widest font-medium title-font mb-1">HALAMAN SI BARANG</h2>
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Barangmu, Barangku, Barang Kita!</h1>
            <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Buat semua keperluanmu lebih praktis dengan Si Barang, aplikasi terpecaya untuk pinjam-meminjam barang antar pengguna.</p>
            <a href="{{ route('login')}}"><button class="flex mx-auto mt-16 text-white bg-purple-500 border-0 py-2 px-8 focus:outline-none hover:bg-purple-600 rounded text-lg">Coba Sekarang</button></a>
        </div>
        @php
      $features = [
        [
            'title' => 'Barang Terpopuler',
            'desc' => 'Temukan barang-barang yang paling sering dipinjam oleh pengguna lain. Mulai dari alat rumah tangga, elektronik, hingga perlengkapan event.',
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


   <div class="flex flex-wrap">
        @foreach($features as $feature)
        <div class="xl:w-1/4 lg:w-1/2 md:w-full px-8 py-6 border-l-2 border-gray-200 border-opacity-60">
                <h2 class="text-lg sm:text-xl text-gray-900 font-medium title-font mb-2">{{ $feature['title'] }}</h2>
                    <p class="leading-relaxed text-base mb-4">{{ $feature['desc'] }}</p>
            <a class="text-purple-500 inline-flex items-center" href="#">Learn More
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                    <path d="M5 12h14M12 5l7 7-7 7"></path>
                </svg>
            </a>
    </div>
    @endforeach
</div>
</section>

<section class="bg-white text-gray-700 body-font">
    <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 mb-10 md:mb-0">
            <img class="object-cover object-center rounded" alt="hero" src="{{ asset('image/logosibar.jpg') }}">
        </div>
        <div class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
            <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Kelola Barang
                <br class="hidden lg:inline-block">Jadi Mudah
            </h1>
            <p class="mb-8 leading-relaxed">Si Barang membantu kamu mencatat, melacak, dan mengelola stok barang dengan cepat dan praktis.</p>
        </div>
    </div>
</section>

@endsection
