<!DOCTYPE html>
<html lang="en" data-theme="dracula">
<head>
    <meta charset="UTF-8">
    <title>{{ ENV('APP_NAME') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Nunito-wght0400;600;700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    @livewireStyles
</head>
<body>
    {{ $slot }}

    @livewireScripts
</body>
</html>
