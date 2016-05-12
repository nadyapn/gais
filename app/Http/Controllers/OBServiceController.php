<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;
// ini comment rahma
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
            ->orderBy('created_at','detail')
            ->first();


        if ($obs == "") { // ketika form kosong
            $observice = new \App\OBService();
            $observice->kodeOBS = "1";
            $observice->detail = $detail;
            echo $detail;
            $observice->batch = $batch;
            echo $batch;
            $observice->category = $category;
            echo $category;
            //dibawah ini masih error, ngecek nama ob yg dipilih itu ada di database apa enggak
            $query = DB::table('employee')
                ->where('division','=','Office Boy')
                ->where('name', $obname)
                ->first();
            $observice->ob_id = $query->id_employee;
            $observice->employee_id = \Auth::user()->id_employee;

        }
        else { // ketika form tidak kosong
          $observice = new \App\OBService();
            //$facility = new \App\Facilities();
            $temp = $obs->kodeOBS;
            $temp2 = $temp + 1;
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
      $obsr = \App\OBService::getMyObService();

        return \View::make('observice/getMyOBService')->with(compact('obsr'));
    }

    // update obs. return view form (mirip kayak create)
    // function update($kodeOBS) {
    //     return \View::make('observice/updateOBService');
    // }
    function update($kodeOBS) {
        $ob = \App\OBService::where("ob_id", "=", $kodeOBS)->count();

            if ($ob->employee_id == \Auth::user()->id_employee) {
                if ($ob > 0) {
                    $ob = \App\Reimbursement::where("ob_id", "=", $kodeOBS)->first();
                    $id_employee = $ob->employee_id;
                    if($id_employee = \Auth::user()->id_employee) {
                        return \View::make('observice/updateOBService');
                    }
                    else {
                        return \View::make('user/dashboardNonAdmin'); //harusnya dashboard non admin
                    }
                }
            }
        }
    // ketika submit obs. no return view
    // function updatePost($kodeOBS, Request $request) {
    //
    //
    // }

    function updatePost($kodeOBS, Request $request) {
        $ob = \App\OBService::where("kodeOBS","=", $kodeOBS)->first();

        date_default_timezone_set("Asia/Jakarta");
        $mydate = date('Y-m-d H:i:s'); //Returns IST

        if ($ob != "") {
            $namaOB = \Request::input('namaOB');
            $category = \Request::input('category');
            $requestedTime = \Request::input('requestedTime');
            $obDescription = \Request::input('obDescription');

            $validator = \Validator::make($request->all(), [
                'namaOB' => 'required',
                'category' => 'required',
                'requestedTime ' => 'required',
                'obDescription' => 'required',

            ]);

            if ($validator->fails()) {
                $in = \Request::all();
                $messages = $validator->errors();
                return \View::make('observice/addOBService')
                            ->with(compact('ob'));
            }

           # $ss->description = $description;
           # $ss->request_date = $mydate;
           # $ss->approval_date = $mydate;

           # $rm->business_purpose = $businesspurpose;
           # $rm->category = $category;
           # $rm->date = $date;
           # $rm->cost = $cost;
           # $rm->payment = 0;


            $ob->namaOB = $namaOB;
            $ob->category = $category;
            $ob->requestedTime = $requestedTime;
            $ob->obDescription = $obDescription;

            $ob->save();

            //$kodeOBS = DB::table('observice')->where('request_date', $mydate)->value('kodeSS');


            if($ob->save()) {
              return \Redirect::to('/dashboardNonAdmin');
            }
        }
    }

    // ketika cancel obs. no return view
    function delete($kodeOBS) {
      $ob = \App\OBService::where("ob_id", "=", $kodeOBS)->first();

        if ($ob != "") {
            $ob->status = -1; //status -1 itu belom disetujui
            $ob->save();
            if($ob->save()) {
                if ($ob->save()) {
                    return \Redirect::to('/getMyOBService');
                }
            }
        }
    }


}
