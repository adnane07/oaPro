@extends('layouts.app')
@section('accueil')
    {{ url('/') }}
@endsection
    @section('content')


    <body  style=" background-color:rgb(24, 181, 152)">
        <div class="container" style="margin-top: 4%;">
           
           @if(session()->has('sucess'))
<div class="alert alert-success">

{{session()->get('sucess')}}
</div>
@endif




            <form method="POST" action="{{ route('store')}}">
                @csrf
                <div class="mb-3">
                  <label for="titre" class="form-label">titre</label>
                  <input type="texte" class="form-control" id="titre" aria-describedby="titre" name="titre">
                  {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
                
                <div class="form-group">
                    <label for="description"> contenu de l'annonce</label>
                    <textarea name="description" class="form-control " id="description" cols="30" rows="10"></textarea>
                {{-- @if ($errors ->has('description'))

                <span class="invalid-feedback">{{$errors->first('description')}}</span>
                @endif --}}
                
                </div>

<br>

                <button type="submit" class="btn btn-primary">Submit</button>
              </form>

{{-- ***************************************************************************** --}}

{{--  --}}
           {{-- ******************************************************* --}}
            @endsection