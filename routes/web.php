<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function () {
    return view('welcome');
});
Route::get('/gerer', function () {
    return view('gerer');
})->name('gerer');

Route::get('/dispo', function () {
    return view('dispo');
})->name('dispo');

Route::get('/uploadpdf', function () {
 
        $data["email"] = "elakhaladnane.07@gmail.com";
        $data["title"] = "votre reçu de reservation OASIS";
        $data["body"] = "this is demo";

    $pdf = PDF::loadView('hello',$data);

    Mail::send('pdf', $data , function($message)use($data , $pdf){

        $message->to($data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "RecapilatifReserve.pdf");

    });

    return view('uploadpdf');
})->name('uploadpdf');

Route::get('pdf',[ App\Http\Controllers\PdfController::class,'pdf'])->name('pdf');

Route::get('/annuler', function () {
    return view('annuler');
})->name('annuler');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');


Route::get('/contactez', function () {
 
    $data["email"] = "oasisgarden10@gmail.com";
    $data["title"] = "votre reçu de reservation OASIS";
    $data["body"] = "this is demo";

Mail::send('pdf', $data , function($message)use($data){

    $message->to($data["email"])
            ->subject($data["title"]);

});

return view('welcome');
})->name('contactez');