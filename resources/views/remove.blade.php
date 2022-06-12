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
    <h5 class="card-title" style="color: rgb(13, 12, 12)"> <span class="infos" >Nom: </span>{{$resrvation->name}}</h5>
    <h5 class="card-text" style="color: rgb(13, 12, 12)"> <span class="infos" >Id Reservation :</span> {{$resrvation->id}}</h5>
    <h5 class="card-text" style="color: rgb(13, 12, 12)"> <span class="infos" >Date :</span> {{$resrvation->dateReservation}}</h5>
    <h5 class="card-text" style="color: rgb(13, 12, 12)"> <span class="infos" >Heure depart :</span> {{$resrvation->heureDepart}}</h5>
    <h5 class="card-text" style="color: rgb(13, 12, 12)"> <span class="infos" >Heure Fin :</span> {{$resrvation->heureFin}}</h5>
   

<style>
.infos{
  font-weight: bold; color:rgb(0, 128, 85);
}


</style>
  
  
  </div>
  <div style=" text-align: center">
     
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger mb-3"  data-bs-toggle="modal" data-bs-target="#supprimerModal{{$resrvation->id}}">
        <i class="bi bi-trash3"></i>Supprimer
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
  @else
  <div style="font-weight: bold; color:rgb(249, 255, 253); " > Aucune réservation n'a été récupérée. vérifiez vos données d'identification </div>
  @endif
   

    
    </div>
</div>
@endsection