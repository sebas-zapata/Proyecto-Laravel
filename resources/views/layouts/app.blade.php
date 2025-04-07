@if (!auth()->check())
    <script>
        window.location.href = "{{ route('login') }}";
    </script>
@endif
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Scripts -->
@vite(['resources/css/app.css', 'resources/js/app.js'])

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Mi App Laravel')</title>

    <!-- Fonts -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
                <a href="{{ route('productos.index') }}" class="btn btn-secondary m-3 m-auto w-50 d-block">
                <i class="bi bi-box-seam"></i> Gestionar productos
                </a>
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main>
            @yield('content')
        </main>
    </div>
</body>

</html>