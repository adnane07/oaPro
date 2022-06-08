@extends('layouts.app')



@section('accueil')
    {{ url('/sup/admin') }}
@endsection

    @section('content')
<body  style=" background-color:rgb(24, 181, 152)">
    <div class="container" style="margin-top: 2%; ">
        @if (session('supprime'))
            <div class="alert alert-danger">{{session('supprime')}}</div>
        @endif
        @if (session('fail'))
            <div class="alert alert-warning"><i class="bi bi-exclamation-octagon"></i> {{session('fail')}}</div>
        @endif
        @if (session('confirme'))
            <div class="alert alert-success">{{session('confirme')}}</div>
        @endif

            <a type="button" class="btn btn-primary" href="/" style="color: yellow; background-color: darkblue">
                <i class="bi bi-pencil-square" ></i> Ajouter une reservation
            </a>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#search">
                <i class="bi bi-search"></i> Search
            </button>
            <!-- Modal search-->
            <form method="POST" action={{ route('add') }}>
                @csrf
             <div class="modal fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    
                    <div class="col-md-6 offset-md-3 row mb-3">
                        <input type="number" name="idR"
                        class="form-control"
                        id="inpu"
                        placeholder="ID reservation">
                    </div>

                    <div class="col-md-6 offset-md-3 row mb-3">
                        <input type="datetime-local"
                        class="form-control" name="date"
                        value="{{ old('date') }}"
                        
                        placeholder="selectionner une date">
                    </div>
                    
                    <div class="col-md-6 offset-md-3 row mb-3">
                        <input type="time-local" 
                        id="inpu" class="form-control" 
                        placeholder="heure" name="heureDepart"
                         value="{{ old('date') }}">
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
                        
                        flatpickr("input[type=time-local]",
                        {   
                        locale:"fr",
                        enableTime: true,
                        noCalendar: true,
                        dateFormat: "H:00",
                        time_24hr: true
                        });

                    </script>
                    
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Search</button>
                  </div>
                </div>
              </div>
             </div>
            </form>


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
    @foreach($reservers as $reserver)
        <tr>
            <th scope="row" style="vertical-align: middle; text-align: center">{{$reserver->id}}</th>
            <td style="vertical-align: middle; text-align: center">{{$reserver->name}}</td>
            <td style="vertical-align: middle; text-align: center">{{$reserver->tel}}</td>
            <td style="vertical-align: middle; text-align: center">{{$reserver->dateReservation}} {{$reserver->heureDepart}}-{{$reserver->heureFin}}</td>
            <td >
              <div style=" text-align: center">
              @if($reserver->isConfirmed == 0)
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#confirmerModal{{$reserver->id}}">
                    <i class="bi bi-check2-square"></i>
                </button>
              @endif
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger"  data-bs-toggle="modal" data-bs-target="#supprimerModal{{$reserver->id}}">
                    <i class="bi bi-trash3"></i>
                  </button>
              </div>

            <!-- Modal annulation-->
            <form method="POST" action="{{url('supprime/'.$reserver->id)}}">
                @csrf
             <div class="modal fade" id="supprimerModal{{$reserver->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <img src="https://img.icons8.com/doodle/40/000000/delete-sign.png"/> Supprimer Reservation de Terrain {{$reserver->idTerrain}} pour {{$reserver->dateReservation}} au {{$reserver->heureDepart}}


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                  </div>
                </div>
              </div>
             </div>
            </form>

            <!-- Modal confirmation -->
            <form method="POST" action="{{url('confirme/'.$reserver->id)}}">
                @csrf
             <div class="modal fade" id="confirmerModal{{$reserver->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <img src="https://img.icons8.com/color/40/000000/checked--v1.png"/> Confirmer la reservation Terrain {{$reserver->idTerrain}} pour {{$reserver->dateReservation}} au {{$reserver->heureDepart}}


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Confirmer</button>
                  </div>
                </div>
              </div>
             </div>
            </form>

            </td>

        </tr>
    @endforeach
        </tbody>
      </table>
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
