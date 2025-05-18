<x-layout>
    <div class="antialiased">
        @include('layout.partials.nav')

        @yield('konten')

        @include('layout.partials.footer')
    </div>
</x-layout>
