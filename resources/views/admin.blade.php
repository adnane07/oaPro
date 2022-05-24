@extends('layouts.app')
    @section('content')
<body style=" background-color:rgb(150, 151, 116)">
    <div class="container" style="margin-top: 2%; ">

            <a type="button" class="btn btn-primary" href="/" style="color: yellow; background-color: darkblue">
                <i class="bi bi-pencil-square" ></i> Ajouter une reservation
            </a>
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
    <tr>
            <th scope="row" style="vertical-align: middle; text-align: center">#2231608</th>
            <td style="vertical-align: middle; text-align: center">hmed lamba</td>
            <td style="vertical-align: middle; text-align: center">+212 635591305</td>
            <td style="vertical-align: middle; text-align: center">lun ,25/05 20:00-21:00</td>
            <td>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal"  style="margin-left: 7%" data-bs-target="#confirmerModal">
                    <i class="bi bi-check2-square"></i> Confirmer
                </button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger"  data-bs-toggle="modal"  style="margin-left: 7%"  data-bs-target="#supprimerModal">
                    <i class="bi bi-trash3"></i> Supprimer
                  </button>

            <!-- Modal annulation-->
            <form method="POST" action="#">
                @csrf
             <div class="modal fade" id="supprimerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <img src="https://img.icons8.com/color/40/000000/checked--v1.png"/> Reserver Terrain 3 lun 23/05 au 20:00


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Valider</button>
                  </div>
                </div>
              </div>
             </div>
            </form>

            <!-- Modal confirmation -->
            <form method="POST" action="#">
                @csrf
             <div class="modal fade" id="confirmerModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-body">
                    <img src="https://img.icons8.com/color/40/000000/checked--v1.png"/> Reserver Terrain 3 lun 23/05 au 20:00


                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Valider</button>
                  </div>
                </div>
              </div>
             </div>
            </form>



            </td>
    </tr>

        </tbody>
      </table>
    </div></div>

</body>

    @endsection
