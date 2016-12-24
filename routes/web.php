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
Route::post('receive',function(){
    $handler = new Handler();
    $message = $handler->sms()->receive()->getMessage();
    info($message);
    return $message;
});

Route::get('/send',function(){

    $handler = new Handler();
    $handler->sms()
        ->setServer("http://localhost:7000/sms/send")
        ->setApplication("APP_000001")
        ->setSecret("password")
        ->setMessage("Message")
        ->addSubscriber('tel:94773456789')
        ->addSubscriber('tel:94773452222')
        ->addSubscriber('tel:94773456799')
        ->send();


});
Auth::routes();

Route::get('/home', 'HomeController@index');
