@extends('layouts.app')
    @section('content')
<body style=" background-color:rgb(150, 151, 116)">
    <div class="container" style="margin-top: 2%; ">
        <div class="card" >

    <table class="table" style="margin-bottom: 0%">
        <thead>
          <tr>
            <th colspan="4" scope="col" style="text-align: center">#</th>

          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">20:00-21:00</th>
            <td>Terrain 1</td>
            <td>150,00 MAD</td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Reserver
                </button>
        @guest

            @if (Route::has('login'))


                <!-- Modal -->
                <form method="POST" action="#">
                    @csrf
                 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                      <div class="modal-body">

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" required placeholder="nom">
                            <label for="floatingInput">Nom</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" required placeholder="Prenom">
                            <label for="floatingInput">Prenom</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" required placeholder="name@example.com">
                            <label for="floatingInput">Adresse E-mail</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="floatingInput" value="+212 " required placeholder="+212 6 ....">
                            <label for="floatingInput">N Tel</label>
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">Confirmer</button>
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
             <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <i class="bi bi-check-circle"></i>  Reserver Terrain 3 lun 23/05 au 20:00


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Confirmer</button>
                  </div>
                </div>
              </div>
             </div>
            </form>

        @endguest

            </td>
          </tr>





          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry the Bird</td>
            <td>Fuck u a hafsa</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    </div></div>

</body>

    @endsection

