@extends('layouts.app')
@section('accueil')
    {{ url('/') }}
@endsection
    @section('content')
        <body style=" background-color:rgb(150, 151, 116)">
            <div class="container" style="margin-top: 4%;">
                <div class="row justify-content-center">
                    <div class="col-md-6  ">
                        <div class="border border-1 border-white rounded" id="login" style="background-color: white">
                        <h4 class="card-title" style="font-weight: bold; color:green; text-align: center">
                            réservation confirmée <img src="https://img.icons8.com/external-others-amoghdesign/24/000000/external-done-multimedia-flat-30px-others-amoghdesign.png"/>
                        </h4>
                        <div class="col-md-6 offset-md-3 row">
                        <a type="button" class="btn btn-success" href="" style="color: black">
                            <img src="https://img.icons8.com/ios/40/000000/export-pdf-2.png"/> Telecharger Pdf
                        </a>
                        </div>

                        </div>
                    </div>
                </div>
            </div>


    <!-- Modal -->
    <form method="post" action={{"proj.php"}}>
        @csrf
     <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
             <div class="modal-body">

                <div class="mb-3">
                   <input type="email" class="form-control" id="inpu" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                   <textarea class="form-control" id="inpu" rows="3"></textarea>
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
