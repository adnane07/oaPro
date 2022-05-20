@extends('layouts.app')

@section('content')
<div class="container " style="margin-top: 4%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border border-1 border-white rounded" style="padding: 6%">

                <div class="card-body text-white">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-floating col-md-6 row mb-3 ">
                            <input type="email" id="floatingInput"
                             class="form-control @error('email') is-invalid @enderror"
                             placeholder="name@example.com" name="email" value="{{ old('email') }}"
                             required autocomplete="email" >

                             <label for="floatingInput">{{ __('Email Address') }}</label>


                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                Vous n'avez pas encore de compte ? <a href="{{ route('register') }}">S'inscrire</a>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
