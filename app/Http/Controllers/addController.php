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
        return view('add');
    }

    function ajouter( Request $request){

   
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


  
    $planning->save();

    
    return back()->with('success',' les donnes sont inserer');


    }
}
