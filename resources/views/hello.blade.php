{{$planningId = Cookie::get('planningId');}}

    {{$reservation = DB::table('Reservation')->where('planningId', $planningId)->first();}}

<div class="container" style="margin-top: 4%;">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped-columns" style="border: 1px solid black" >
                        <thead>
                          <tr >
                            <th style="border-bottom: 1px solid black"> {{$reservation->heureDepart}} - {{$reservation->heureFin}},</th>
                            <th style="border-bottom: 1px solid black" colspan="4"> {{$reservation->dateReservation}} Terrain {{$reservation->idTerrain}}</th>

                          </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            <tr>
                                <td colspan="4">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                              <th colspan="4" scope="col" style="color: green ; border-bottom: 1px solid black" class="border-bottom">Details de Reservation</th>
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

                </div>
            </div>
        </div>
    </div>
</div>
