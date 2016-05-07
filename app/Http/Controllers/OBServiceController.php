<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class OBServiceController extends Controller
{
    // form ob service. return view form
    function formOBService() {
        $ob = \App\User::getOB();
        if (\Auth::user()->division != 'Office Boy') {
            return \View::make('observice/addOBService')->with(compact('ob'));
        }
        else {
            return \View::make('user/homepageGAIS');
        }
    }

    // ketika submit form. no return view
    function addOBService(Request $request) {
        $ob = \App\User::getOB();

        $obname = \Request::input('namaOB');
        $category = \Request::input('category');
        $batch = \Request::input('requestedTime');
        $detail = \Request::input('obDescription');

        $validator = \Validator::make($request->all(), [
            'namaOB' => 'required',
            'category' => 'required',
            'requestedTime' => 'required',
            'obDescription' => 'required',
        ]);

        if ($validator->fails()) {
            $in = \Request::all();
            $messages = $validator->errors();
            return \View::make('observice/addOBService')
                        ->with(compact('messages'))
                        ->with(compact('ob'))
                        ->with(compact('in'));
        }

        // cek database
        $obs = DB::table('observice')
            ->orderBy('created_at','desc')
            ->first();

        if ($obs == "") {
            $observice = new \App\OBService();
            $observice->kodeOBS = "1";
            $observice->detail = $detail;
            $observice->batch = $batch;
            $observice->category = $category;
            $observice->ob_id = $ob->id_employee->where('name','=', $namaOB);
            $observice->employee_id = \Auth::user()->id_employee;
        }
        else {
            $facility = new \App\Facilities();
            $temp = (string) $obs->kodeOBS;
            $temp2 = intval($temp) + 1;
            $observice->kodeOBS = $temp2;
            $observice->detail = $detail;
            $observice->batch = $batch;
            $observice->category = $category;
            $observice->ob_id = \App\User::getOB()->where('name','=',$obname)->value('id_employee');
            $observice->employee_id = \Auth::user()->id_employee;
        }

        if ($observice->save()) {
        	return \Redirect::to('/dashboardNonAdmin');
        }
    }

    // ketika ketik url. return view form ob service lagi
    function addOBServiceFbd() {
        $ob = \App\User::getOB();
        if (\Auth::user()->division != 'Office Boy') {
            return \View::make('observice/addOBService')->with(compact('ob'));
        }
        else {
            return \View::make('user/homepageGAIS');
        }
    }   

    // get detail ob service. return view get detail
    function getDetail($kodeOBS) {
        return \View::make('sharedfacilities/getDetail');
    }

    // get detail ob service untuk admin. return view get detail untuk admin
    function getDetailAdmin($kodeOBS) {
        return \View::make('sharedfacilities/getDetailAdmin');
    }

    // get log ob service. return viw list semua log
    function getLogOBService() {
        return \View::make('observice/getLogOBService');
    }

    // get history obs. return view semua history kita
    function getMyOBService() {
        return \View::make('observice/geMyOBService');
    }

    // update obs. return view form (mirip kayak create)
    function update($kodeOBS) {                                                                  
        return \View::make('observice/updateOBService');
    }

    // ketika submit obs. no return view
    function updatePost($kodeOBS, Request $request) {
        
    }

    // ketika cancel obs. no return view
    function delete($kodeOBS) {
        
    }

    
}
