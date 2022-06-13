<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Request;

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

// admin section if ($request()->user() && request()->user()->isAdmin())

Route::prefix('sup')->middleware('auth','isAdmin')->group(function(){

    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('AdminInt');

    Route::post('/search', [App\Http\Controllers\AdminController::class, 'search'])->name('search');


    Route::post('/add', [App\Http\Controllers\addController::class, 'ajouter'])->name('add');
    Route::get('/edit', [App\Http\Controllers\addController::class, 'index'])->name('edit');
    
});













Route::get('/home', function () {
    return view('welcome');
})->name('home');
Route::get('/gerer', function () {
    return view('gerer');
})->name('gerer');


Route::post('/confirme/{id}', [App\Http\Controllers\AdminController::class, 'confirme'])->name('confirme');
Route::post('/supprime/{id}', [App\Http\Controllers\AdminController::class, 'supprime'])->name('supprime');

Route::post('/reserver/{id}/{terrain}/{date}', [App\Http\Controllers\ReservationController::class, 'reserver'])->name('reserver');
Route::post('/reserverlogin/{id}/{terrain}/{date}', [App\Http\Controllers\ReservationController::class, 'reserverlogin'])->name('reserverlogin');


Route::post('/dispo', [App\Http\Controllers\Controller::class, 'dispo'])->name('dispo');





Route::get('/uploadpdf',function () {

    $planningId = Cookie::get('planningId');

    $reservation = DB::table('Reservation')->where('planningId', $planningId)->first();

    //     $data["email"] = "elakhaladnane.07@gmail.com";
    //     $data["title"] = "votre reçu de reservation OASIS";
    //     $data["body"] = "this is demo";

    // $pdf = PDF::loadView('hello',$data);

    // Mail::send('pdf', $data , function($message)use($data , $pdf){

    //     $message->to($data["email"])
    //             ->subject($data["title"])
    //             ->attachData($pdf->output(), "RecapilatifReserve.pdf");

    // });

    return view('uploadpdf',compact('reservation'));
})->name('uploadpdf');





Route::get('pdf',[ App\Http\Controllers\PdfController::class,'pdf'])->name('pdf');

Route::get('/annuler', function () {
    return view('annuler');
})->name('annuler');



Route::get('/planning', function () {
    return view('planning');
})->name('planning');



//mail
Route::post('/contactez', function () {

    $details["email"] = "oasisgarden10@gmail.com";
    $details["title"] = request('email_emet');
    $details["body"] = request('message_env');


Mail::send('mailsend', $details , function($message)use($details){

    $message->to($details["email"])
            ->subject($details["title"]);

});

return redirect()->back();
})->name('contactez');




// **************************************adds********************************************************


Route::get('/annonce', [App\Http\Controllers\annonceController::class, 'create'])->name('annonce');
Route::post('/annonce',[App\Http\Controllers\annonceController::class, 'store'])->name('store');
Route::get('/affichage',[App\Http\Controllers\annonceController::class, 'index'])->name('affichage')->middleware('App\Http\Middleware\AnnonceMiddleware');
Route::delete('/delete/annonce/{id}',[App\Http\Controllers\annonceController::class, 'delete'])->name('annonce.delete');
Route::put('/edit/annonce/{id}',[App\Http\Controllers\annonceController::class, 'edit'])->name('annonce.edit');



// ************************************************************************************************

Route::get('/remove',[App\Http\Controllers\removeController::class, 'show'])->name('remove');
Route::delete('/delete/{id}',[App\Http\Controllers\removeController::class, 'delete'])->name('reservation.delete');




