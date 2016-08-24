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

Route::group(['middleware' => 'guest'], function(){
	// log in log out
	Route::get('/login','UserController@index');
	Route::post('/login', 'UserController@login');

	Route::get('/lalala','UserController@lalala');

	Route::get('/dologin','UserController@redirectToProvider');
	Route::get('/login/callback','UserController@handleProviderCallback');
});

Route::group(['middleware' => 'auth'], function(){
	Route::get('/homepageGAIS','UserController@homepageGAIS');
	Route::get('/logout', 'UserController@logout');


	// dashboard
	Route::get('/dashboardNonAdmin','UserController@dashboardNonAdmin');
	Route::get('/dashboardAdmin','UserController@dashboardAdmin');
	Route::get('/sidebarNonAdmin','UserController@sidebarNonAdmin');
	Route::get('/sidebarAdmin','UserController@sidebarAdmin');
	Route::get('/sidebarOB','UserController@sidebarOB');
	Route::get('/sidebarHomepage','UserController@sidebarHomepage');
	Route::get('/dashboardOB','UserController@dashboardOB');

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

	// Create Peminjaman
	Route::get('/createPeminjaman', 'SharedFacilitiesController@formSF');
	Route::post('/addSF', 'SharedFacilitiesController@addSF');
	Route::get('/addSF', 'SharedFacilitiesController@addSFFbd');

	Route::get('/formPeminjaman/{tanggal}/{waktu}', 'SharedFacilitiesController@formPeminjaman');
	Route::post('/addPeminjaman/{tanggal}/{waktu}', 'SharedFacilitiesController@addPeminjaman');

	Route::get('/peminjamanScheduler', 'SharedFacilitiesController@peminjamanScheduler');

	Route::get('/formWaitingList/{tanggal}/{waktu}', 'SharedFacilitiesController@formWaitingList');
	Route::post('/addWaitingList/{tanggal}/{waktu}', 'SharedFacilitiesController@addWaitingList');

	// Create Fasilitas
	Route::get('/sfSpecialMenu', 'SharedFacilitiesController@sfSpecialMenu');
	Route::get('/createFacility', 'SharedFacilitiesController@formFacility');
	Route::post('/addFacility', 'SharedFacilitiesController@addFacility');
	Route::get('/addFacility', 'SharedFacilitiesController@addFacilityFbd');

	// Create OB Service
	Route::get('/createOBService', 'OBServiceController@formOBService');
	Route::post('/addOBService', 'OBServiceController@addOBService');
	Route::get('/addOBService', 'OBServiceController@addOBService');

	// Read Detail
	Route::get('/getDetail/{kodeSS}', 'SelfServiceController@getDetail');
	Route::get('/getDetailAdmin/{kodeSS}', 'SelfServiceController@getDetailAdmin');
	Route::get('/getDetailPeminjaman/{kodePinjam}', 'SharedFacilitiesController@getDetail');
	Route::get('/getDetailAdminPeminjaman/{kodePinjam}', 'SharedFacilitiesController@getDetailAdmin');
	Route::get('/getDetailOBS/{kodeOBS}', 'OBServiceController@getDetail');
	Route::get('/getDetailAdminOBS/{kodeOBS}', 'OBServiceController@getDetailAdmin');

	Route::get('/getReqForSupervisor', 'SelfServiceController@getReqForSupervisor');
	Route::get('/getReqForHR', 'SelfServiceController@getReqForHR');
	Route::get('/getReqForBU', 'SelfServiceController@getReqForBU');

	Route::get('/getLogReimbursement', 'SelfServiceController@getLogReimbursement');
	Route::get('/getLogPaidLeave', 'SelfServiceController@getLogPaidLeave');
	Route::get('/getLogOvertime', 'SelfServiceController@getLogOvertime');
	Route::get('/getLogPeminjaman', 'SharedFacilitiesController@getLogPeminjaman');
	Route::get('/getLogOBService', 'OBServiceController@getLogOBService');

	Route::get('/getMyReimbursement', 'SelfServiceController@getMyReimbursement');
	Route::get('/getMyPaidLeave', 'SelfServiceController@getMyPaidLeave');
	Route::get('/getMyOvertime', 'SelfServiceController@getMyOvertime');
	Route::get('/getMyPeminjaman', 'SharedFacilitiesController@getMyPeminjaman');
	Route::get('/getMyOBService', 'OBServiceController@getMyOBService');

	Route::get('/getTaskOBServices', 'OBServiceController@getTaskOBServices');
	Route::get('/getAllTask', 'OBServiceController@getAllTask');

	// update
	Route::get('/update/{kodeSS}', 'SelfServiceController@update');
	Route::post('/update/{kodeSS}', 'SelfServiceController@updatePost');

	Route::get('/updateOBS/{kodeOBS}', 'OBServiceController@update');
	Route::post('/updateOBS/{kodeOBS}', 'OBServiceController@updatePost');

	// delete
	Route::get('/delete/{kodeSS}', 'SelfServiceController@delete');
	Route::get('/deletePeminjaman/{kodePinjam}', 'SharedFacilitiesController@delete');
	Route::get('/deleteFacility', 'SharedFacilitiesController@getAllFacilities');
	Route::get('/deleteFacility/{kode}', 'SharedFacilitiesController@deleteFacility');
	Route::get('/deleteOBS/{kodeOBS}', 'OBServiceController@delete');

	// approval
	Route::get('/myApproval', 'SelfServiceController@myApproval');
	Route::get('/approval/{kodeSS}', 'SelfServiceController@approval');

	Route::get('/approvalOBS/{kodeOBS}', 'OBServiceController@approvalOBS');
	Route::get('/finishOBS/{kodeOBS}', 'OBServiceController@finishOBS');
	

	// rejection
	Route::get('/rejection/{kodeSS}', 'SelfServiceController@rejection');
	Route::post('/rejection/{kodeSS}', 'SelfServiceController@rejectionPost');
	Route::get('/rejectionOBS/{kodeOBS}', 'OBServiceController@rejectionOBS');

	// lain-lain
	Route::get('/createOBService/{time}', 'OBServiceController@cekwaktu');
	Route::get('/updateOBService/{time}', 'OBServiceController@updateOBService');
	Route::get('/createReimbursement/{category}', 'SelfServiceController@cekproject');
	Route::get('/updateReimbursement/{category}', 'SelfServiceController@updateReimbursement');
});

Route::get('/generate/{isi}', function($isi) {return \Hash::make($isi);});
