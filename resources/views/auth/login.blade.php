@extends('layouts.app')
@section('accueil')
    {{ url('/') }}
@endsection
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

                        <div class="col-md-6 offset-md-3 mb-2">
                            <input id="check" type="checkbox" class="check" name="remember" {{ old('remember') ? 'checked' : '' }}>
						    <label for="check"><span class="icon"></span> Remember Me</label>
					    </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-3">
                                Vous n'avez pas encore de compte ? <a href="{{ route('register') }}"
                                style="font-weight: bold ;color: rgb(7, 128, 7)">S'inscrire</a>
                            </div>
                        </div>

                             @if (Route::has('password.request'))
                        <div class="offset-md-5  mb-2 foot-lnk">
						    <a href="{{ route('password.request') }}" style="font-weight: bold ;color: rgb(7, 128, 7)">Mot de passe oublier ?</a>
				     	</div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-5">
                                <button type="submit" class="btn btn-success" style="width: 25%">
                                    {{ __('Connecter') }}
                                </button>
                            </div>
                        </div>

					@endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<form method="post" action={{"proj.php"}}>
    @csrf
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
         <div class="modal-body">

            <div class="mb-3">
               <input type="email" class="form-control" id="inpu" placeholder="name@example.com">
            </div>
            <div class="mb-3">
               <textarea class="form-control" id="inpu" rows="3"></textarea>
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
