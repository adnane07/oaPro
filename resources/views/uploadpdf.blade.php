@extends('layouts.app')
@section('accueil')
    {{ url('/') }}
@endsection
    @section('content')
        <body  style=" background-color:rgb(24, 181, 152)">
            <div class="container" style="margin-top: 1%;">
                <div class="row justify-content-center">
                    <div class="col-md-8 ">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="font-weight: bold; color:green; text-align: center">
                                    réservation confirmée <img src="https://img.icons8.com/external-others-amoghdesign/24/000000/external-done-multimedia-flat-30px-others-amoghdesign.png"/>
                                </h4>

                                <table class="table table-striped-columns">
                                    <thead>
                                      <tr >
                                        <th> {{$reservation->heureDepart}} - {{$reservation->heureFin}}</th>
                                        <th colspan="4"> {{$reservation->dateReservation}} Terrain {{$reservation->idTerrain}}</th>

                                      </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <tr>
                                            <td class="border-end">
                                                <div style="text-align: center;">
                                                    <!-- insert your custom barcode setting your data in the GET parameter "data" -->
                                                    <img alt='Barcode Generator TEC-IT'
                                                    src='https://barcode.tec-it.com/barcode.ashx?code=QRCode_Events&data=BEGIN%3AVEVENT%0ASUMMARY%3A<?php echo $reservation->name ?>%0ALOCATION%3A<?php echo $reservation->tel ?>%0ADESCRIPTION%3Aterrain+<?php echo $reservation->idTerrain ?>%0ADTSTART%3A<?php  $date = str_replace('-', '', $reservation->dateReservation); echo $date?>T<?php  $time = str_replace(':', '', $reservation->heureDepart); echo $time ?>00%0AEND%3AVEVENT&eclevel=M&dmsize=Default'/>
                                                </div>

                                            </td>
                                            <td colspan="4">
                                                <table class="table table-borderless">
                                                    <thead>
                                                        <tr>
                                                          <th colspan="4" scope="col" style="color: green" class="border-bottom">Details de Reservation</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        <tr>
                                                          <th colspan="2" scope="row">Id Reservation</th>
                                                          <td colspan="2">{{$reservation->id}}</td>
                                                        </tr>
                                                        <tr>
                                                          <th colspan="2" scope="row">Nom</th>
                                                          <td colspan="2">{{$reservation->name}}</td>
                                                        </tr>
                                                        <tr>
                                                          <th colspan="2" scope="row">Telephone</th>
                                                          <td colspan="2">{{$reservation->tel}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="2" scope="row">email</th>
                                                            <td colspan="2">{{$reservation->email}}</td>
                                                        </tr>
                                                      </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                  </table>
                                  <div class="col-md-6 offset-md-3 row">
                                    <a type="button" class="btn btn-warning" href="{{ Route('pdf') }}" style="color: black">
                                        <img src="https://img.icons8.com/ios/40/000000/export-pdf-2.png"/> Telecharger Pdf
                                    </a>
                                    </div>

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
