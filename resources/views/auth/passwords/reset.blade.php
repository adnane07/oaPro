@extends('layouts.app')
@section('accueil')
    {{ url('/') }}
@endsection
@section('content')
<body  style=" background-color:rgb(24, 181, 152)">

<div class="container" style="margin-top: 3%;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="border border-1 border-white rounded" id="login">

                <div class="card-body text-white" id="loginn" >
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">


                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating row mb-3">


                                <input id="email" type="email"
                                class="form-control border-0 @error('email') is-invalid @enderror"
                                placeholder="name@example.com" name="email" value="{{ $email ?? old('email') }}"
                                required autocomplete="email" autofocus>

                                <label for="email" id="emaill">{{ __('Email Address') }}</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating row mb-3">


                                <input id="email" type="password"
                                class="form-control border-0 @error('password') is-invalid @enderror"
                                placeholder="password" name="password"
                                required autocomplete="new-password">

                                <label for="password" id="emaill">{{ __('Password') }}</label>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 offset-md-3">
                            <div class="form-floating row mb-3">

                                <input id="email" type="password"
                                class="form-control border-0" name="password_confirmation"
                                placeholder="password" required autocomplete="new-password">

                                <label for="password-confirm" id="emaill">{{ __('Confirm Password') }}</label>

                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<form method="post" action={{ route('contactez') }}>
    @csrf
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
         <div class="modal-body">

            <div class="mb-3">
               <input type="email" class="form-control" id="inpu" name="email_emet" placeholder="name@example.com">
            </div>
            <div class="mb-3">
               <textarea class="form-control" id="inpu" rows="3" name="message_env"></textarea>
            </div>


        </div>
      <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <button type="submit" class="btn btn-success">Envoyer</button>
       </div>
    </div>
   </div>
  </div>
</form>
</body>
@endsection
