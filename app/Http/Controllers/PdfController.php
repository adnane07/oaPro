<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class PdfController extends Controller
{
    //

    public function pdf(){

        $planningId = Cookie::get('planningId');

    $reservation = DB::table('Reservation')->where('planningId', $planningId)->first();


    $pdf = PDF::loadView('pdf',compact('reservation'));

    return $pdf->download("RecapilatifReserve.pdf");

    }
}
