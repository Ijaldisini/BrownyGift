<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Owner Panel')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Quicksand', sans-serif;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-gradient-to-br from-pink-50 to-pink-200 min-h-screen">

    <div class="flex min-h-screen">
        @include('components.sidebar-owner')

        <main class="flex-1 p-10">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>

</html>