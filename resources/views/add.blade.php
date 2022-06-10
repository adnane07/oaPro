@extends('layouts.app')


@section('accueil')
    {{ url('/sup/admin') }}
@endsection

    @section('content')
<body  style=" background-color:rgb(24, 181, 152)">
    <div class="container" style="margin-top: 2%; ">
       

    </div>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="border border-1 border-white rounded" id="login" style="background-color: white">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        <h4 class="card-title" style="font-weight: bold; color:green; text-align: center">Planning du jour</h4>


        @if(Session::get('success'))
        <div class="alert alert-success">
            {{session::get('success')}}
        </div>
        @endif
        <form action={{ route('add') }} method="post">
            @csrf

            <div class="col-md-4 offset-md-4 row mb-3">
                <label for="appt" class="form-label"><i class="bi bi-clock"></i> Heure de depart </label>
                <input type="time-local" id="inpu" class="form-control" placeholder="--:--" name="heureDepart" value="{{ old('date') }}" required>
            </div>

            <div class="col-md-4 offset-md-4 row mb-3">
                <label for="appt" class="form-label"><i class="bi bi-clock"></i> Heure de la fin </label>
                <input type="time-local" id="inpu" class="form-control" placeholder="--:--" name="heureFin" value="{{ old('date') }}" required>
            </div>

         <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
         <script src="https://npmcdn.com/flatpickr/dist/flatpickr.min.js"></script>
         <script src="https://npmcdn.com/flatpickr/dist/l10n/fr.js"></script>

         <script>
           flatpickr("input[type=time-local]",
           {   
               locale:"fr",
               enableTime: true,
               noCalendar: true,
               dateFormat: "H:00",
               time_24hr: true
            });

         </script>

            <div class="col-md-4 offset-md-4 row mb-3">
                <label for="prix" class="form-label">Prix </label>
                <input type="number" class="form-control" id="inpu" placeholder="-- DH " name="prix" required>
            </div>


                {{-- <div class="mb-3">
                  <label for="heureDepart" class="form-label">heure de depart </label>
                  <input type="text" class="form-control" id="heureDepart" placeholder="10 " name="heureDepart" required value="{{old('heureDepart')}}">
                 <span style="color:red">@error ('HD'){{$message}} @enderror </span>
                </div>
                <div class="mb-3">
                  <label for="heureFin" class="form-label"> heure de la fin</label>
                  <input type="text" class="form-control" id="heureFin" placeholder="11" name="heureFin" required>

                </div> --}}


            <div class="modal-footer">

            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Annuler </button> --}}
            <button type="submit" class="btn btn-success" name="valider"> Valider </button>

            </div>


        </form>
    </div></div>
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
