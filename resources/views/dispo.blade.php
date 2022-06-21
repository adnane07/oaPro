@extends('layouts.app')
@section('accueil')
    {{ url('/') }}
@endsection
    @section('content')
<body  style=" background-color:rgb(24, 181, 152)">
    <div class="container" style="margin-top: 1%; ">
        <div class="row justify-content-center">
            <div class="alert alert-warning col-md-9">
                Chers clients, merci d'honorer votre réservation, et de vous présenter 15 min avant le début de votre match.
            </div>

        </div>
        <div class="card" >

    <table class="table" style="margin-bottom: 0%">
        @foreach(array($data['date']) as $date)
        <thead>
          <tr>
            <th colspan="4" scope="col" style="text-align: center">{{ $date }}
            </th>

          </tr>
        </thead>
        <tbody>
            @foreach($hours as $hour)
                @if ($data["terrain"] == 'all')
                    @foreach (array(1, 2, 3) as $terrain )
                    <tr>
                        <th scope="row" style="vertical-align: middle; text-align: center">{{$hour->heureDepart}} - {{$hour->heureFin}}</th>
                        <td style="vertical-align: middle; text-align: center"> terrain {{$terrain}}</td>
                        <td style="font-weight: bold; color: green;vertical-align: middle; text-align: center">{{$hour->prix}} DH</td>
                        <td>
                            <!-- Button trigger modal -->
                            <?php $isreserved = DB::table('Reservation')->where('planningId', $hour->id.''.$terrain.''.$date)->first();?>
                            @if($isreserved)
                            <button  @disabled(true) type="button" class="btn btn-success" style="margin-left: 14%" data-bs-toggle="modal" data-bs-target="#valideModal{{$hour->id}}{{$terrain}}"> Reserver</button>
                            @else
                            <button   type="button" class="btn btn-success" style="margin-left: 14%" data-bs-toggle="modal" data-bs-target="#valideModal{{$hour->id}}{{$terrain}}"> Reserver </button>
                            @endif
                     @guest

                        @if (Route::has('login'))


                            <!-- Modal -->
                            <form method="POST" action="{{ url('reserver/'.$hour->id.'/'.$terrain.'/'.$date) }}">
                                @csrf
                             <div class="modal fade" id="valideModal{{$hour->id}}{{$terrain}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="staticBackdropLabel">
                                            <img src="https://img.icons8.com/color/40/000000/checked--v1.png"/> Reserver Terrain {{$terrain}} {{$date}} au {{$hour->heureDepart}}
                                        </h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                  <div class="modal-body">

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="inpu" pattern="[a-zA-Z\s]{3,20}"
                                        title="verifier votre nom" required placeholder="nom" name="name-r">
                                        <label for="floatingInput">Nom</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="inpu" required placeholder="name@example.com" name="email-r">
                                        <label for="floatingInput">Adresse E-mail</label>
                                    </div>

                                    <div class="form-floating mb-3">

                                        <input type="tel" class="form-control" id="inpu" pattern="0[0-9]{9}" title="verifier votre numero de téléphone" required placeholder="+212 6 ...." name="tel-r">

                                        <label for="floatingInput">N Tel</label>
                                    </div>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-success" name="valider">Valider</button>
                                  </div>
                                </div>
                              </div>
                             </div>
                            </form>

                        @endif

                        @else
                        <!-- Modal -->
                        <form method="POST" action="{{ url('reserverlogin/'.$hour->id.'/'.$terrain.'/'.$date) }}">
                            @csrf
                         <div class="modal fade" id="valideModal{{$hour->id}}{{$terrain}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-body">
                                <img src="https://img.icons8.com/color/40/000000/checked--v1.png"/> Reserver Terrain {{$terrain}} {{$date}} au {{$hour->heureDepart}}


                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-success" name="valider">Valider</button>
                              </div>
                            </div>
                          </div>
                         </div>
                        </form>

                     @endguest

                        </td>
                    </tr>
                    @endforeach
                @else
                    @foreach (array($data["terrain"]) as $terrain )


    <tr>
            <th scope="row" style="vertical-align: middle; text-align: center">{{$hour->heureDepart}} - {{$hour->heureFin}}</th>
            <td style="vertical-align: middle; text-align: center"> terrain {{$terrain}}</td>
            <td style="font-weight: bold; color: green;vertical-align: middle; text-align: center">{{$hour->prix}} DH</td>
            <td>

                <!-- Button trigger modal -->
                <?php $isreserved = DB::table('Reservation')->where('planningId', $hour->id.''.$terrain.''.$date)->first();?>
                @if($isreserved)
                    <button  @disabled(true) type="button" class="btn btn-success" style="margin-left: 14%" data-bs-toggle="modal" data-bs-target="#valideModal{{$hour->id}}{{$terrain}}"> Reserver</button>

                @else
                    <button   type="button" class="btn btn-success" style="margin-left: 14%" data-bs-toggle="modal" data-bs-target="#valideModal{{$hour->id}}{{$terrain}}"> Reserver </button>
                @endif
        @guest

            @if (Route::has('login'))


                <!-- Modal -->
                <form method="POST" action="{{url('reserver/'.$hour->id.'/'.$terrain.'/'.$date)}}">
                    @csrf
                 <div class="modal fade" id="valideModal{{$hour->id}}{{$terrain}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="staticBackdropLabel">
                                <img src="https://img.icons8.com/color/40/000000/checked--v1.png"/> Reserver Terrain {{$terrain}} {{$date}} au {{$hour->heureDepart}}
                            </h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                      <div class="modal-body">
                        <div id="msg_erreur"></div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inpu" pattern="[a-zA-Z\s]{3,20}"
                            title="verifier votre nom"
                             required placeholder="nom" name="name-r">

                            <label for="floatingInput">Nom</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="inpu" required placeholder="name@example.com" name="email-r">
                            <label for="floatingInput">Adresse E-mail</label>
                        </div>

                        <div class="form-floating mb-3">

                            <input class="form-control" required id="inpu"
                                 placeholder="+212 6 ...." name="tel-r" type="text" pattern="0[0-9]{9}" title="verifier votre numero de téléphone">

                            <label for="floatingInput">N Tel</label>

                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success" > Valider</button>
                      </div>
                    </div>
                  </div>
                 </div>
                </form>

            @endif

            @else
            <!-- Modal -->
            <form method="POST" action="{{url('reserverlogin/'.$hour->id.'/'.$terrain.'/'.$date)}}">
                @csrf
             <div class="modal fade" id="valideModal{{$hour->id}}{{$terrain}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <img src="https://img.icons8.com/color/40/000000/checked--v1.png"/> Reserver Terrain {{$terrain}} {{$date}} au {{$hour->heureDepart}}


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success" name="valider">Valider</button>
                  </div>
                </div>
              </div>
             </div>
            </form>

        @endguest

            </td>
    </tr>
                    @endforeach
                @endif
            @endforeach
        </tbody>
        @endforeach
      </table>
    </div></div>

    <!-- Modal -->
    <form method="post" action={{ route('contactez') }}>
        @csrf
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
             <div class="modal-body">

                <div class="mb-3">
                   <input type="prix" class="form-control" id="inpu" name="prix_emet" placeholder="name@example.com">
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

