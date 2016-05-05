<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use DB;

class sharedFacilitiesController extends Controller
{
    //halaman depan shared facilities special menu (create and delete facility)
    function sFSpecialMenu() {
        return \View::make('sharedFacilities/sFSpecialMenu');
	  }
    //bikin request shared Facilities
    function addSharedFacilities() {
        return \View::make('sharedFacilities/addSharedFacilities');
    }
    //menambahkan ruangan
    function createFacilities() {
        return \View::make('sharedFacilities/createFacilities');
    }
    //admin lihat log
    function getLogSharedFacilities() {
        return \View::make('sharedFacilities/getLogSharedFacilities');
    }
    //menghapus ruangan
    function deleteFacilities() {
        return \View::make('sharedFacilities/deleteFacilities');
    }
    //melihat request/history shared facilities Non OB
    function getMySharedFacilities() {
        return \View::make('sharedFacilities/getMySharedFacilities');
    }
}
