<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') - Prueba</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="font-sans antialiased" x-data="{ confirmDialog : false }">

<div class="min-h-screen bg-gray-100 flex-row">
    <div class="flex flex-row bg-fondo-verde p-1">
        <a href="{{ route('escritorio') }}" class="bg-white px-2">
            <img src="{{ asset('./imagenes/logo.png') }}" class="w-44" alt="Logo">
        </a>
    </div>
    <div class="flex flex-column">
        <div class="flex-column w-1/6 bg-fondo-verde">
            @livewire('admin.navigation-menu')
        </div>
        <!-- Page Content -->
        <main class="flex-column w-5/6">
            {{ $slot }}
        </main>
    </div>
</div>

@stack('modals')

@livewireScripts

@stack('scripts')
</body>
</html>
