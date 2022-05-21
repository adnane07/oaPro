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
                        <input type="text" class="form-control" placeholder="select une date">
                    </div>

                    <div class="col-md-6 offset-md-3 row mb-3">
                        <button class="btn btn-success" type="submit"><i class="bi bi-search"></i> Soumettre</button>

                    </div>

                </form>

            </div></div></div>

        </div>
    </body>

    @endsection
