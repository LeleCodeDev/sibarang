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

<div class="grid grid-cols-4 gap-6">
    @foreach($features as $feature)
    <div class="card bg-white shadow-sm w-full">
        <div class="card-body">
            <h2 class="card-title">{{ $feature['title'] }}</h2>
            <p>{{ $feature['desc'] }}</p>
        </div>
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
            <p class="mb-8 leading-relaxed">Si Barang membantu kamu mencatat, melacak, dan mengelola stok barang dengan cepat dan praktis. Dengan antarmuka yang sederhana dan fitur lengkap, kamu bisa melihat status barang secara real-time, mengatur ketersediaan, serta meminjamkan barang ke orang lain tanpa ribet. Cocok untuk keperluan pribadi, komunitas, hingga usaha kecil yang butuh sistem inventaris ringan tapi efektif.</p>
        </div>
    </div>
</section>
<section class="bg-white text-gray-700 body-font">
    <div class="container mx-auto px-5 py-24 flex justify-end">
      <div class="flex flex-col md:flex-row items-center">
        <div class="lg:flex-grow md:w-1/2 flex flex-col items-end text-right">
          <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">
            Kelola Barang
            <br class="hidden lg:inline-block">Jadi Mudah
          </h1>
          <p class="mb-8 leading-relaxed">
            Si Barang membantu kamu mencatat, melacak, dan mengelola stok barang dengan cepat dan praktis.
            Dengan antarmuka yang sederhana dan fitur lengkap, kamu bisa melihat status barang secara real-time,
            mengatur ketersediaan, serta meminjamkan barang ke orang lain tanpa ribet.
            Cocok untuk keperluan pribadi, komunitas, hingga usaha kecil yang butuh sistem inventaris ringan tapi efektif.
          </p>
        </div>
        <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 ml-10">
          <img class="object-cover object-center rounded" alt="hero" src="{{ asset('image/logosibar.jpg') }}">
        </div>

      </div>
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
            <p class="mb-8 leading-relaxed">Si Barang membantu kamu mencatat, melacak, dan mengelola stok barang dengan cepat dan praktis. Dengan antarmuka yang sederhana dan fitur lengkap, kamu bisa melihat status barang secara real-time, mengatur ketersediaan, serta meminjamkan barang ke orang lain tanpa ribet. Cocok untuk keperluan pribadi, komunitas, hingga usaha kecil yang butuh sistem inventaris ringan tapi efektif.</p>
        </div>
    </div>
</section>

@endsection
