<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Barryvdh\DomPDF\Facade\Pdf;


class AdminController extends Controller
{

    public function index()
    {
        $listereserver = DB::table('Reservation')->whereRaw('Date(dateReservation) >= CURDATE()')->whereRaw('Date(dateReservation) <= (CURDATE()+7)')->orderBy('dateReservation')->orderBy('heureDepart')->get();
            return view('admin',['reservers' => $listereserver]);

    }

    public function search(Request $request)
    {
        // $validated = $request->validate([
        // "date" => 'required',
        // ]);kk

        $search = [
            "date" => request('date'),
        "name" => request('name')];


        if((empty($search["name"]))&&(empty($search["date"]))){
            return redirect()->back()->with('fail','Les champs date et nom sont obligatoire.');
        }
        if(empty($search["name"]))
            {$listereserver = DB::table('Reservation')->where('dateReservation', $search["date"])->orderBy('dateReservation')->orderBy('heureDepart')->get();

            return view('admin',compact('search'),['reservers' => $listereserver]);}

        if(empty($search["date"]))
            {$listereserver = DB::table('Reservation')->where('name', 'LIKE','%'.$search["name"].'%')->orderBy('dateReservation')->orderBy('heureDepart')->get();

            return view('admin',compact('search'),['reservers' => $listereserver]);}
        else{
            $listereserver = DB::table('Reservation')->where('name', 'LIKE','%'.$search["name"].'%')->where('dateReservation', $search["date"])->orderBy('dateReservation')->orderBy('heureDepart')->get();

            return view('admin',compact('search'),['reservers' => $listereserver]);}

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
        $res=Reservation::find($id);

            $data["email"] = $res->email;
            $data["title"] = "votre reservation OASIS a été annulé";
            $data["body"] = "this is demo";


        Mail::send('mailsuppnotif', $data , function($message)use($data){

            $message->to($data["email"])
                    ->subject($data["title"]);

        });
        $res=Reservation::find($id)->delete();
        if($res){

           return redirect('sup/admin')->with('supprime','reservation bien supprimer');
        }
        else{
            return redirect('sup/admin')->with('fail','reservation non supprimer');
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
