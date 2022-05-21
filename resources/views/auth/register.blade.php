@extends('layouts.app')



@section('content')
<body  style="background-color:rgb(150, 151, 116)">
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border border-1 border-white rounded" id="login">

                <div class="card-body text-white" id="loginn" >
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating row mb-3">

                                <input type="text" id="email"
                             class="form-control border-0 @error('name') is-invalid @enderror"
                             placeholder="name@example.com" name="name" value="{{ old('name') }}"
                             required autocomplete="name" autofocus>

                             <label for="name" id="emaill">{{ __('Nom') }}</label>


                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>



                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating row mb-3">

                                <input type="email" id="email"
                             class="form-control border-0 @error('email') is-invalid @enderror"
                             placeholder="name@example.com" name="email" value="{{ old('email') }}"
                             required autocomplete="email">

                             <label for="email" id="emaill">{{ __('Adresse E-mail ') }}</label>


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
                                required autocomplete="new-password">

                                <label for="password" id="emaill">{{ __('Mot de passe') }}</label>

                                @error('password')
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
                                placeholder="password" name="password_confirmation"
                                required autocomplete="new-password">

                                <label for="password-confirm" id="emaill">{{ __('Confirme Mot de passe') }}</label>


                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-success" style="width: 25%">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div></body>
@endsection

