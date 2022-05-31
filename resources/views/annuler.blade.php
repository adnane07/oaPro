@extends('layouts.app')
@section('accueil')
    {{ url('/') }}
@endsection
    @section('content')
<body  style=" background-color:rgb(24, 181, 152)">
    <div class="container" style="margin-top: 2%; ">
        <div class="row justify-content-center">
            <div class="col-md-7  ">
                <div class="border border-1 border-white rounded" id="login" style="background-color: white">

    <table class="table" style="margin-bottom: 0%">
        <thead>
          <tr>
            <th scope="col" style="text-align: center">Id Reservation</th>
            <th colspan="2" scope="col" style="text-align: center">lun ,25/05</th>

          </tr>
        </thead>
        <tbody>
        <tr>
            <th style="vertical-align: middle; text-align: center">27201843</th>
            <td scope="row" style="vertical-align: middle; text-align: center">20:00 - 21:00</td>
            <td style="vertical-align: middle; text-align: center">Terrain 1</td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" style="margin-left: 14%" data-bs-toggle="modal" data-bs-target="#valideModal">
                    <i class="bi bi-trash"></i>  Supprimer
                </button>



            <!-- Modal -->
            <form method="POST" action="#">
                @csrf
             <div class="modal fade" id="valideModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <img src="https://img.icons8.com/doodle/40/000000/delete-sign.png"/>Supprimer Reservation de Terrain 3 pour lun 23/05 au 20:00


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                  </div>
                </div>
              </div>
             </div>
            </form>



            </td>
        </tr>
        </tbody>
    </table>
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
