<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div class="container" style="margin-top: 4%;">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped-columns">
                            <thead>
                              <tr >
                                <th> 20:00-21:00,</th>
                                <th colspan="4"> lun 25/05 Terrain 1</th>

                              </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr>
                                    <td class="border-end">
                                        <div style="text-align: center;">
                                            <!-- insert your custom barcode setting your data in the GET parameter "data" -->
                                            <img alt='Barcode Generator TEC-IT'
                                            src='https://barcode.tec-it.com/barcode.ashx?code=QRCode_Events&data=BEGIN%3AVEVENT%0ASUMMARY%3Aadnane%0ALOCATION%3A060514822%0ADESCRIPTION%3Aterrain+3%0ADTSTART%3A20220526T195800%0AEND%3AVEVENT&eclevel=M&dmsize=Default'/>
                                        </div>

                                    </td>
                                    <td colspan="4">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                  <th colspan="4" scope="col" style="color: green" class="border-bottom">Details de Reservation</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <th colspan="2" scope="row">Id Reservation</th>
                                                  <td colspan="2">2210635</td>
                                                </tr>
                                                <tr>
                                                  <th colspan="2" scope="row">Nom</th>
                                                  <td colspan="2">hmed lamba</td>
                                                </tr>
                                                <tr>
                                                  <th colspan="2" scope="row">Telephone</th>
                                                  <td colspan="2">0505050505</td>
                                                </tr>
                                                <tr>
                                                    <th colspan="2" scope="row">email</th>
                                                    <td colspan="2">lamba@gmail.com</td>
                                                </tr>
                                              </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                          </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
