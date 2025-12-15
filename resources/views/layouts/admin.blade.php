<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - BrownyGift</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#ff69b4',
                        'primary-dark': '#ff1493',
                        'primary-light': '#ffb6c1',
                        'pink-50': '#fff0f5',
                        'pink-100': '#ffe4e8',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-pink-50 font-sans">
    <div class="flex">
        @include('components.sidebar-admin')

        <div class="flex-1 ml-64 p-8 min-h-screen">
            @yield('content')
        </div>
    </div>
    @stack('scripts')
</body>

</html>
