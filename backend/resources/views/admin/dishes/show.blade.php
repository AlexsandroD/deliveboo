@extends('layouts.app')

@section('content')
    <div class="container dish">
        <div class="row">
            <div class="col-lg-9">

                {{-- dish card --}}
                <div class="row no-gutters card_header">
                    {{-- dish image --}}
                    <div class="col-lg-6 image_container">
                        @if ($dish->image)
                            <img class="dish_cover" src="{{asset("storage/".$dish->image)}}" alt="{{$dish->name}}">
                        @else
                            <img class="dish_cover" src="{{ asset('images/placeholder.svg') }}" alt="{{$dish->name}}">
                        @endif
                        
                        @if ($dish->visible)
                            <div class="status public">
                                Disponibile
                            </div>
                        @else
                            <div class="status private">
                                Esaurito
                            </div>
                        @endif
                    </div>

                    {{-- dish info --}}
                    <div class="col-lg-6">
                        {{-- title/description container --}}
                        <div class="card-title-container">
                            <h2 class="card-title">{{ $dish->name }}</h2>
                        </div>
                        <div class="dish-info">
                            {{-- dish info --}}
                            <div class="dish-description">
                                {{-- descrizione --}}
                                <h5><i class="fa-solid fa-comment-dots"></i> Descrizione</h5>
                                @if($dish->description)
                                <p class="card-text description">{{ $dish->description }}</p>
                                @else 
                                <p class="card-text description">Nessuna descrizione</p>
                                @endif
                                {{-- prezzo --}}
                                <h5><i class="fa-solid fa-euro-sign"></i> Prezzo</h5>
                                <span class="price">{{ $dish->price }}&euro;</span>
                            </div>
                            {{-- buttons container --}}
                            <div class="btn-container text-right mt-4">
                                {{-- edit button --}}
                                <a href="{{ route('dishes.edit', $dish->id) }}" class="ml-3"><button
                                        type="button" class="btn btn_border">Modifica</button></a>
                                {{-- modal delete button --}}
                                <button type="button" class="btn btn_filled ml-3" data-toggle="modal"
                                    data-target="#deleteModal">Elimina</button>

                                {{-- modal --}}
                                <div class="modal fade" id="deleteModal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Sei sicuro di voler eliminare
                                                    <strong>{{ $dish->name }}</strong>?
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"><span
                                                        aria-hidden="true">&times;</span></button>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn_border"
                                                    data-dismiss="modal">Close</button>
                                                {{-- delete form --}}
                                                <form action="{{ route('dishes.destroy', $restaurant->id) }}"
                                                    method="POST">
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
                  <a href="{{route('statistics')}}" class="text-center stats-color">
                      <button class="btn">
                          <i class="fa fa-bar-chart responsive-i" aria-hidden="true"></i> Statistiche
                      </button>
                  </a>
              </div>
          </aside>
          
        </div>
    </div>
@endsection
