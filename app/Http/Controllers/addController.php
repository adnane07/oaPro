<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Planning;



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

    //  $request->validate([
    //      'heureDepart'=>'required',
    //      'heureFin'=>'required',
    //      'prix'=>'required',


    //  ]);
     //pour l insertion dand DB et ajouter la biblio de db
    

    //  $query=DB::table('planning')->insert([
    //     'heureDepart'=>request->input('heureDepart'),
    //     'heureFin'=>request->input('heureFin'),
    //     'prix'=>request->input('prix')


    //  ]);
     //check if data is insert into db
    //  if($query){
    //      return back()->with('success',' data est inserer');
    //  }else{
    //      return back()->with('fail',' data  n est pas  inserer');
    //  }
    $planning = new Planning;
    $planning->heureDepart =$request->input('heureDepart');
    $planning->heureFin =$request->input('heureFin');
   // $planning->prix =$request->input('prix');
    $planning->save();

    //return back()->with('status',' aded successfuly');
    return back()->with('success',' les donnes sont inserer');


    }
}
