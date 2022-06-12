<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;

class AdminController extends Controller
{
    //
    public function index()
    {
        $listereserver = DB::table('Reservation')->whereRaw('Date(dateReservation) >= CURDATE()')->whereRaw('Date(dateReservation) <= (CURDATE()+7)')->orderBy('dateReservation')->orderBy('heureDepart')->get();
            return view('admin',['reservers' => $listereserver]);

    }

    public function search(Request $request)
    {
        $validated = $request->validate([
        "date" => 'required',
        ]);

        $search = [
            "date" => request('date')];

        $listereserver = DB::table('Reservation')->where('dateReservation', $search["date"])->orderBy('heureDepart')->get();

            return view('admin',compact('search'),['reservers' => $listereserver]);

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


    public function history()
    {$userData = [];

        for($i = 1; $i <= 12; $i++){

            $userData[$i] = reservation::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('dateReservation', date('Y'))
                    ->whereMonth('dateReservation', $i)
                    ->groupBy(DB::raw("Month(dateReservation)"))
                    ->count();

            if(empty($userData[$i])){
                  $userData[$i] = 0;    }
        }


        $chart = (new LarapexChart)->lineChart()
        ->setTitle('Historique de reservation')
        ->setSubtitle('Season '.date('Y'))
        ->setDataset([
            [
                'name'  =>  'Nombre de Reservation',
                'data'  =>  [$userData[1],$userData[2],$userData[3],
                             $userData[4],$userData[5],$userData[6],
                             $userData[7],$userData[8],$userData[9],
                             $userData[10],$userData[11],$userData[12]]
            ]
        ])
        ->setXAxis(["Jan", "Fev", "Mar", "Apr", "Mai", "Juin", "Juill", "Aout", "Sep", "Oct", "Nov", "Dec"]);

        return view('history', compact('chart'));


    }
}
