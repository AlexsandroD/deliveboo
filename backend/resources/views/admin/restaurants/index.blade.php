@extends('layouts.app')

@section('content')

    <div class="container index-restaurant">
      <div class="row">
        <div class="col-lg-9">
            <div class="row no-gutters benvenuto mb-3">
              @if(!$restaurant)
              {{-- benvenuto/crea utente --}}
              <h3>Benvenuto {{ Auth::user()->name }}, crea il tuo ristorante</h3>
              @else
              {{-- benvenuto/gestisci utente --}}
              <h3>Benvenuto {{ Auth::user()->name }}, gestisci il tuo ristorante</h3>
              @endif
            </div>
    
            @if(!$restaurant)
                <a href="{{ route('restaurants.create') }}"><button type="button" class="btn"><i class="fa-solid fa-circle-plus"></i></button></a>
            @else
            {{-- restaurant card --}}
            <div class="col px-0 restaurant">
                <div class="row no-gutters">
                    {{-- restaurant image--}}
                    <div class="col-md-5">
                        <img class="restaurant-cover" src="{{asset("images/copertina-test.jpeg")}}" alt="copertina test">
                    </div>
    
                    {{-- restaurant info --}}
                    <div class="col-md-7">
                        <div class="card-header">
                            {{-- title/description container --}}
                            <div class="card-title-container">
                              <h2 class="card-title">{{$restaurant->name}}</h2>
                            </div>
                            {{-- information container --}}
                            <div class="card-description-container">
                              {{-- description --}}
                              <p class="card-text description">{{$restaurant->description}}</p>
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
                            <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="ml-3"><button type="button" class="btn btn_edit">Modifica</button></a>
                            {{-- modal delete button --}}
                            <button type="button" class="btn btn_delete ml-3" data-toggle="modal" data-target="#deleteModal">Elimina</button>
                            
                            {{-- modal --}}
                            <div class="modal fade" id="deleteModal" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Sei sicuro di voler eliminare <strong>{{$restaurant->name}}</strong>?</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            {{-- delete form --}}
                                            <form action="{{route('restaurants.destroy', $restaurant->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Delete">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
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
                  <i class="fa-solid fa-file-invoice-dollar"></i>
                  <span>Partita iva</span>
                </div>
                <span class="info">
                  {{Auth::user()->vat}}
                </span>
              </li>
            </ul>
          </div>

          {{-- container bottoni --}}
          <div id="btn-container">
            {{-- bottone menu --}}
            <a href="{{route('dishes.index')}}" class="text-center">
                <button class="btn">
                    <i class="fas fa-utensils responsive-i" aria-hidden="true"></i> Menù
                </button>
            </a>
            {{-- bottone ordini --}}
            <a href="{{route('orders.index')}}" class="text-center">
                <button class="btn">
                    <i class="fa-solid fa-basket-shopping"></i> Ordini
                </button>
            </a>
            {{-- bottone statistiche --}}
            <a href="#" class="text-center">
                <button class="btn">
                    <i class="fa fa-bar-chart responsive-i" aria-hidden="true"></i> Statistiche
                </button>
            </a>
          </div>
        </aside>
      </div>
@endsection
