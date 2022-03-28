@extends('layouts.auth')

@section('auth')
<div class="container auth-container">
    <div class="row justify-content-center">
        <div class="col-md-9 col-lg-8">
            <div class="card">
                <div class="card_header">Accedi</div>

                <div class="card_body py-4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row py-md-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-envelope"></i> Email *</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Inserisci email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-md-2">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fa-solid fa-lock"></i> {{ __('Password') }} *</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Inserisci password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-md-2">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check d-flex align-items-center">
                                    <input type="checkbox" name="remember" id="remember" class="mr-2 @error('remember') is-invalid @enderror" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Ricordami
                                    </label>
                                    @error('remember')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-right mb-0">
                          @if (Route::has('password.request'))
                          <a class="btn btn-link" href="{{ route('password.request') }}">
                            Hai dimenticato la password?
                          </a>
                          <a class="btn btn-link" href="{{ route('register') }}">
                            Non hai un account?
                          </a>
                          @endif
                          <button type="submit" class="btn btn_filled ml-2">
                              Accedi
                          </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
