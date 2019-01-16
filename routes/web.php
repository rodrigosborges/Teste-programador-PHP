<?php

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
    $connection = pg_connect ("host=localhost dbname=testePHP user=postgres password=123");
    if($connection) {
       return 'connected';
    } else {
        return 'there has been an error connecting';
    } 
    return App\Consulta::all();
    return view('welcome');
});
