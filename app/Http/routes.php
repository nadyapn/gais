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

/**Route::get('/', function () {
    return view('welcome');
}); */

// log in 
Route::get('/', 'UserController@login');
Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@isLogin');

Route::get('/homepageGAIS','UserController@homepageGAIS');

// log out
Route::get('/logout', 'UserController@logout');

// dashboard
Route::get('/dashboardNonAdmin','UserController@dashboardNonAdmin');
Route::get('/dashboardAdmin','UserController@dashboardAdmin');


// Create Reimbursement
Route::get('/createReimbursement', 'SelfServiceController@formReimbursement');
Route::post('/addReimbursement', 'SelfServiceController@addReimbursement');
Route::get('/addReimbursement', 'SelfServiceController@addReimbursementFbd');

// Create Paid Leave
Route::get('/createPaidLeave', 'SelfServiceController@formPaidLeave');
Route::post('/addPaidLeave', 'SelfServiceController@addPaidLeave');
Route::get('/addPaidLeave', 'SelfServiceController@addPaidLeaveFbd');

// Create Overtime
Route::get('/createOvertime', 'SelfServiceController@formOvertime');
Route::post('/addOvertime', 'SelfServiceController@addOvertime');
Route::get('/addOvertime', 'SelfServiceController@addOvertimeFbd');

// Read Detail
Route::get('/getDetail/{kodeSS}', 'SelfServiceController@getDetail');
Route::get('/getDetailTemplate', 'SelfServiceController@getDetailTemplate');
Route::get('/getReqForSupervisor', 'SelfServiceController@getReqForSupervisor');
Route::get('/getReqForHR', 'SelfServiceController@getReqForHR');
Route::get('/getReqForBU', 'SelfServiceController@getReqForBU');
Route::get('/getLogReimbursement', 'SelfServiceController@getLogReimbursement');
Route::get('/getLogPaidLeave', 'SelfServiceController@getLogPaidLeave');
Route::get('/getLogOvertime', 'SelfServiceController@getLogOvertime');
Route::get('/getMyReimbursement', 'SelfServiceController@getMyReimbursement');
Route::get('/getMyPaidLeave', 'SelfServiceController@getMyPaidLeave');
Route::get('/getMyOvertime', 'SelfServiceController@getMyOvertime');

// update
Route::get('/updateReimbursement/{kodeSS}', 'SelfServiceController@updateReimbursement');
Route::post('/updateReimbursement/{kodeSS}', 'SelfServiceController@updateReimbursementPost');
