@extends('layouts.app')


@section('content')




<body  style=" background-color:rgb(24, 181, 152)">
    <div class="container" style="margin-top: 4%;">
    @foreach($annonces as $annonce)
    <div class="row justify-content-center">
      <div class="col-md-9 ">
        @if(session('success'))

<div class="alert alert-success" > 
<ul>
  <li>{{session('success')}}
</ul>
  @endif


  <div class="card mb-3">
  
    <div class="card-header" style=" background-color:rgb(209, 236, 206)">
      <?php
      $user = DB::table('users')->where('id',$annonce->user_id)->first();
      echo $user->name;
      ?>
    </div>
    <div class="card-body" >
      {{$annonce->titre}}</h5>
      <p class="card-text">{{$annonce->description}}</p>
      
      
      @if(auth()->user()->id === $annonce->user_id)
      <button type="button" class="btn btn-danger"><i class="bi bi-trash" data-bs-toggle="modal" data-bs-target="#supprimerModal{{$annonce->id}}"> </i></button>
      {{-- <button type="button" class="btn btn-primary"><i class="bi bi-pencil" data-bs-toggle="modal" data-bs-target="#editModal"> </i></button> --}}
      <button type="button"   class="btn btn-primary" data-toggle="modal" data-target="#editModal{{$annonce->id}}">
        <i class="bi bi-pencil"></i>
      </button>


      @endif
      @if(auth()->user()->isAdmin == 1)
      <button type="button" class="btn btn-danger"><i class="bi bi-trash" data-bs-toggle="modal" data-bs-target="#supprimerModal{{$annonce->id}}"> </i></button>

      @endif


    </div>
    {{-- <script>$('#exampleModalCenter').modal('show');</script> --}}

{{-- ************************************ modal edit *********************************************** --}}
{{-- bg-dark --}}

<div class="modal fade " id="editModal{{$annonce->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLongTitle">Modifier</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <form method="POST" action="{{route ('annonce.edit',$annonce->id)}}">
          @csrf
          @method('PUT')
          <div class="mb-3">
            <label for="titre" class="form-label">titre</label>
            <input type="texte" class="form-control" id="titre" aria-describedby="titre" name="titre" value="{{$annonce->titre}}">
           
          </div>
          
          <div class="form-group">
              <label for="description"> contenu de l'annonce</label>
              <textarea name="description" class="form-control " id="description" cols="30" rows="10" >{{$annonce->description}}</textarea>
        
          </div>

<br>
         
        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">annuler</button>
        <button type="submit" class="btn btn-primary">enregistrer les changement</button>
      </div>
    </div>
  </div>
</div>
</form>

  

{{-- ***********  modal delete *************************************************************** --}}
<form method="POST" action="{{route ('annonce.delete',$annonce->id)}}">
  @csrf
  @method('DELETE')
<div class="modal fade  " id="supprimerModal{{$annonce->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-body">
      <img src="https://img.icons8.com/doodle/40/000000/delete-sign.png"/>  {{$user->name}}  Voulez-vous supprimer votre annonce 


    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
      <button type="submit" class="btn btn-danger">Supprimer</button>
    </div>
  </div>
</div>
</div>
</form>


{{-- ****************************************************************************************************************** --}}




    <div class="card-footer text-muted" style=" background-color:rgb(209, 236, 206)">
      {{ Carbon\Carbon::parse($annonce->created_at) ->diffForHumans()}}
    </div>
  </div>
</div>
</div>



{{-- <br> --}}
  @endforeach
  
  {{-- @endforeach --}}
{{-- pagination --}}
{{-- {{$annonces->links()}} --}}

</div>






@endsection
