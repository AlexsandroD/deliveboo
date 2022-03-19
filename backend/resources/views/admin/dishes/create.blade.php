@extends('layouts.app')

@section('content')
    <div class="container create-container">

        <h1 class="m-0">Crea un nuovo piatto</h1>
        <p class="under-title mb-3">( I campi segnalati con * sono obbligatori )</p>

        <form action="{{ route('dishes.store') }}" method="POST" class="mb-5" enctype="multipart/form-data">
            @csrf

            {{-- dish name --}}
            <div class="form-group">
                <label for="name"><i class="fa-solid fa-utensils"></i> Nome *</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    placeholder="Aggiungi un nome" value="{{ old('name') }}" required maxlength="100">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- dish description --}}
            <div class="form-group">
                <label for="description"><i class="fa-solid fa-comment-dots"></i> Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    placeholder="Aggiungi una descrizione del piatto" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- dish price --}}
            <div class="form-group">
                <label for="price"><i class="fa-solid fa-euro-sign"></i> Prezzo *</label>
                <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                    placeholder="Aggiungi un prezzo" value="{{ old('price') }}" required step="0.01" min="0" max="999.99">
                @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            {{-- add image upolad --}}
            <div class="form-group">
                <label for="image"><i class="fa-solid fa-image"></i> Aggiungi un'immagine al piatto</label>

                <div class="file-upload text-center">
                    <button class="btn btn_filled" type="button"
                        onclick="$('.file-upload-input').trigger( 'click' )">Aggiungi immagine</button>
                    <div class="image-upload-wrap">
                        <input id="image" class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*"
                            name="image" />
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

                @error('image')
                    <div class="text-danger">{{ $message }}</div>
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
                </script>
                <script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
            </div>

            {{-- dish visible --}}
            <div class="form-group">
              <div class="form-check d-flex align-items-center">
                  <input type="checkbox" name="visible" id="visible"
                      class="@error('visible') is-invalid @enderror"
                      {{ old('visible') ? 'checked' : '' }} checked>

                  <label class="form-check-label ml-2" for="visible">
                      Disponibile
                  </label>
                  @error('visible')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
              </div>
            </div>

            {{-- buttons --}}
            <div class="text-right mt-4">
              
              {{-- back button --}}
              <a href="{{route('dishes.index')}}"><button type="button" class="btn btn-dark mr-2">Indietro</button></a>
              
              {{-- submit button --}}
              <button type="submit" class="btn btn_filled">Crea</button>
            </div>

        </form>

        
    </div>
@endsection
