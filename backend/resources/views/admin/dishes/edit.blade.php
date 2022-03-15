@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-3">Modifica piatto</h1>

        <form action="{{route('dishes.update', $dish->id)}}" method="POST" class="mb-5" enctype="multipart/form-data">
            @csrf
            @method("PUT")

            {{-- dish name --}}
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Aggiungi il nome" value="{{old('name', $dish->name)}}" required maxlength="100">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- dish description --}}
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Aggiungi la descrizione" rows="5">{{old('description', $dish->description)}}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- dish price --}}
            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Aggiungi il prezzo" value="{{old('price', $dish->price)}}" required step="0.01" min="0" max="999.99">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- dish visible --}}
            <div class="form-group form-check mt-4">
                <input type="checkbox" class="form-check-input @error('visible') is-invalid @enderror" id="visible" name="visible" {{old("visible", $dish->visible) ? 'checked' : ''}}>
                <label class="form-check-label" for="visible">Pubblica</label>
                @error('visible')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- add image upolad --}}
            <div class="form-group">
                @if($dish->image != NULL)
                    <img class="img-thumbnail float-right" src="{{ asset('storage/' . $dish->image) }}" alt="{{$dish->name}} image">
                @endif
                <label for="image">Immagine</label>
                <input class="form-control @error('image') is-invalid @enderror" id="image" type="file" name="image" value="{{ old('image', $dish->image) }}">
                @error('image')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Modifica piatto</button>

        </form>

        <a href="{{route('dishes.index')}}"><button type="button" class="btn btn-dark">Lista piatti</button></a>
    </div>
@endsection