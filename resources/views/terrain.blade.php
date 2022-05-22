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
                        <div class="offset-md-1 row ">
                            <div class="col">
                                <img src="https://img.icons8.com/color/72/000000/stadium.png"/>
                            </div>
                            <div class="col">
                                <img src="https://img.icons8.com/color/72/000000/stadium.png"/>
                            </div>
                            <div class="col">
                                <img src="https://img.icons8.com/color/72/000000/stadium.png"/>
                            </div>

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

                </div>
            </div></div>
        </div>
    </div>
</body>

    @endsection

