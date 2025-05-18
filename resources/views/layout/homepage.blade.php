@extends('layout.homelayouts')
@vite(['resources/css/app.css', 'resources/js/app.js'])

@section('konten')

@php
$features = [
    [
        'title' => 'Barang Terpopuler',
        'desc' => 'Temukan barang-barang yang paling sering dipinjam oleh pengguna lain. Mulai dari elektronik, hingga perlengkapan event.',
        'icon' => 'trophy'
    ],
    [
        'title' => 'Pinjam Mudah & Cepat',
        'desc' => 'Proses peminjaman simpel dan cepat. Cukup pilih barang, ajukan pinjam, dan tunggu konfirmasi dari pemilik barang.',
        'icon' => 'bolt'
    ],
    [
        'title' => 'Kategori Lengkap',
        'desc' => 'Jelajahi berbagai kategori seperti alat dapur, perlengkapan olahraga, gadget, hingga kostum. Semua tersedia di Si Barang!',
        'icon' => 'list'
    ],
    [
        'title' => 'Keamanan Terjamin',
        'desc' => 'Sistem verifikasi akun dan ulasan dari pengguna lain membuat transaksi menjadi aman dan terpercaya.',
        'icon' => 'shield'
    ],
];
@endphp


<!-- Hero Section -->
<div class="hero min-h-[70vh] bg-base-200">
  <div class="hero-content text-center">
    <div class="max-w-md">
      <div class="badge badge-primary mb-2">Selamat Datang di</div>
      <h1 class="text-5xl font-bold">Si Barang</h1>
      <p class="py-6">Platform peminjaman barang terpercaya. Temukan, pinjam, dan kelola barang dengan mudah hanya dalam beberapa klik.</p>
      <a href="{{ route('login') }}">
        <button class="btn btn-primary">Mulai Sekarang</button>
      </a>
    </div>
  </div>
</div>

<!-- Feature Cards -->
<section class="py-12 bg-base-100">
  <div class="container mx-auto px-4">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
      @foreach($features as $feature)
      <div class="card bg-base-200 shadow-xl hover:shadow-2xl transition-all duration-300">
        <div class="card-body">
          <div class="flex items-center mb-2">
            <div class="badge badge-primary mr-2">
              <i class="fa-solid fa-{{ $feature['icon'] }}"></i>
            </div>
            <h2 class="card-title text-primary">{{ $feature['title'] }}</h2>
          </div>
          <p>{{ $feature['desc'] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Section: Statistik -->
<section class="py-16 bg-base-200">
  <div class="container mx-auto px-4">
    <div class="flex flex-col-reverse md:flex-row items-center">
      <div class="md:w-1/2 mt-10 md:mt-0">
        <h2 class="text-3xl font-bold mb-4">Statistik Mudah Dipantau</h2>
        <p class="mb-6 text-base-content/80">Pantau semua aktivitas barangmu lewat dashboard yang interaktif dan informatif. Mulai dari jumlah peminjaman, kategori populer, hingga status pengembalian.</p>
        <button class="btn btn-outline btn-primary">Lihat Detail</button>
      </div>
      <div class="md:w-1/2 md:pl-8">
        <div class="mockup-window border bg-base-300">
          <img src="{{ asset('image/statistik.png') }}" class="w-full" alt="Dashboard Statistik">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section: Kelola Kategori -->
<section class="py-16 bg-base-100">
  <div class="container mx-auto px-4">
    <div class="flex flex-col md:flex-row items-center">
      <div class="md:w-1/2">
        <div class="mockup-window border bg-base-300">
          <img src="{{ asset('image/categories.png') }}" class="w-full" alt="Kelola Kategori">
        </div>
      </div>
      <div class="md:w-1/2 md:pl-10 mt-10 md:mt-0">
        <h2 class="text-3xl font-bold mb-4">Kelola Kategori Barang</h2>
        <p class="text-base-content/80">Buat dan atur kategori barang sesuai kebutuhanmu. Si Barang membantu menyederhanakan pengelompokan barang agar pencarian lebih cepat dan efisien.</p>
        <button class="btn btn-outline btn-primary mt-4">Pelajari Lebih Lanjut</button>
      </div>
    </div>
  </div>
</section>

<!-- FAQ Section -->
<section class="py-16 bg-base-200">
  <div class="max-w-4xl mx-auto px-4">
    <h2 class="text-3xl font-bold text-center mb-12">Pertanyaan yang Sering Diajukan</h2>

    <div class="space-y-4">
      <div class="collapse collapse-arrow bg-base-100">
        <input type="radio" name="my-accordion-2" checked="checked" />
        <div class="collapse-title text-lg font-medium">
          Apakah aplikasi ini gratis digunakan?
        </div>
        <div class="collapse-content">
          <p>Ya, Si Barang dapat digunakan secara gratis untuk kebutuhan pribadi maupun komunitas kecil.</p>
        </div>
      </div>

      <div class="collapse collapse-arrow bg-base-100">
        <input type="radio" name="my-accordion-2" />
        <div class="collapse-title text-lg font-medium">
          Apakah data barang saya aman?
        </div>
        <div class="collapse-content">
          <p>Tentu. Kami menggunakan sistem yang simple untuk mudah di gunakan oleh pengguna.</p>
        </div>
      </div>

      <div class="collapse collapse-arrow bg-base-100">
        <input type="radio" name="my-accordion-2" />
        <div class="collapse-title text-lg font-medium">
          Siapa saja yang bisa menggunakan Si Barang?
        </div>
        <div class="collapse-content">
          <p>Siapapun! Mulai dari individu, komunitas, dll.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Section -->
<section class="py-12 bg-base-100">
  <div class="container mx-auto px-4 text-center">
    <div class="card w-full bg-primary text-primary-content">
      <div class="card-body">
        <h2 class="card-title justify-center text-2xl mb-2">Siap Bergabung dengan Si Barang?</h2>
        <p>Mulai mengelola barang dan peminjaman dengan lebih efisien sekarang.</p>
        <div class="card-actions justify-center mt-4">
          <a href="{{ route('login') }}">
            <button class="btn btn-outline">Masuk</button>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection
