@extends('layouts.app')
@section('accueil')
    {{ url('/') }}
@endsection
    @section('content')


    <body  style=" background-color:rgb(24, 181, 152)">
        <div class="container" style="margin-top: 1%;">
            <div class="row justify-content-center">
                <div class="col-md-5 ">
           @if(session()->has('success'))
<div class="alert alert-success">

{{session()->get('sucess')}}
</div>
@endif




            <form method="POST" action="{{ route('store')}}">
                @csrf
                <div class="mb-3">
                  <label for="titre" class="form-label"  style=" font-weight: bold; color:rgb(229, 237, 235); ">Titre de l'annonce</label>
                  <input type="texte" class="form-control" id="titre" aria-describedby="titre" name="titre"   placeholder=" exemple: Demande\Offre\Evenement\Match ..." required>

                </div>

                <div class="form-group mb-3 ">
                    <label for="description" style=" font-weight: bold; color:rgb(229, 237, 235); "> Contenu de l'annonce</label>
                    <textarea name="description" class="form-control " id="description" cols="10" rows="5"   placeholder="Votre texte ici"   required></textarea>
                @if ($errors ->has('description'))

                <span class="invalid-feedback">{{$errors->first('description')}}</span>
                @endif

                </div>


                <button type="submit" class="btn btn-success ">Submit</button>

            </div>
        </div>

<br>

              </form>

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

            @endsection
