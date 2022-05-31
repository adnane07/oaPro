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
                                        <th> 20:00-21:00,</th>
                                        <th colspan="4"> lun 25/05 Terrain 1</th>

                                      </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <tr>
                                            <td class="border-end">
                                                <div style="text-align: center;">
                                                    <!-- insert your custom barcode setting your data in the GET parameter "data" -->
                                                    <img alt='Barcode Generator TEC-IT'
                                                    src='https://barcode.tec-it.com/barcode.ashx?code=QRCode_Events&data=BEGIN%3AVEVENT%0ASUMMARY%3Aadnane%0ALOCATION%3A060514822%0ADESCRIPTION%3Aterrain+3%0ADTSTART%3A20220526T195800%0AEND%3AVEVENT&eclevel=M&dmsize=Default'/>
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
                                                          <td colspan="2">2210635</td>
                                                        </tr>
                                                        <tr>
                                                          <th colspan="2" scope="row">Nom</th>
                                                          <td colspan="2">hmed lamba</td>
                                                        </tr>
                                                        <tr>
                                                          <th colspan="2" scope="row">Telephone</th>
                                                          <td colspan="2">0505050505</td>
                                                        </tr>
                                                        <tr>
                                                            <th colspan="2" scope="row">email</th>
                                                            <td colspan="2">lamba@gmail.com</td>
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
