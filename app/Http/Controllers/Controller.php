<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\User;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function dispo()
    {

        $listehour = User::all();
        $details = [
            "date" => request('date'),
            "terrain" => request('terrain')];


            return view('dispo',compact('details'),['hours' => $listehour]);

    }
}
