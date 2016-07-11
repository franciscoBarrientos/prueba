<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('tenders_tester', function() {
   echo "Aquí se mostrarán las licitaciones";
});

Route::get('test/{name?}', function($name = "Sin dato") {
   echo "El nombre es ".$name;
});

/*
Route::get('test_array/', [
    'as' => 'names',
    'uses' => 'TendeController@index'
]);


Route::group('test_array/', [
    'as' => 'names',
    'uses' => 'TendeController@index'
]);
*/

//prueba
//Route::get('tender/{id?}', 'TenderController@show');
Route::get('tender', 'TenderController@index');