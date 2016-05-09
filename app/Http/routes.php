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

	// contoh
	Route::get('/contoh', 'SharedFacilitiesController@contoh');
	Route::get('/contoh/{tanggal}/{waktu}', 'SharedFacilitiesController@contoh2');
	Route::post('/addContoh/{tanggal}/{waktu}', 'SharedFacilitiesController@addContoh');
	Route::get('/sfAriq', 'SharedFacilitiesController@sfAriq');

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

	Route::get('/getReqForSupervisor', 'SelfServiceController@getReqForSupervisor');
	Route::get('/getReqForHR', 'SelfServiceController@getReqForHR');
	Route::get('/getReqForBU', 'SelfServiceController@getReqForBU');

	Route::get('/getLogReimbursement', 'SelfServiceController@getLogReimbursement');
	Route::get('/getLogPaidLeave', 'SelfServiceController@getLogPaidLeave');
	Route::get('/getLogOvertime', 'SelfServiceController@getLogOvertime');
	Route::get('/getLogPeminjaman', 'SharedFacilitiesController@getLogPeminjaman');

	Route::get('/getMyReimbursement', 'SelfServiceController@getMyReimbursement');
	Route::get('/getMyPaidLeave', 'SelfServiceController@getMyPaidLeave');
	Route::get('/getMyOvertime', 'SelfServiceController@getMyOvertime');

	Route::get('/getMyPeminjaman', 'SharedFacilitiesController@getMyPeminjaman');

	Route::get('/getMyOBService', 'OBServiceController@getMyOBService');


	// update
	Route::get('/update/{kodeSS}', 'SelfServiceController@update');
	Route::post('/update/{kodeSS}', 'SelfServiceController@updatePost');

	Route::get('/update/{kodeOBS}', 'OBServiceController@update');
	Route::post('/update/{kodeOBS}', 'OBServiceController@updatePost');

	// delete
	Route::get('/delete/{kodeSS}', 'SelfServiceController@delete');

	Route::get('/delete/{kodeOBS}', 'OBServiceController@delete');
	// approval
	Route::get('/myApproval', 'SelfServiceController@myApproval');
	Route::get('/approval/{kodeSS}', 'SelfServiceController@approval');

	// rejection
	Route::get('/rejection/{kodeSS}', 'SelfServiceController@rejection');
	Route::post('/rejection/{kodeSS}', 'SelfServiceController@rejectionPost');
});

Route::get('/generate/{isi}', function($isi) {return \Hash::make($isi);});
