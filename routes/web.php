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

// admin section if ($request()->user() && request()->user()->isAdmin())

Route::prefix('sup')->middleware('auth','isAdmin')->group(function(){
    
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('AdminInt');
    
 
});

// Route::middleware(['first', 'second'])->group(function () {
//     Route::get('/', function () {
//         return view('admin');

//     });
// });




// Route::prefix('client')->middleware('auth','isClient')->group(function(){
//     // Route::get('/admin',[AdminController::class,'admin'])-> name('adminInt');
//     Route::get('/gerer', [App\Http\Controllers\ClientController::class, 'index'])->name('gerer');
//     Route::get('/dispo', [App\Http\Controllers\ClientController::class, 'dispo'])->name('dispo');
//     Route::get('/pdf', [App\Http\Controllers\ClientController::class, 'pdf'])->name('pdf');



// });
// Route::resource('admin',AdminController::class)->except([
//     'gerer','dispo'
// ])->middlware('auth');




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


// Route::get('/admin', function () {
//     return view('admin');
// })->name('admin');
Route::get('/planning', function () {
    return view('planning');
})->name('planning');

Route::get('/admin', function () {
    return view('admin');
})->name('admin');



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




// ************* ajout****************
Route::get('/add', [App\Http\Controllers\addController::class, 'index'])->name('add');
// Route::post('/add', function () {
//     return view('add');
// });
Route::post('ajouter', [App\Http\Controllers\addController::class, 'ajouter'])->name('ajouter');



