<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use DB;

class obServicesController extends Controller
{

    //bikin request OB
    function addOBServices() {
        return \View::make('obServices/addOBServices');
    }
    //bikin update OB
    function updateOBServices() {
        return \View::make('obServices/updateOBServices');
    }
    //admin lihat log
    function getLogAdminOBServices() {
        return \View::make('obServices/getLogAdminOBServices');
    }
    //OB lihat log (mau accept request atau ngga)
    function getLogOBServices() {
        return \View::make('obServices/getLogOBServices');
    }
    //OB lihat task (request udah selesai atau belum)
    function getTaskOBServices() {
        return \View::make('obServices/getTaskOBServices');
    }
    //Non OB lihat history request OB Services
    function getMyOBServices() {
        return \View::make('obServices/getMyOBServices');
    }
}
