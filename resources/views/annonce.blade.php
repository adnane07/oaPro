@extends('layouts.app')
@section('accueil')
    {{ url('/') }}
@endsection
    @section('content')


    <body  style=" background-color:rgb(24, 181, 152)">
        <div class="container" style="margin-top: 1%;">
            <div class="row justify-content-center">
                <div class="col-md-5 ">
           @if(session()->has('sucess'))
<div class="alert alert-success">

{{session()->get('sucess')}}
</div>
@endif




            <form method="POST" action="{{ route('store')}}">
                @csrf
                <div class="mb-3">
                  <label for="titre" class="form-label">titre</label>
                  <input type="texte" class="form-control" id="titre" aria-describedby="titre" name="titre" required>
                 
                </div>
                
                <div class="form-group mb-3 ">
                    <label for="description"> contenu de l'annonce</label>
                    <textarea name="description" class="form-control " id="description" cols="10" rows="5" required></textarea>
                @if ($errors ->has('description'))

                <span class="invalid-feedback">{{$errors->first('description')}}</span>
                @endif

                </div>
                

                <button type="submit" class="btn btn-default " style="background-color:rgb(16, 228, 136); color:azure;">Submit</button>
            
            </div>
        </div>

<br>

              </form>

{{-- ***************************************************************************** --}}

{{--  --}}
           {{-- ******************************************************* --}}
            @endsection