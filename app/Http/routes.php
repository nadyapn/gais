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
Route::get('/', function() {return \Redirect::to('homepageGAIS');});

// Shared Facilities
	Route::get('/deleteFacilities', 'sharedFacilitiesController@deleteFacilities');
	Route::get('/createFacilities', 'sharedFacilitiesController@createFacilities');
	Route::get('/sFSpecialMenu', 'sharedFacilitiesController@sFSpecialMenu');
	Route::get('/addSharedFacilities', 'sharedFacilitiesController@addSharedFacilities');
	Route::get('/getLogSharedFacilities', 'sharedFacilitiesController@getLogSharedFacilities');
	Route::get('/getMySharedFacilities', 'sharedFacilitiesController@getMySharedFacilities');

	// Office Boy Service
	Route::get('/addOBServices', 'obServicesController@addOBServices');
	Route::get('/updateOBServices', 'obServicesController@updateOBServices');
	Route::get('/getLogAdminOBServices', 'obServicesController@getLogAdminOBServices');
	Route::get('/getLogOBServices', 'obServicesController@getLogOBServices');
	Route::get('/getTaskOBServices', 'obServicesController@getTaskOBServices');
	Route::get('/getMyOBServices', 'obServicesController@getMyOBServices');


Route::group(['middleware' => 'guest'], function(){
	// log in log out
	Route::get('/login','UserController@index');
	Route::post('/login','UserController@login');
});

Route::group(['middleware' => 'auth'], function(){
	Route::get('/homepageGAIS','UserController@homepageGAIS');
	Route::get('/logout', 'UserController@logout');


	// dashboard
	Route::get('/dashboardNonAdmin','UserController@dashboardNonAdmin');
	Route::get('/dashboardAdmin','UserController@dashboardAdmin');
	Route::get('/sidebarNonAdmin','UserController@sidebarNonAdmin');
	Route::get('/sidebarAdmin','UserController@sidebarAdmin');
	Route::get('/sidebarHomepage','UserController@sidebarHomepage');
	Route::get('/sidebarOB','UserController@sidebarOB');

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
	Route::get('/getDetailAdmin/{kodeSS}', 'SelfServiceController@getDetailAdmin');
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
	Route::get('/update/{kodeSS}', 'SelfServiceController@update');
	Route::post('/update/{kodeSS}', 'SelfServiceController@updatePost');

	// delete
	Route::get('/delete/{kodeSS}', 'SelfServiceController@delete');

	// approval
	Route::get('/myApproval', 'SelfServiceController@myApproval');
	Route::get('/approval/{kodeSS}', 'SelfServiceController@approval');
	Route::get('/rejection/{kodeSS}', 'SelfServiceController@rejection');




});

Route::get('/generate/{isi}', function($isi) {return \Hash::make($isi);});
