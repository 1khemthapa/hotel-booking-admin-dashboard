<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Luxury Hotel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-cover bg-center"
      style="background-image: url('{{ asset('hotel2.jpg') }}');">

<!-- Background Overlay -->
<div class="min-h-screen bg-black/60 flex flex-col">

    <!-- Header -->
    <header class="flex justify-between items-center px-10 py-6">
        <h1 class="text-white text-xl font-semibold tracking-wide">
           Luxury Hotel
        </h1>

        <nav class="flex gap-4">
            <a href="{{ route('login') }}"
               class="px-6 py-2 border border-white text-white rounded-full hover:bg-white hover:text-black transition">
                Log in
            </a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}"
                   class="px-6 py-2 bg-red-600 text-white rounded-full hover:bg-red-700 transition">
                    Register
                </a>
            @endif
        </nav>
    </header>

    <!-- Hero Section -->
    <main class="flex-grow flex flex-col items-center justify-center text-center px-6">
        <h2 class="text-5xl md:text-6xl font-bold text-white mb-6">
           Welcome
        </h2>

        <p class="text-lg md:text-xl text-gray-200 max-w-2xl mb-8">
            Manage rooms, reservations, staff, and hotel operations from one place.
        </p>

        <a href="{{ route('hotel.login') }}" class="font-xs text-xl text-white hover:text-blue-300 border-white border px-3 py-2 rounded-xl">Login as a hotel owner</a>
    </main>

</div>
</body>
</html>
