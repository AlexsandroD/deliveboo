@extends('layouts.app')

@section('content')
    <div class="container dish-container">

        <div class="row">

            {{-- dish col --}}
            <div class="col-lg-9">
                <h1 class="text-center mb-3">Menù</h1>

                {{-- card add plate --}}
                <div class="dishes-grid">
                    <div class="card">
                        <a class="add-plate" href="{{ route('dishes.create') }}">
                            <i class="fa-solid fa-circle-plus"></i>
                        </a>
                    </div>

                    {{-- plate cards --}}
                    @foreach ($dishes as $dish)
                        <div class="card">
                            <a href="{{ route('dishes.show', $dish->id) }}">
                                <figure class="mb-0">
                                    <img class="dish_cover" src="{{ asset('images/placeholder.svg') }}" alt="">
                                </figure>
                                <div class="card-body py-3">
                                    <h5 class="card-title mb-2">{{ $dish->name }}</h5>
                                    <p class="card-text description mb-2">{{ $dish->description }}</p>
                                    <span class="card-text price">{{ $dish->price }} &euro;</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- aside lg --}}
            <aside class="col-lg-3 px-0 aside">

                {{-- card utente --}}
                <h3 class="user-title">
                    Utente connesso
                </h3>
                <div id="user-info">
                    <ul>
                        {{-- nome utente --}}
                        <li>
                            <div>
                                <i class="fa-solid fa-user-large"></i>
                                <span>Nome utente</span>
                            </div>
                            <span class="info">
                                {{ Auth::user()->name }} {{ Auth::user()->surname }}
                            </span>
                        </li>
                        {{-- email utente --}}
                        <li>
                            <div>
                                <i class="fa-solid fa-envelope"></i>
                                <span>Email</span>
                            </div>
                            <span class="info">
                                {{ Auth::user()->email }}
                            </span>
                        </li>
                        {{-- partita iva utente --}}
                        <li>
                            <div>
                                <i class="fa-solid fa-briefcase"></i>
                                <span>Partita iva</span>
                            </div>
                            <span class="info">
                                {{ Auth::user()->vat }}
                            </span>
                        </li>
                    </ul>
                </div>

                {{-- container bottoni --}}
                <div id="btn-container">
                    {{-- bottone menu --}}
                    <a href="{{ route('restaurants.index') }}" class="text-center restaurant-color">
                        <button class="btn">
                            <i class="fa-solid fa-house-chimney-user"></i> Ristorante
                        </button>
                    </a>
                    {{-- bottone ordini --}}
                    <a href="{{ route('orders.index') }}" class="text-center orders-color">
                        <button class="btn">
                            <i class="fa-solid fa-basket-shopping"></i> Ordini
                        </button>
                    </a>
                    {{-- bottone statistiche --}}
                    <a href="#" class="text-center stats-color">
                        <button class="btn">
                            <i class="fa fa-bar-chart responsive-i" aria-hidden="true"></i> Statistiche
                        </button>
                    </a>
                </div>
            </aside>
        </div>
    </div>
@endsection
