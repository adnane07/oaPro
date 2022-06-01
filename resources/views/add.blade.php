@extends('layouts.app')

@section('history')

<li class="nav-item">
    <a class="nav-link" href="{{ route('gerer') }}">
        <img src="https://img.icons8.com/external-inipagistudio-mixed-inipagistudio/
        28/000000/external-history-business-analytics-inipagistudio-mixed-inipagistudio.png"/>
         {{ __('Historique de Reservation') }}
    </a>
</li>
@endsection


@section('accueil')
    {{ url('/admin') }}
@endsection

    @section('content')
<body  style=" background-color:rgb(24, 181, 152)">
    <div class="container" style="margin-top: 2%; ">

        

</div><div class="form-check">
 
    @if(Session::get('success'))
<div class="alert alert-success">
  {{session::get('success')}}
</div>
   
    @endif 
  <form action="ajouter" method="post">
    @csrf
      <label for="appt">  heure de depart </label>
  
  <input type="time" id="appt" name="heureDepart"
          required>
  
         <label for="appt">  heure de la fin </label>
  
         <input type="time" id="appt" name="heureFin"
                 required>
                 {{-- <div class="mb-3">
                  <label for="heureDepart" class="form-label">heure de depart </label>
                  <input type="text" class="form-control" id="heureDepart" placeholder="10 " name="heureDepart" required value="{{old('heureDepart')}}">
                 <span style="color:red">@error ('HD'){{$message}} @enderror </span> 
                </div>
                <div class="mb-3">
                  <label for="heureFin" class="form-label"> heure de la fin</label>
                  <input type="text" class="form-control" id="heureFin" placeholder="11" name="heureFin" required>
               
                </div> --}}


                {{-- <div class="mb-3">
                  <label for="prix" class="form-label">entrer le prix </label>
                  <input type="text" class="form-control" id="prix" placeholder="150 " name="prix" required>
                  
                </div> --}}
  
  
  </div>
          <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Annuler </button> --}}
            <button type="submit" class="btn btn-primary" name="valider"> Valider </button>
          </div>
        </div>
      </div>
    </div>
  </form>
</body>
@endsection
