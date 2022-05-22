@extends('layouts.app')
    @section('content')

    <body style=" background-color:rgb(150, 151, 116)">
        <div class="container" style="margin-top: 4%;">

            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="border border-1 border-white rounded" id="login" style="background-color: white">
                    <h4 class="card-title offset-md-4" style="font-weight: bold; color:green">Gérer les réservations</h4>

                <form action="#">
                    @csrf

                    <div class="col-md-6 offset-md-3 row mb-3">
                        <input type="email" name="email"
                        class="form-control" value="{{ old('email') }}"
                        id="inpu" required
                        placeholder="E-mail">
                    </div>

                    <div class="col-md-6 offset-md-3 row mb-3">
                        <input type="text" name="IdReservation"
                        class="form-control"
                        id="inpu" required
                        placeholder="ID reservation">
                    </div>

                    <div class="col-md-6 offset-md-3 row mb-3">
                        <button class="btn btn-success" type="submit">Soumettre</button>
                    </div>

                </form>

            </div>
        </div></div>

        </div>
    </body>

    @endsection
