@extends('layouts.app')
@section('accueil')
    {{ url('/') }}
@endsection
    @section('content')
        <body style=" background-color:rgb(24, 181, 152)">
            <div class="container" style="margin-top: 4%;">

                <div class="row justify-content-center">
                    <div class="col-md-7 ">
                    @if(session('status'))
                    <div class="alert alert-success ">
                        <div class="col">
                            <i class="bi bi-check-circle-fill float-start"></i>
                            Votre mot de passe a ete bien reintialise !!
                            <button type="button" class="btn-close float-end"
                            data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                    @endif
                    </div>
                </div>


                <div class="row justify-content-center">
                    <div class="col-md-7 ">
                        <div class="border border-1 border-white rounded" id="login" style="background-color: white">

                        <h4 class="card-title" style="font-weight: bold; color:rgb(0, 128, 85); text-align: center">Reserver</h4>


                    <form method="POST" action="#">
                        @csrf
                        <div class="col-md-6 offset-md-3 row mb-3">
                            <input type="datetime-local"
                            class="form-control" name="date"
                            value="{{ old('date') }}"
                            required
                            placeholder="selectionner une date">
                        </div>

                        <div class="col-md-6 offset-md-3 row mb-3">
                        <select class="form-select " id="inpu" name="T">
                            <option value="all" class="form-select-lg">selectionner une terrain</option>
                            <option value="1" class="form-select-lg">Terrain 1</option>
                            <option value="2" class="form-select-lg">Terrain 2</option>
                            <option value="3" class="form-select-lg">Terrain 3</option>
                          </select>
                        </div>

                        <div class="col-md-6 offset-md-3 row">
                            <div class="col">
                                <input class="btn btn-secondary float-start" type="reset" value="Reset">
                            </div>
                            <div class="col">
                                <button class="btn btn-success float-end" type="submit">Suivant <i class="bi bi-chevron-double-right"></i></button>
                            </div>

                        </div>

                    </form>

                </div></div></div>

            </div>
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
        <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>

        <script>
           flatpickr("input[type=datetime-local]",
           {
               altInput: true,
               locale:"fr",
               altFormat: "D j F Y",
               disableMobile: "true",
               dateFormat: "Y-m-d",
               minDate: "today",
               maxDate: new Date().fp_incr(7)
            });

        </script>


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

