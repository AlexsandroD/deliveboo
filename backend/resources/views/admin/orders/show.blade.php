@extends('layouts.app')

@section('content')
    <div class="col-lg-9 order">

        {{-- dish card --}}
        <div class="row no-gutters card_header">

            {{-- order info --}}
            <div class="col">
                {{-- title/description container --}}
                <div class="card-title-container">
                    <h2 class="card-title">Ordine #{{ $order->id }}</h2>
                </div>
                <div class="order-info">
                    {{-- order info --}}
                    <div class="order-description">
                      <div class="d-flex justify-content-between">
                        <h4 class="mb-2">Informazioni Cliente</h4>
                        <div class="label"><i class="fa-solid fa-clock"></i> {{ $order->created_at}}</div>
                      </div>
                      <div class="label"><i class="fa-solid fa-user"></i> Cliente</div>
                      <p class="mb-3">{{ $order->customer_name }} {{ $order->customer_surname }}</p>
                      <div class="label"><i class="fa-solid fa-envelope"></i> Email</div>
                      <p class="mb-3">{{ $order->customer_email }}</p>
                      <div class="label"><i class="fa-solid fa-location-dot"></i> Indirizzo</div>
                      <p class="mb-3">{{ $order->customer_address }}, {{ $order->customer_city }},
                          {{ $order->customer_post_code }}, {{ $order->customer_country }}</p>
                      <div class="label"><i class="fa-solid fa-phone"></i> Telefono</div>
                      <p class="mb-3">{{ $order->customer_phone }}</p>
                      <div class="label"><i class="fa-solid fa-comment-dots"></i> Commento</div>
                      @if( $order->customer_comment )
                      <p class="mb-3">{{ $order->customer_comment }}</p>
                      @else 
                      <p class="mb-3">Nessun commento</p>
                      @endif
                      {{-- lista piatti --}}
                      <h4 class="mt-3 mb-2">Lista piatti</h4>
                      @foreach ($order->dishes as $dish)
                      <div class="d-flex justify-content-between">
                        <p>x{{ $dish->pivot->quantity }} {{ $dish->name }}</p>
                        <span class="ml-2">&euro;{{ $dish->price }} pz.</span>
                      </div>
                      @endforeach
                      <div class="label text-right">Totale: &euro;{{ $order->tot_price }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- aside lg --}}
    <aside class="col-lg-3 pl-0 aside order">

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
            {{-- bottone ristorante --}}
            <a href="{{ route('restaurants.index') }}" class="text-center restaurant-color">
                <button class="btn">
                    <i class="fa-solid fa-house-chimney-user"></i> Ristorante
                </button>
            </a>
            {{-- bottone menu --}}
            <a href="{{ route('dishes.index') }}" class="text-center menu-color">
                <button class="btn">
                    <i class="fas fa-utensils responsive-i" aria-hidden="true"></i> Menù
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
@endsection
