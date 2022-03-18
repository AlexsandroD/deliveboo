@extends('layouts.auth')

@section('auth')
    <div class="container auth-container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">
                <div class="card">
                    <div class="card_header">Registra il tuo account</div>

                    <div class="card_body py-4">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group row py-md-2">
                                <label for="name" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-user"></i> Nome *</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                        placeholder="Inserisci il tuo nome">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row py-md-2">
                                <label for="surname" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-user"></i> Cognome *</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text"
                                        class="form-control @error('surname') is-invalid @enderror" name="surname" required
                                        value="{{ old('surname') }}" autocomplete="family-name"
                                        placeholder="Inserisci il tuo cognome">

                                    @error('surname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row py-md-2">
                                <label for="vat" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-briefcase"></i> Partita IVA *</label>

                                <div class="col-md-6">
                                    <input id="vat" type="text" class="form-control @error('vat') is-invalid @enderror"
                                        name="vat" required pattern="[0-9]{11}" autocomplete="on" maxlength="11"
                                        placeholder="Inserisci 11 cifre" value="{{ old('vat') }}">

                                    @error('vat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row py-md-2">
                                <label for="email" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-envelope"></i> Email *</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email"
                                        placeholder="Inserisci la tua email" value="{{ old('email') }}">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row py-md-2">
                                <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-lock-open"></i> Password *</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password" placeholder="Inserisci almeno 8 cifre"
                                        minlength="8">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="form-group row py-md-2">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-lock"></i> Conferma
                                    Password *</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" placeholder="Conferma password" required
                                        autocomplete="new-password">
                                </div>
                            </div>

                            <div class="form-group d-flex justify-content-end">
                                <a class="btn btn-link" href="{{ route('login') }}">
                                  <i class="fa-solid fa-arrow-right-to-bracket"></i> Ho già un account 
                                </a>
                                <button id type="submit" class="btn btn_filled ml-2">
                                    Registrati
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let password = document.getElementById('password');
        let passwordCheck = document.getElementById('password-confirm');

        function validatePassword() {

            if (password.value != passwordCheck.value) {
                passwordCheck.setCustomValidity("Le password non corrispondono");
            }

        }

        password.onchange = validatePassword;
        passwordCheck.onkeyup = validatePassword;
    </script>
@endsection
