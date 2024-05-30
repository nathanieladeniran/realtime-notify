<?php

use Illuminate\Support\Facades\Route;
use App\Events\UserRegistration;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/userRegistration', function () {
    return view('userRegistration');
});

Route::get('/userRegistration', function () {
    return view('userRegistration');
});

Route::get('/deposit', function () {
    return view('deposit');
});

Route::post('/userRegistration', function (Request $request) {
    
    $name = $request->name;
    event (new UserRegistration($name));
});
Route::post('/deposit', [App\Http\Controllers\DepositController::class,'deposit'])->name('deposit');
/*Route::get('event-test', function () {

    $pusher = new Pusher\Pusher(
        env('PUSHER_APP_KEY'),
        env('PUSHER_APP_SECRET'),
        env('PUSHER_APP_ID'),
        array('cluster' => env('PUSHER_APP_CLUSTER'))
    );
    
    $pusher->trigger(
        'notify-channel',
        'user-register',
        'Welcome'
    );
    
    return "Event has been sent";
    });
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
