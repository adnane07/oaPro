<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

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


    // public function history()
    // {
    //     $chart = (new LarapexChart)->lineChart()
    //     ->setTitle('Top 3 scorers of the team.')
    //     ->setSubtitle('Season 2021.')
    //     ->addData('nombre de reservation', [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000, 20000, 30000, 25000, 40000])
    //     ->setXAxis(["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]);

    //     return view('history', compact('chart'));


    // }
    public function history(){

        $userData = reservation::select(DB::raw("COUNT(*) as count"))
                    ->whereYear('dateReseravtion', date('Y'))
                    ->groupBy(DB::raw("Month(dateReseravtion)"))
                    ->pluck('count');


        return view('/history', compact('userData'));
    }
}
