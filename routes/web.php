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
use Illuminate\Support\Facades\Log;

Route::group(['middleware' => ['cors','auth']],function(){
    Route::get('/clients', 'ClientController@index')->name('clients'); //->middleware('auth')
    Route::get('/clients/new', 'ClientController@newClient')->name('new_client');
    Route::post('/clients/new', 'ClientController@newClient')->name('create_client');
    Route::get('/clients/{client_id}', 'ClientController@show')->name('show_client');
    Route::post('/clients/{client_id}', 'ClientController@modifyClient')->name('update_client');
    Route::get('/reservations/{client_id}', 'RoomsController@checkAvailableRooms')->name('check_room');
    Route::post('/reservations/{client_id}', 'RoomsController@checkAvailableRooms')->name('check_room');
    Route::get('/book/room/{client_id}/{room_id}/{date_in}/{date_out}', 'ReservationsController@bookRoom')->name('book_room');
    Route::get('export','ClientController@export');
    Route::get('upload','ContentsController@upload')->name('upload');
    Route::post('upload','ContentsController@upload')->name('upload');
});






Route::get('/', 'ContentsController@home')->name('home');

Route::get('/about', function () {
    $response_arr = [];
    $response_arr['author'] = 'BP';
    $response_arr['version'] = '0.1.1';
    return $response_arr;
    //return '<h3>About</h3>';
})->middleware('cors');

Route::get('/home', function () {
    $data = [];
    $data['version'] = '0.1.1';
    return view('welcome', $data);
});

Route::get('/di', 'ClientController@di');

Auth::routes();


Route::group(['middleware'=>'cors'],function(){
    $routeCollection = Route::getRoutes();
    foreach ($routeCollection as $value) {
        $uri_path = $value->uri();
        $action = $value->getActionName();
        $action_path = class_basename($action);
        if($action_path != 'Closure'){
            Route::options($uri_path,$action_path);
        }
    }
});

