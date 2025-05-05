<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Si Barang</title>

    {{-- fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito-wght0400;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    @include('layout.partials.nav')

    @yield('konten')

    @include('layout.partials.footer')
</body>
</html>
