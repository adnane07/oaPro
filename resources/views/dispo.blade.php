@extends('layouts.app')
@section('accueil')
    {{ url('/') }}
@endsection
    @section('content')
<body  style=" background-color:rgb(24, 181, 152)">
    <div class="container" style="margin-top: 2%; ">
        <div class="card" >

    <table class="table" style="margin-bottom: 0%">
        <thead>
          <tr>
            <th colspan="4" scope="col" style="text-align: center">{{ $details["date"] }}
            </th>

          </tr>
        </thead>
        <tbody>
            @foreach($hours as $hour)
                @if ($details["terrain"] == 'all')
                    @foreach (array(1, 2, 3) as $terrain )
                    <tr>
                        <th scope="row" style="vertical-align: middle; text-align: center">{{$hour->name}} - {{$hour->tel}}</th>
                        <td style="vertical-align: middle; text-align: center"> terrain {{$terrain}}</td>
                        <td style="font-weight: bold; color: green;vertical-align: middle; text-align: center">{{$hour->email}}</td>
                        <td>
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" style="margin-left: 14%" data-bs-toggle="modal" data-bs-target="#valideModal{{$hour->name}}{{$terrain}}">
                              Reserver
                            </button>
                     @guest

                        @if (Route::has('login'))


                            <!-- Modal -->
                            <form method="POST" action="#">
                                @csrf
                             <div class="modal fade" id="valideModal{{$hour->name}}{{$terrain}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h6 class="modal-title" id="staticBackdropLabel">
                                            <img src="https://img.icons8.com/color/40/000000/checked--v1.png"/> Reserver Terrain {{$terrain}} {{$details["date"]}} au {{$hour->name}}
                                        </h6>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                  <div class="modal-body">

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="inpu" required placeholder="nom">
                                        <label for="floatingInput">Nom</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="inpu" required placeholder="name@example.com">
                                        <label for="floatingInput">Adresse E-mail</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="tel" class="form-control" id="inpu" value="+212 " required placeholder="+212 6 ....">
                                        <label for="floatingInput">N Tel</label>
                                    </div>

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-success">Valider</button>
                                  </div>
                                </div>
                              </div>
                             </div>
                            </form>

                        @endif

                        @else
                        <!-- Modal -->
                        <form method="POST" action="#">
                            @csrf
                         <div class="modal fade" id="valideModal{{$hour->name}}{{$terrain}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-body">
                                <img src="https://img.icons8.com/color/40/000000/checked--v1.png"/> Reserver Terrain {{$terrain}} {{$details["date"]}} au {{$hour->name}}


                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-success">Valider</button>
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
                    @foreach (array($details["terrain"]) as $terrain )


    <tr>
            <th scope="row" style="vertical-align: middle; text-align: center">{{$hour->name}} - {{$hour->tel}}</th>
            <td style="vertical-align: middle; text-align: center"> terrain {{$terrain}}</td>
            <td style="font-weight: bold; color: green;vertical-align: middle; text-align: center">{{$hour->email}}</td>
            <td>
                <!-- Button trigger modal -->
                <button  @disabled(true) type="button" class="btn btn-success" style="margin-left: 14%" data-bs-toggle="modal" data-bs-target="#valideModal{{$hour->name}}{{$terrain}}">
                  Reserver
                </button>
        @guest

            @if (Route::has('login'))


                <!-- Modal -->
                <form method="POST" action="#">
                    @csrf
                 <div class="modal fade" id="valideModal{{$hour->name}}{{$terrain}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h6 class="modal-title" id="staticBackdropLabel">
                                <img src="https://img.icons8.com/color/40/000000/checked--v1.png"/> Reserver Terrain {{$terrain}} {{$details["date"]}} au {{$hour->name}}
                            </h6>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                      <div class="modal-body">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inpu" required placeholder="nom">
                            <label for="floatingInput">Nom</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="inpu" required placeholder="name@example.com">
                            <label for="floatingInput">Adresse E-mail</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="inpu" value="+212 " required placeholder="+212 6 ....">
                            <label for="floatingInput">N Tel</label>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">Valider</button>
                      </div>
                    </div>
                  </div>
                 </div>
                </form>

            @endif

            @else
            <!-- Modal -->
            <form method="POST" action="#">
                @csrf
             <div class="modal fade" id="valideModal{{$hour->name}}{{$terrain}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <img src="https://img.icons8.com/color/40/000000/checked--v1.png"/> Reserver Terrain {{$terrain}} {{$details["date"]}} au {{$hour->name}}


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Valider</button>
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

