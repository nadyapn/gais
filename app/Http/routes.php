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

// Create Reimbursement
Route::get('/formReimbursement', 'SelfServiceController@formReimbursement');
Route::post('/addReimbursement', 'SelfServiceController@addReimbursement');
Route::get('/addReimbursement', 'SelfServiceController@addReimbursementFbd');

// Create Paid Leave
Route::get('/formPaidLeave', 'SelfServiceController@formPaidLeave');
Route::post('/addPaidLeave', 'SelfServiceController@addPaidLeave');
Route::get('/addPaidLeave', 'SelfServiceController@addPaidLeaveFbd');

// Create Overtime
Route::get('/formOvertime', 'SelfServiceController@formOvertime');
Route::post('/addOvertime', 'SelfServiceController@addOvertime');
Route::get('/addOvertime', 'SelfServiceController@addOvertimeFbd');

// Read Detail
Route::get('/getDetail/{selfservice_id}', 'SelfServiceController@getDetail');
Route::get('/getReqForSupervisor', 'SelfServiceController@getReqForSupervisor');
Route::get('/getReqForHR', 'SelfServiceController@getReqForHR');
Route::get('/getReqForBU', 'SelfServiceController@getReqForBU');
Route::get('/getLogReimbursement', 'SelfServiceController@getLogReimbursement');
Route::get('/getLogPaidLeave', 'SelfServiceController@getLogPaidLeave');
Route::get('/getLogOvertime', 'SelfServiceController@getLogOvertime');
Route::get('/getMyReimbursement', 'SelfServiceController@getMyReimbursement');
Route::get('/getMyPaidLeave', 'SelfServiceController@getMyPaidLeave');
Route::get('/getMyOvertime', 'SelfServiceController@getMyOvertime');