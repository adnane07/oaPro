@extends('layouts.app')
@section('accueil')
    {{ url('/') }}
@endsection

    @section('content')
<body style=" background-color:rgb(24, 181, 152)">
    <div class="container" style="margin-top: 4%; ">
      <div class="row justify-content-center">
        <div class="col-md-3 ">
          @if(count($reservations)>0)
@foreach( $reservations as $resrvation)
<div class="card  mb-3" >
  
    
  <div class="card-header" style=" text-align: center; font-weight: bold; color:rgb(0, 128, 85); " >Informations de reservation</div>
  <div class="card-body text-info">
    <table>
   <tr>
    <td > <h5 class="card-title" style="color: rgb(13, 12, 12)"> <span class="infos" >Nom    </span> <td>
   <td> <h5 class="card-title" style="color: rgb(13, 12, 12)">  {{$resrvation->name}}</h5> <td></tr>

    <tr>
      <td> <h5 class="card-title" style="color: rgb(13, 12, 12)"> <span class="infos" >code  </span> <td>
     <td> <h5 class="card-title" style="color: rgb(13, 12, 12)"> {{$resrvation->id}}</h5> <td></tr>


      <tr>
        <td> <h5 class="card-title" style="color: rgb(13, 12, 12)"> <span class="infos" >Date   </span> <td>
       <td> <h5 class="card-title" style="color: rgb(13, 12, 12)">  {{$resrvation->dateReservation}}</h5> <td></tr>
  
        <tr>
          <td> <h5 class="card-title" style="color: rgb(13, 12, 12)"> <span class="infos" >Heure depart  </span> <td>
         <td> <h5 class="card-title" style="color: rgb(13, 12, 12)">  {{$resrvation->heureDepart}}</h5> <td></tr>

          <tr>
            <td> <h5 class="card-title" style="color: rgb(13, 12, 12)"> <span class="infos" >Heure Fin </span> <td>
           <td> <h5 class="card-title" style="color: rgb(13, 12, 12)">  {{$resrvation->heureFin}}</h5> <td></tr>

    </table>


  
  
  </div>
  <div style=" text-align: center">
     
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger mb-3"  data-bs-toggle="modal" data-bs-target="#supprimerModal{{$resrvation->id}}">
       Annuler la reservation 
      </button>
  </div>
</div>
</div>



    <!-- Modal annulation************************************************************************-->
    <form method="POST" action="{{url('delete/'.$resrvation->id)}}">
      @csrf
      @METHOD('DELETE')
   <div class="modal fade" id="supprimerModal{{$resrvation->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <img src="https://img.icons8.com/doodle/40/000000/delete-sign.png"/> Supprimer Reservation de Terrain  au heureDepart


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </div>
      </div>
    </div>
   </div>
  </form>

    {{-- ********************************************************************************************** --}}
  @endforeach
  
  
    </div>
</div>
</div>

@else
  <div class="alert alert-info" role="alert">
    aucune réservation n'a été récupérée.Revenir au  <a href="{{url('/')}}" class="alert-link">page reservation </a> pour reserver
  </div>  @endif


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



<style>
  .infos{
    font-weight: bold; color:rgb(0, 128, 85);
  }
  
  
  </style>


@endsection