<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;


class removeController extends Controller
{
    //
    public function show( Request $request)
    {
        if(isset($_GET['email'])  &&  isset($_GET['IdReservation']) )
       {


             // $resultat_email=$_GET['email'];
              //$resultat_id=$_GET['IdReservation'];
              $resultat_id=$request->input('IdReservation');
              $reservations=DB::table('reservation')->where('id', $resultat_id)->get();

       return view('remove' ,['reservations' => $reservations]);}
      else 
      {return redirect('gerer');}
        
       //}
   
    }

public function delete($IdReservation)
{
    $reservations=Reservation::where('id',$IdReservation)->first();
    $reservations->delete();
return redirect()->route('gerer')->with([
    'success'=> 'reservation annule'
]);
}

}
