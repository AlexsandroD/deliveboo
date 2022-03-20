@extends('layouts.app')

@section('content')

    <div class="container index-restaurant">
      <div class="row">
          @if(!$restaurant)
          {{-- benvenuto/crea utente --}}
          <div class="col-lg-9">
            <div class="benvenuto mb-3">
              <h3>Benvenuto {{ Auth::user()->name }}, crea il tuo ristorante</h3>
            </div>
            <div id="restaurantless-add">
              <a href="{{ route('restaurants.create') }}"><button type="button" class="btn"><i class="fa-solid fa-circle-plus"></i></button></a>
            </div>
          </div>
          @else
          {{-- benvenuto/gestisci utente --}}
          <div class="col-lg-9 restaurant">
              <div class="benvenuto mb-3">
                <h3>Benvenuto {{ Auth::user()->name }}, gestisci il tuo ristorante</h3>
              </div>
              {{-- restaurant card --}}
              <div class="row no-gutters card_header">
                  {{-- restaurant image--}}
                  <div class="col-md-5">
                      <img class="restaurant-cover" src="{{asset("images/copertina-test.jpeg")}}" alt="copertina test">
                  </div>
  
                  {{-- restaurant info --}}
                  <div class="col-md-7">
                      <div class="restaurant-name">
                          {{-- title/description container --}}
                          <div class="card-title-container">
                            <h2 class="card-title">{{$restaurant->name}}</h2>
                          </div>
                          {{-- information container --}}
                          <div class="restaurant-description">
                            {{-- description --}}
                            @if($restaurant->description)
                            <p class="card-text description">{{$restaurant->description}}</p>
                            @else 
                            <p class="card-text description">Nessuna descrizione</p>
                            @endif
                          </div>
                      </div>
                  </div>
              </div>
  
              <div class="row no-gutters">
                  <div class="col card-body">
                        {{-- contacts --}}
                        <h3>Informazioni</h3>
                        <ul class="contacts-container">
                          {{-- categories --}}
                          <li class="badges">
                            @foreach($restaurant->categories as $category)
                              <span class="badge rounded-pill">{{$category->name}}</span>
                            @endforeach
                          </li>
                          <li class="card-text">
                            <i class="fa-solid fa-envelope"></i> {{$restaurant->email}}
                          </li>
                          <li class="card-text">
                            <i class="fa-solid fa-location-dot"></i> 
                            {{$restaurant->address}}, {{$restaurant->city}} {{$restaurant->post_code}}, {{$restaurant->country}}
                          </li>
                          <li class="card-text">
                            <i class="fa-solid fa-phone"></i> {{$restaurant->phone}}
                          </li>
                        </ul>
                        
                        {{-- buttons container --}}
                        <div class="btn-container text-right">
                          {{-- edit button --}}
                          <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="ml-3"><button type="button" class="btn btn_border">Modifica</button></a>
                          {{-- modal delete button --}}
                          <button type="button" class="btn btn_filled ml-3" data-toggle="modal" data-target="#deleteModal">Elimina</button>
                          
                          {{-- modal --}}
                          <div class="modal fade" id="deleteModal" tabindex="-1">
                              <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title">Sei sicuro di voler eliminare <strong>{{$restaurant->name}}</strong>?</h5>
                                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                      </div>
                                      <div class="modal-footer">
                                          <button type="button" class="btn btn_border" data-dismiss="modal">Close</button>
                                          {{-- delete form --}}
                                          <form action="{{route('restaurants.destroy', $restaurant->id)}}" method="POST">
                                              @csrf
                                              @method('DELETE')
                                              <input type="submit" class="btn btn_filled" value="Delete">
                                          </form>
                                      </div>
                                  </div>
                              </div>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        @endif

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
                  {{Auth::user()->name}} {{Auth::user()->surname}}
                </span>
              </li>
              {{-- email utente --}}
              <li>
                <div>
                  <i class="fa-solid fa-envelope"></i>
                  <span>Email</span>
                </div>
                <span class="info">
                  {{Auth::user()->email}}
                </span>
              </li>
              {{-- partita iva utente --}}
              <li>
                <div>
                  <i class="fa-solid fa-briefcase"></i>
                  <span>Partita iva</span>
                </div>
                <span class="info">
                  {{Auth::user()->vat}}
                </span>
              </li>
            </ul>
          </div>

          {{-- container bottoni --}}
          @if($restaurant)
          <div id="btn-container">
            {{-- bottone menu --}}
            <a href="{{route('dishes.index')}}" class="text-center menu-color">
                <button class="btn">
                    <i class="fas fa-utensils responsive-i" aria-hidden="true"></i> Menù
                </button>
            </a>
            {{-- bottone ordini --}}
            <a href="{{route('orders.index')}}" class="text-center orders-color">
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
          @endif
        </aside>
      </div>
@endsection
