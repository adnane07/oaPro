<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index()
    {
        $listereserver = Reservation::all();
            return view('admin',['reservers' => $listereserver]);

    }

    public function search()
    {

        $search = [
            "date" => request('date'),
            "heureDepart" => request('heureDepart')];

        $listereserver = Reservation::all();
            return view('admin',['reservers' => $listereserver]);

    }

    public function annuler()
    {
        return view('annuler');
    }


    public function confirme($id)
    {
        $con=Reservation::find($id);
        $con->isConfirmed = 1;
        $res = $con->update();
        
        if ($res){
            return redirect()->back()->with('confirme','reservation bien confirmer');
         }
         else{
             return redirect()->back()->with('fail','reservation non confirmer');
         }
 
    }


    public function supprime($id)
    {
        $res=Reservation::find($id)->delete();
        if ($res){
           return redirect()->back()->with('supprime','reservation bien supprimer');
        }
        else{
            return redirect()->back()->with('fail','reservation non supprimer');
        }

    }
}
