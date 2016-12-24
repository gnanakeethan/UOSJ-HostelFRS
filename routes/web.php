<?php

use Joomtriggers\Ideamart\Handler;

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
Route::post('receive', function () {
    $handler = new Handler();
    $message = $handler->sms()->receive()->getMessage();
    info($message);

    return $message;
});
//Route::any('hooked', function () {
//    info(\Illuminate\Support\Facades\Request::all());
//    return \Illuminate\Support\Facades\Request::get('hub_challenge');
//});
Route::get('info',function(){phpinfo();});
Route::get('pp',function(){
   return 'The Information We Collect is limited to very few people who are bound confidentially to accept them. We will not use any information for any other purpose than to order and provision meals ' ;
});

Route::get('/send', function () {
    $users = \App\User::all();
    \Illuminate\Support\Facades\Notification::send($users, new \App\Notifications\RequestAccepted());
});
Auth::routes();

Route::get('/home', 'HomeController@index');
