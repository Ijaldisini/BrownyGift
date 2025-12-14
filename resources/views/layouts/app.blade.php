<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BrownyGift')</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>

    @stack('styles')
</head>

<body class="bg-white text-gray-800 antialiased">

    {{-- Navbar --}}
    <x-navbar />

    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <x-footer />

    @stack('scripts')
</body>

</html>