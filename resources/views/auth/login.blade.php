@extends('layouts.app')

@section('content')
<body  style="background-color:rgb(150, 151, 116)">

<div class="container" style="margin-top: 4%;">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border border-1 border-white rounded" id="login">

                <div class="card-body text-white" id="loginn" >

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating row mb-3">

                                <input type="email" id="email"
                             class="form-control border-0 @error('email') is-invalid @enderror"
                             placeholder="name@example.com" name="email" value="{{ old('email') }}"
                             required autocomplete="email">

                             <label for="email" id="emaill">{{ __(' Adresse E-mail') }}</label>


                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating row mb-3">
                                <input type="password" id="email"
                                class="form-control border-0 @error('password') is-invalid @enderror"
                                placeholder="password" name="password"
                                required autocomplete="current-password">

                                <label for="password" id="emaill">{{ __('Mot de passe') }}</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-3">
                                Vous n'avez pas encore de compte ? <a href="{{ route('register') }}"
                                style="font-weight: bold ;color: rgb(7, 128, 7)">S'inscrire</a>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-success" style="width: 25%">
                                    {{ __('Connecter') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
@endsection
