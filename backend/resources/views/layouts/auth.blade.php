<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Deliveboo') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100&family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>


<body>
    <div id="app">
      {{-- header --}}
        <header>
            <nav class="navbar navbar-light bg-white">
                <div class="container">
                    {{-- logo --}}
                    <a class="navbar-brand" href="{{ url('/') }}">
                      <img src="{{ asset('images/logo-scritta-color.png') }}" alt="logo deliveboo a colori">
                    </a>
                </div>
            </nav>
        </header>

        {{-- main --}}
        <main class="py-4">
            @yield('auth')
        </main>
    </div>
</body>
</html>
