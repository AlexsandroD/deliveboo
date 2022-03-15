@extends('layouts.app')

@section('content')
    <div class="container">

        <h1 class="text-center mb-3">Aggiungi un nuovo piatto</h1>

        <form action="{{route('dishes.store')}}" method="POST" class="mb-5" enctype="multipart/form-data">
            @csrf

            {{-- dish name --}}
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Aggiungi il nome" value="{{old('name')}}" required maxlength="100">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- dish description --}}
            <div class="form-group">
                <label for="description">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Aggiungi la descrizione del piatto" rows="5">{{old('description')}}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- dish price --}}
            <div class="form-group">
                <label for="price">Prezzo</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="Aggiungi il prezzo" value="{{old('price')}}" required step="0.01" min="0" max="999.99">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- dish visible --}}
            <div class="form-group form-check mt-4">
                <input type="checkbox" class="form-check-input @error('visible') is-invalid @enderror" id="visible" name="visible" {{old('visible') ? 'checked' : ''}}>
                <label class="form-check-label" for="visible">Pubblica</label>
                @error('visible')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- add image upolad --}}
            <div class="form-group">
                <label for="image">Aggiungi immagine</label>
                <input type="file" class="form-control-file" id="image" name="image">
                @error('image')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            {{-- submit button --}}
            <button type="submit" class="btn btn-primary">Aggiungi piatto</button>

        </form>

        <a href="{{route('dishes.index')}}"><button type="button" class="btn btn-dark">Lista piatti</button></a>
    </div>
@endsection