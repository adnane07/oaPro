<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AnStore ;
use App\Models\annonce;
use App\Models\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class annonceController extends Controller
{
    //


    //****************affichage***************** 
    public function index()
    {//$users = User::where('user_id', $annonces->id)->get();
        //$user_id  = cookie::get('id');
        //$annonces=annonce::find($user_id);
        $annonces =DB::table('annonce')->orderBy('created_at','DESC')->get();
        

        return view('affichage',compact('annonces'));
    
    }

    public function create()
    {
        return view ('annonce');
    }
    public function store(AnStore $request)
    {

// $annonce = new annonce();
//   $annonce->titre =$request->input('titre');
//    $annonce->description =$request->input('description');
//    $annonce->save();

//***********************************

if (!Auth::check())
{
    return redirect('login');
}

$validated=$request->validated();
$annonces = new annonce();
$annonces->titre=$validated['titre'];
$annonces->description=$validated['description'];
$annonces->user_id=auth()->user()->id;
$annonces->save();

return redirect()->route('affichage')->with('success','votre annonce a ete poste');

    }


public function delete($id)
{
$annonce=annonce::where('id',$id)->first();
$annonce->delete();
return redirect()->route('affichage')->with([
    'success'=> 'annonce supprime'
]);
}

public function edit( Request $request ,$id)
{
    $annonce=annonce::where('id',$id)->first();
    $annonce->update([
        'titre' => $request->titre,
        'description' => $request->description,
    ]);
    return redirect()->route('affichage')->with([
        'success'=> 'annonce modifie'
    ]);
}

 




}
