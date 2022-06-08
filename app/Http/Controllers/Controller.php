<?php

namespace App\Http\Controllers;

use App\Models\Planning;
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

        $listehour = Planning::all();
        $data = [
            "date" => request('date'),
            "terrain" => request('terrain')];


            return view('dispo',compact('data'),['hours' => $listehour]);

    }
}
