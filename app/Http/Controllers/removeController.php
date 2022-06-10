<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class removeController extends Controller
{
    //
    public function show( Request $request)
    {
        if(isset($_POST['email'])  &&  isset($_POST['IdReservation']) )
       {
$resultat_email=$_GET['email'];
$resultat_id=$_GET['IdReservation'];
$res=DB::table('reservation')->where('id',$resultat_id);

       return view('remove',['res'=>$res]);
        
       }
   
    }
}
