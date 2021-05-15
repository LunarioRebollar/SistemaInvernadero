<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Los Lira') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="shortcut icon" href="img/Captura.ico">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
       </div>
       <footer class="app-footer">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <span>&copy; 2021 
                    <a href="https://github.com/LunarioRebollar" target="_blank">Invernadero Los Lira</a>
                </span>
            </div>
        </footer>
    </body>
</html>
