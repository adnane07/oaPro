@extends('layouts.app')
    @section('content')
        <body style=" background-color:rgb(150, 151, 116)">
            <div class="container" style="margin-top: 4%;">

                <div class="row justify-content-center">
                    <div class="col-md-7  ">
                        <div class="border border-1 border-white rounded" id="login" style="background-color: white">
                        <h4 class="card-title offset-md-5" style="font-weight: bold; color:green">Reserver</h4>

                    <form action="#">
                        @csrf
                        <div class="col-md-6 offset-md-3 row mb-3">
                            <input type="datetime-local"
                            class="form-control" name="date"
                            value="{{ old('date') }}"
                            required  id="inpu"
                            placeholder="select une date">
                        </div>

                        <div class="col-md-7 offset-md-3 row">
                            <div class="col">
                                <input class="btn btn-secondary" type="reset" value="Reset">
                            </div>
                            <div class="col">
                                <button class="btn btn-success" type="submit">Suivant <i class="bi bi-chevron-double-right"></i></button>
                            </div>

                        </div>

                    </form>

                </div></div></div>

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

        </script>


    </div>
</body>

    @endsection

