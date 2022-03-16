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
                    <a class="navbar-brand" href="http://localhost:8080">
                      <img src="{{ asset('images/logo-scritta-color.png') }}" alt="logo deliveboo a colori">
                    </a>

                    @if($restaurant)
                    {{-- logout button for md+ screen --}}
                    <a id="logout_md" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><button type="button" class="btn btn_logout">Logout</button></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="logout_md">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form>
                    </div>

                    {{-- hamburger button --}}
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <i class="fa-solid fa-house-user"></i>
                    </button>
                    
                    {{-- dropdown menu --}}
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <div id="dropdown" class="my-navbar-collapse">
                            {{-- bottone menù --}}
                            <a href="{{route('dishes.index')}}" class="text-center">
                                <button class="btn">
                                    <i class="fas fa-utensils responsive-i" aria-hidden="true"></i>
                                </button>
                            </a>
                            {{-- bottone ordini --}}
                            <a href="{{route('orders.index')}}" class="text-center">
                                <button class="btn">
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </button>
                            </a>
                            {{-- bottone statistiche --}}
                            <a href="#" class="text-center">
                                <button class="btn">
                                    <i class="fa fa-bar-chart responsive-i" aria-hidden="true"></i>
                                </button>
                            </a>
                            {{-- bottone logout --}}
                            <a id="btn_dropdown_logout" class="text-center" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{-- {{ Auth::user()->name }} --}}
                              <button class="btn">
                                <i class="fa-solid fa-right-from-bracket"></i>
                              </button>
                            </a>
                            @else
                            <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><button type="button" class="btn btn_logout">Logout</button></a>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                              </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                            </form>
                            </div>
                            @endif


                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="btn_dropdown_logout">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </nav>
        </header>

        {{-- main --}}
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
