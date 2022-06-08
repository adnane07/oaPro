@extends('layouts.app')


@section('content')
<body  style=" background-color:rgb(24, 181, 152)">
    <div class="container" style="margin-top: 4%;">
       

    @foreach($annonces as $annonce)

      
<div class="card mb-3">
    <div class="card-header">
      <?php
       $user = DB::table('users')->where('id',$annonce->user_id)->first();
       echo $user->name;
       ?>
     
    </div>
    <small> {{ Carbon\Carbon::parse($annonce->created_at) ->diffForHumans()}}</small>
    <div class="card-body">
      <h5 class="card-title">{{$annonce->titre}}</h5>
      <p class="card-text">{{$annonce->description}}</p>
      {{-- <a href="#" class="btn btn-primary">contacter </a> --}}
    </div>
  </div>
  

{{-- <br> --}}
  @endforeach
  {{-- @endforeach --}}
{{-- pagination --}}
{{-- {{$annonces->links()}} --}}

</div>


@endsection
