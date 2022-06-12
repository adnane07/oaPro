@extends('layouts.app')
@section('accueil')
    {{ url('/') }}
@endsection
    @section('content')

    <body  style=" background-color:rgb(24, 181, 152)">
        <div class="container" style="margin-top: 4%;">

            <div class="row justify-content-center">
                <div class="col-md-7">


                    <div class="border border-1 border-white rounded" id="login" style="background-color: white">
                    <h4 class="card-title" style="font-weight: bold; color:green; text-align: center">Gérer les réservations</h4>

                <form method="GET" action="{{route('remove')}}">
                    @csrf

                    <div class="col-md-6 offset-md-3 row mb-3">
                        <input type="email" name="email"
                        class="form-control" value="{{ old('email') }}"
                        id="inpu" required
                        placeholder="E-mail">
                    </div>

                    <div class="col-md-6 offset-md-3 row mb-3">
                        <input type="text" name="IdReservation"
                        class="form-control"
                        id="inpu" required
                        placeholder="ID reservation">
                    </div>

                    <div class="col-md-6 offset-md-3 row mb-3">
                        <button class="btn btn-success" type="submit">Soumettre</button>
                    </div>

                </form>

            </div>
        </div></div>

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
