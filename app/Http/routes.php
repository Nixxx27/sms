<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/





/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {


    Route::auth();

    Route::get('/', function(){
        return Redirect::to('login');
    });

    Route::get('home', 'PageController@home');


    //Items Controller
    Route::post('items/search','ItemsController@search');
    Route::get('items/print','ItemsController@print_all');
    Route::get('items/excel','ItemsController@export_excel');
    Route::get('items/{items}/reserve','ItemsController@reserve');
    Route::resource('items', 'ItemsController');

 
    //Description Controller
    Route::resource('desc', 'DescriptionController');

    //Category Controller
    Route::resource('category', 'CategoryController');

    //Borrow Controller
    Route::get('borrow/create/{borrow}','BorrowController@create');
    Route::get('borrow/lost/{borrow}','BorrowController@lost');
    Route::get('borrow/print','BorrowController@print_all');
    Route::get('borrow/print_borrow/{borrow}','BorrowController@print_borrow');
    Route::get('borrow/excel','BorrowController@export_excel');

    Route::get('borrow/excel_borrow/{borrow}','BorrowController@export_excel_borrow');
    Route::get('borrow/return/{borrow}','BorrowController@return_item');
    Route::resource('borrow', 'BorrowController');

    //Return Controller
    Route::get('return/print','ReturnController@print_all');
    Route::get('return/excel','ReturnController@export_excel');
    Route::resource('return', 'ReturnController');

    //Lost Controller
    Route::get('lost/print','LostController@print_all');
    Route::get('lost/excel','LostController@export_excel');
    Route::resource('lost', 'LostController');

    //Reserved Controller
    Route::get('reserve/print','ReserveController@print_all');
    Route::get('reserve/excel','ReserveController@export_excel');
    Route::resource('reserve', 'ReserveController');


    //Serial Controller
    Route::resource('serial', 'SerialController');

});
