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

   
    $current2 = new Carbon($request->input('heureDepart'));
    $planning = new Planning;
    $planning->heureDepart =$request->input('heureDepart');
   $planning->heureFin =$request->input('heureFin');
//    ******************* carbon function ********************
//    for($i=1;$i<4;$i++){
    
//       $planning->heureFin = $current2 ->addHour($i);
      
//       $planning->save();}
//       for($i=0;$i<4;$i++){
    
//         $planning->heureDepart=$current2 ->addHour($i);
        
//         $planning->save();}
// *************************************************************


  
    $planning->save();

    
    return back()->with('success',' les donnes sont inserer');


    }
}
