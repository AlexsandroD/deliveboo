@extends('layouts.app')

@section('content')

    <div class="container">

        <h1 class="text-center mb-3">{{$dish->name}}</h1>

        <p>Descrizione: {{$dish->description}}</p>
        <p>Prezzo: &euro;{{$dish->price}}</p>
        <p>Visibile: {{$dish->visible}}</p>
        <p>Immagine: {{$dish->image}}</p>

        {{-- return button --}}
        <a href="{{route('dishes.index')}}"><button type="button" class="btn btn-dark">Lista piatti</button></a>
    </div>


@endsection