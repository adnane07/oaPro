<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planning;
use Carbon\Carbon;



//biblio de db
use Illuminate\Support\Facades\DB;

class addController extends Controller
{
    //
    public function index()
    {
        return view('add')->with('success',' les donnes sont inserer');
    }

    function ajouter(){


   
//    $current2 = new Carbon($request->input('heureDepart'));
    $planning = new Planning;
  $planning->heureDepart =$request->input('heureDepart');
   $planning->heureFin =$request->input('heureFin');
   $planning->save();

    
   return back()->with('success',' les donnes sont inserer');
//    ******************* carbon function ********************
//    for($i=1;$i<4;$i++){
//     $planning = new Planning;

//       $planning->heureFin = $current2 ->addHour($i);
      
//       $planning->save();}
//       for($i=0;$i<4;$i++){
//         //$planning = new Planning;

//        $planning->heureDepart=$current2 ->addHour($i);
        

        $details = [
            "heureDepart" => request('heureDepart'),
            "heureFin" => request('heureFin'),
            "prix" => request('prix')];
            
           $fin = $details['heureFin'];
           $dep = $details['heureDepart'];

        while((Carbon::parse($fin)->floatDiffInHours($dep, false))<0){
            $current1 = new Carbon($details['heureDepart']);
            $current2 = new Carbon($details['heureDepart']);

            $details['heureFin'] = $current2 ->addHour(1);

            $start = $details['heureDepart'];
            $end = $details['heureFin'];


            Planning::create([
                'heureDepart' => Carbon::parse($start)->format('H:i'),
                'heureFin' => Carbon::parse($end)->format('H:i'),
                'prix' => $details['prix'],
            ]);

            $details['heureDepart'] = $current1 ->addHour(1);

            $dep = $details['heureDepart'];}
            
            return back()->with('success','les donnes sont inserer');



//     $current2 = new Carbon($request->input('date'));
//     $planning = new Planning;
//     $planning->heureDepart =$request->input('heureDepart');
//    $planning->heureFin =$request->input('heureFin');
//    ******************* carbon function ********************
//

//

//       $planning->save();}
//       for($i=0;$i<4;$i++){

//         $planning->heureDepart=$current2 ->addHour($i);


//         $planning->save();}
// *************************************************************
// $data = array(
//     array('heureDepart'=>'08:00', 'heureFin'=> '09:00'),
//     array('heureDepart'=>'22:00', 'heureFin'=> '23:00'),
//     //...
// );

// Model::insert($data);
// DB::table('planning')->insert($data);

//*****************************************************



    // $planning->save();


    // return back()->with('success',' les donnes sont inserer');


    }
}
