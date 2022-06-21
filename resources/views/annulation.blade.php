@extends('layouts.app')


@section('accueil')
    {{ url('/') }}
@endsection

    @section('content')
<body style=" background-color:rgb(24, 181, 152)">
    <div class="container" style="margin-top: 2%; ">
        
        <div class="card" >
       
        <table class="table table-striped" style="margin-bottom: 0%">
            <thead>
              <tr>
                <th scope="col" style="text-align: center">Id Reservation</th>
                <th scope="col" style="text-align: center">Nom</th>
                <th scope="col" style="text-align: center">Telephone</th>
                <th scope="col" style="text-align: center">Date reserver</th>
                <th scope="col" style="text-align: center">Etat de reservation</th>
    
              </tr>
            </thead>
            <tbody>
             

{{-- @foreach( $reservations as $resrvation) --}}

<tr>
    <th scope="row" style="vertical-align: middle; text-align: center">$resrvation->id</th>
    <td style="vertical-align: middle; text-align: center">$resrvation->name</td>
    <td style="vertical-align: middle; text-align: center">$resrvation->tel</td>
    <td style="vertical-align: middle; text-align: center">dateReservation heureDepart--heureFin</td>

    <td >
      <div style=" text-align: center">
     
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#supprimerModal">
            <i class="bi bi-trash3"></i>Supprimer
          </button>
      </div>

    <!-- Modal annulation-->
    <form method="POST" action="{{url('supprime')}}">
        @csrf
     <div class="modal fade" id="supprimerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  {{-- @endforeach --}}
   

    </td>

</tr>

</tbody>
</table>
    </div>
</div>
@endsection