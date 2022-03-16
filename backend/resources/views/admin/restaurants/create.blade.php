@extends('layouts.app')

@section('content')
    <div class="container create-container">

        <h1 class="m-0">Crea il tuo ristorante</h1>
        <p class="under-title mb-3">( I campi segnalati con * sono obbligatori )</p>

        <form action="{{route('restaurants.store')}}" method="Post" class="mb-5" enctype="multipart/form-data">
            @csrf

            {{-- restaurant name --}}
            <div class="form-group">
              <label for="name"><i class="fa-solid fa-house-user"></i> Nome *</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci un nome"  maxlength="110" required value="{{old('name')}}">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            
            {{-- categories checkbox --}}
            <div class="form-group">
              <p class="mb-0"><i class="fa-solid fa-utensils"></i> Seleziona una o più categorie</p>
              <ul class="edit-container">
              @foreach ($categories as $category)
                  <li @error('categories') is-invalid @enderror">
                      <input class="form-check-input" type="checkbox" id="{{$category->name}}" value="{{$category->id}}" name="categories[]" {{in_array($category->id, old("categories", [])) ? 'checked' : ''}}>
                      <label class="form-check-label" for="{{$category->name}}">{{$category->name}}</label>
                  </li>
              @endforeach
              </ul>
              @error('categories')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            {{-- restaurant description --}}
            <div class="form-group">
                <label for="description"><i class="fa-solid fa-comment-dots"></i> Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Inserisci una descrizione" rows="10">{{old('description')}}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- restaurant email --}}

            <div class="form-group">
                <label for="email"><i class="fa-solid fa-envelope"></i> Email *</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Inserisci una email"  maxlength="100" required value="{{old('email')}}">
                @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- restaurant address --}}
            <div class="form-group">
                <label for="address"><i class="fa-solid fa-location-dot"></i> Indirizzo *</label>
                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Inserisci un indirizzo"  maxlength="255" required value="{{old('address')}}">
                @error('address')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- restaurant city --}}
            <div class="form-group d-none">
                <label for="city">Città *</label>
                <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" placeholder="Inserisci una città"  maxlength="100" required value="Roma">
                @error('city')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- restaurant country --}}
            <div class="form-group d-none">
                <label for="country">Paese *</label>
                <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" placeholder="Inserisci un paese"  maxlength="255" required value="Italia">
                @error('country')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- restaurant post_code --}}
            <div class="form-group d-none">
                <label for="post_code">Codice Postale *</label>
                <input type="text" class="form-control @error('post_code') is-invalid @enderror" id="post_code" name="post_code" placeholder="Inserisci un codice postale"  maxlength="255" required value="00100" pattern="[0-9]{5}">
                @error('post_code')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- restaurant phone --}}
            <div class="form-group">
                <label for="phone"><i class="fa-solid fa-phone"></i> Telefono *</label>
                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Inserisci un numero di telefono"  pattern="[0-9]{10,15}" required value="{{old('phone')}}">
                @error('phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- add image upolad --}}
            <div class="form-group">
                <label for="image"><i class="fa-solid fa-image"></i> Aggiungi un'immagine di copertina</label>
                
                <div class="file-upload text-center">
                    <button class="btn btn_filled" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Aggiungi immagine</button>
                    <div class="image-upload-wrap">
                        <input id="image" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="image_cover" />
                        <div class="drag-text">
                            <h3>Trascina un'immagine o premi per selezionarla</h3>
                        </div>
                    </div>
                    <div class="file-upload-content">
                        <img class="file-upload-image" src="#" alt="your image" />
                        <div class="image-title-wrap">
                            <button type="button" onclick="removeUpload()" class="btn btn_delete">
                                Rimuovi
                            </button>
                        </div>
                    </div>
                </div>

                @error('image_cover')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
                <script>
                  function readURL(input) {
                    if (input.files && input.files[0]) {

                      let reader = new FileReader();

                      reader.onload = function(e) {
                        $('.image-upload-wrap').hide();

                        $('.file-upload-image').attr('src', e.target.result);
                        $('.file-upload-content').show();
                      };

                      reader.readAsDataURL(input.files[0]);

                    } else {
                      removeUpload();
                    }
                  }

                  function removeUpload() {
                    $('.file-upload-input').replaceWith($('.file-upload-input').clone());
                    $('.file-upload-content').hide();
                    $('.image-upload-wrap').show();
                    $("#image").val(null);
                  }
                  $('.image-upload-wrap').bind('dragover', function () {
                      $('.image-upload-wrap').addClass('image-dropping');
                    });
                    $('.image-upload-wrap').bind('dragleave', function () {
                      $('.image-upload-wrap').removeClass('image-dropping');
                    });
                </script>
                <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
            </div>

            <div class="text-right mt-4">
              {{-- back button --}}
              <a href="{{url()->previous()}}"><button type="button" class="btn btn-dark mr-2">Indietro</button></a>
              
              {{-- submit button --}}
              <button type="submit" class="btn btn_filled">Crea</button>
            </div>
        </form>
    </div>
@endsection
