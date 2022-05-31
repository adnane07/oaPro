<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;

class PdfController extends Controller
{
    //

    public function pdf(){

        $data["email"] = "elakhaladnane.07@gmail.com";
        

    $pdf = PDF::loadView('hello',$data);

    return $pdf->download("RecapilatifReserve.pdf");

    }
}
