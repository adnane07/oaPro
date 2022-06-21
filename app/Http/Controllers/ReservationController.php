<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Planning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReservationController extends Controller
{
    //
    function reserver($id, $terrain, $date){

    $hour = Planning::find($id);
        $details = [
            "name" => request('name-r'),
            "email" => request('email-r'),
            "tel" => request('tel-r')];
                
            $reservation = [

            'name' => $details['name'],
            'tel' => $details['tel'],
            'email' => $details['email'],
            'dateReservation' => $date,
            'heureDepart' =>$hour->heureDepart,
            'heureFin' =>$hour->heureFin,
            'idTerrain' => $terrain,
            'planningId' => $id.$terrain.$date];

            
        Reservation::create([

            'name' => $details['name'],
            'tel' => $details['tel'],
            'email' => $details['email'],
            'dateReservation' => $date,
            'heureDepart' =>$hour->heureDepart,
            'heureFin' =>$hour->heureFin,
            'idTerrain' => $terrain,
            'planningId' => $id.$terrain.$date,

          ]);

          return Redirect::route('uploadpdf')->cookie(cookie('planningId', $reservation['planningId']));

    }


        function reserverlogin($id, $terrain, $date){


            $hour = Planning::find($id);

            $reservation = [

                'name' => Auth::user()->name,
                'tel' => Auth::user()->tel,
                'email' => Auth::user()->email,
                'dateReservation' => $date,
                'heureDepart' =>$hour->heureDepart,
                'heureFin' =>$hour->heureFin,
                'idTerrain' => $terrain,
                'planningId' => $id.$terrain.$date];



            Reservation::create([

                'name' => Auth::user()->name,
                'tel' => Auth::user()->tel,
                'email' => Auth::user()->email,
                'dateReservation' =>$date,
                'heureDepart'=> $hour->heureDepart,
                'heureFin'=> $hour->heureFin,
                'idTerrain' => $terrain,
                'planningId' => $id.$terrain.$date,

            ]);
                // return redirect('uploadpdf')->with($reservation['planningId']);
               // return redirect()->route('uploadpdf', ['planningId' => $reservation['planningId']]);
                return Redirect::route('uploadpdf')->cookie(cookie('planningId', $reservation['planningId']));
            }
}
