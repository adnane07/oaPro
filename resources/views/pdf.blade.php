<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>




</head>
<body>
    <div class="container" style="margin-top: 4%;">
        <div class="row justify-content-center">
            <div class="col-md-8 ">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped-columns" style="border: 1px solid black" >
                            <thead>
                              <tr >
                                <th style="border-bottom: 1px solid black"> 20:00-21:00,</th>
                                <th style="border-bottom: 1px solid black" colspan="4"> lun 25/05 Terrain 1</th>

                              </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <tr>
                                    <td class="border-end">
                                        <div style="text-align: center; border-right: 1px solid black">
                                            <!-- insert your custom barcode setting your data in the GET parameter "data" -->

                                            <img alt='Barcode Generator TEC-IT'
                                            src='https://barcode.tec-it.com/barcode.ashx?code=QRCode_Events&data=BEGIN%3AVEVENT%0ASUMMARY%3Aadnane%0ALOCATION%3A060514822%0ADESCRIPTION%3Aterrain+3%0ADTSTART%3A20220526T195800%0AEND%3AVEVENT&eclevel=M&dmsize=Default'/>
                                        </div>

                                    </td>
                                    <td colspan="4">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                  <th colspan="4" scope="col" style="color: green ; border-bottom: 1px solid black" class="border-bottom">Details de Reservation</th>
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
