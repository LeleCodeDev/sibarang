<x-layoutAdmin>
<div class="p-6 space-y-6">

  <!-- Statistik Utama -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    
    <div class="bg-sky-500 text-white rounded-2xl p-6 shadow">
      <div class="flex justify-between items-center">
        <div>
          <h4 class="text-lg font-semibold">Total Peminjaman</h4>
          <p class="text-3xl font-bold mt-2">124</p>
        </div>
      </div>
      <p class="text-sm mt-2">Seluruh barang dipinjam</p>
    </div>

    <div class="bg-indigo-500 text-white rounded-2xl p-6 shadow">
      <div class="flex justify-between items-center">
        <div>
          <h4 class="text-lg font-semibold">Barang Belum Kembali</h4>
          <p class="text-3xl font-bold mt-2">27</p>
        </div>
      </div>
      <p class="text-sm mt-2">Sedang dalam masa pinjam</p>
    </div>

    <div class="bg-emerald-500 text-white rounded-2xl p-6 shadow">
      <div class="flex justify-between items-center">
        <div>
          <h4 class="text-lg font-semibold">Sudah Dikembalikan</h4>
          <p class="text-3xl font-bold mt-2">97</p>
        </div>
      </div>
      <p class="text-sm mt-2">Barang yang sudah kembali</p>
    </div>

    <div class="bg-yellow-500 text-white rounded-2xl p-6 shadow">
      <div class="flex justify-between items-center">
        <div>
          <h4 class="text-lg font-semibold">Barang Favorit</h4>
          <p class="text-3xl font-bold mt-2">Laptop</p>
        </div>
      </div>
      <p class="text-sm mt-2">Paling sering dipinjam</p>
    </div>
  </div>

  <!-- Aktivitas Terbaru -->
  <div class="bg-white rounded-2xl p-6 shadow text-gray-800">
    <h3 class="text-xl font-semibold mb-4">Aktivitas Terbaru</h3>
    <ul class="divide-y">
      <li class="py-3 flex justify-between">
        <span><strong>Asep</strong> meminjam <em>Proyektor</em></span>
        <span class="text-sm text-gray-500">2 menit lalu</span>
      </li>
      <li class="py-3 flex justify-between">
        <span><strong>Siti</strong> mengembalikan <em>Laptop</em></span>
        <span class="text-sm text-gray-500">10 menit lalu</span>
      </li>
      <li class="py-3 flex justify-between">
        <span><strong>Dani</strong> meminjam <em>Kamera</em></span>
        <span class="text-sm text-gray-500">30 menit lalu</span>
      </li>
    </ul>
  </div>

</div>



</x-layoutAdmin>
