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

// Reimbursement
Route::get('/formReimbursement', 'SelfServiceController@formReimbursement');
Route::post('/addReimbursement', 'SelfServiceController@addReimbursement');
Route::get('/addReimbursement', 'SelfServiceController@addReimbursementFbd');

// Paid Leave
Route::get('/formPaidLeave', 'SelfServiceController@formPaidLeave');

// Overtime
Route::get('/formOvertime', 'SelfServiceController@formOvertime');

// Detail
Route::get('/getDetail/{selfservice_id}', 'SelfServiceController@getDetail');
