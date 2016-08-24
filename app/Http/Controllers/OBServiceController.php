<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use DB;

class OBServiceController extends Controller
{
    // form ob service. return view form
    function formOBService() {
        $ob = \App\User::getOB(null);
       
        if (\Auth::user()->division != 'Office Boy') {
            return \View::make('observice/addOBService')->with(compact('ob'));
        }
        else {
            return \View::make('user/homepageGAIS');
        }
    }

    // ketika submit form. no return view
    function addOBService(Request $request) {
        $obname = \Request::input('namaOB');
        $category = \Request::input('category');
        $batch = \Request::input('requestedTime');
        $detail = \Request::input('obDescription');

        $ob = \App\User::getOB(null);
        $ob_id = \App\User::getOB($obname);

        date_default_timezone_set("Asia/Jakarta");
        $mydate = date('Y-m-d H:i:s'); //Returns IST
        $time = date('H:i');

        $jamskrg = substr($time, 0, 2);
        $jambatch = substr($batch, 0, 2);

        $menitskrg = substr($time, 3, 2);
        $menitbatch = substr($batch, 3, 2);

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
        else if (($jambatch < $jamskrg) || ($jambatch == $jamskrg && $menitbatch < $menitskrg)) {
            $in = \Request::all();
            $salahjam = "Choose another batch";
            $messages = $validator->errors();
            return \View::make('observice/addOBService')
                        ->with(compact('messages'))
                        ->with(compact('salahjam'))
                        ->with(compact('ob'))
                        ->with(compact('in'));
        }
        else if (\App\OBService::isOBNotAvailabe($batch, $category, $ob_id)) {
            $in = \Request::all();
            $gantiob = "Category request for this OB is full. Choose other OB or category";
            $messages = $validator->errors();
            return \View::make('observice/addOBService')
                        ->with(compact('messages'))
                        ->with(compact('gantiob'))
                        ->with(compact('ob'))
                        ->with(compact('in'));
        }

        // cek database
        $obs = DB::table('observice')
            ->orderBy('created_at','desc')
            ->first();

        if ($obs == "") { // ketika form kosong
            $observice = new \App\OBService();
            $observice->kodeOBS = "1";
            $observice->date = $mydate;
            $observice->detail = $detail;
            $observice->batch = $batch;
            $observice->category = $category;
            $observice->ob_id = $ob_id;
            $observice->employee_id = \Auth::user()->id_employee;

        }
        else { // ketika form tidak kosong
            $observice = new \App\OBService();
            $temp = $obs->kodeOBS;
            $temp2 = $temp + 1;
            $observice->kodeOBS = $temp2;
            $observice->date = $mydate;
            $observice->detail = $detail;
            $observice->batch = $batch;
            $observice->category = $category;
            $observice->ob_id = $ob_id;
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
        $obs = \App\OBService::getDetailOBS($kodeOBS);
        $em_name = DB::table('employee')
            ->join('observice','id_employee','=','employee_id')
            ->where('kodeOBS','=',$kodeOBS)
            ->first();
        $ob_name = DB::table('employee')
            ->join('observice','id_employee','=','ob_id')
            ->where('kodeOBS','=',$kodeOBS)
            ->first();
        return \View::make('observice/getDetail')->with(compact('obs'))->with(compact('em_name'))->with(compact('ob_name'));
    }

    // get detail ob service untuk admin. return view get detail untuk admin
    function getDetailAdmin($kodeOBS) {
        $obs = \App\OBService::getDetailOBS($kodeOBS);
        $em_name = DB::table('employee')
            ->join('observice','id_employee','=','employee_id')
            ->where('kodeOBS','=',$kodeOBS)
            ->first();
        $ob_name = DB::table('employee')
            ->join('observice','id_employee','=','ob_id')
            ->where('kodeOBS','=',$kodeOBS)
            ->first();
        return \View::make('observice/getDetail')->with(compact('obs'))->with(compact('em_name'))->with(compact('ob_name'));
    }

    // get log ob service. return view list semua log
    function getLogOBService() {
        $obs = \App\OBService::getLogOBService();
        return \View::make('observice/getLogOBService')->with(compact('obs'));
    }

    function getMyOBService() {
        $obs = \App\OBService::getMyOBService();
        return \View::make('observice/getMyOBService')->with(compact('obs'));
    }

    function update($kodeOBS) {
        $ob = \App\User::getOB(null);
        $obs = \App\OBService::getDetailOBS($kodeOBS);
       
        if (\Auth::user()->division != 'Office Boy') {
            return \View::make('observice/update')->with(compact('ob'))->with(compact('obs'));
        }
        else {
            return \View::make('user/homepageGAIS');
        }
    }

    function updatePost($kodeOBS, Request $request) {
        $obname = \Request::input('namaOB');
        $category = \Request::input('category');
        $batch = \Request::input('requestedTime');
        $detail = \Request::input('obDescription');

        $ob = \App\User::getOB(null);
        $ob_id = \App\User::getOB($obname);
        $obs = \App\OBService::where("kodeOBS","=", $kodeOBS)->where('status','=',0)->first();

        date_default_timezone_set("Asia/Jakarta");
        $mydate = date('Y-m-d H:i:s'); //Returns IST
        $time = date('H:i');

        $jamskrg = substr($time, 0, 2);
        $jambatch = substr($batch, 0, 2);

        $menitskrg = substr($time, 3, 2);
        $menitbatch = substr($batch, 3, 2);

        $validator = \Validator::make($request->all(), [
            'namaOB' => 'required',
            'category' => 'required',
            'requestedTime' => 'required',
            'obDescription' => 'required',
        ]);

        if ($validator->fails()) {
            $in = \Request::all();
            $messages = $validator->errors();
            return \View::make('observice/update')
                        ->with(compact('messages'))
                        ->with(compact('ob'))
                        ->with(compact('obs'))
                        ->with(compact('in'));
        } 
        else if (($jambatch < $jamskrg) || ($jambatch == $jamskrg && $menitbatch < $menitskrg)) {
            $in = \Request::all();
            $salahjam = "Choose another batch";
            $messages = $validator->errors();
            return \View::make('observice/update')
                        ->with(compact('messages'))
                        ->with(compact('salahjam'))
                        ->with(compact('ob'))
                        ->with(compact('obs'))
                        ->with(compact('in'));
        }
        else if (\App\OBService::isOBNotAvailabe($batch, $category, $ob_id)) {
            $in = \Request::all();
            $gantiob = "Category request for this OB is full. Choose other OB or category";
            $messages = $validator->errors();
            return \View::make('observice/update')
                        ->with(compact('messages'))
                        ->with(compact('gantiob'))
                        ->with(compact('ob'))
                        ->with(compact('obs'))
                        ->with(compact('in'));
        }

        $obs->date = $mydate;
        $obs->detail = $detail;
        $obs->batch = $batch;
        $obs->category = $category;
        $obs->ob_id = $ob_id;

        if ($obs->save()) {
            return \Redirect::to('/dashboardNonAdmin');
        }
    }

    // ketika cancel obs. no return view
    function delete($kodeOBS) {
        $obs = \App\OBService::where("kodeOBS","=", $kodeOBS)->where('status','=',0)->first();
        if (\Auth::user()->id_employee != $obs->employee_id) {
            return \View::make('errors/401');
        }
        if ($obs != "") {
            $obs->status = -1;
            $obs->save();
            if($obs->save()) {
                return \Redirect::to('/dashboardNonAdmin');
            }
        }
    }

    // cek ob available apa ngga
    function cekwaktu($time) {
        $listob = \App\User::where('division','=','Office Boy')->get();
        $obs = \App\OBService::where('batch','!=',$time)->get();
        $counter = 0;
        
        $return = '<select name="namaOB" class="form-control">';
        foreach ($listob as $e) {
            //$temp = true;
            foreach ($obs as $f) {
                if ($e->id_employee == $f->employee_id) {
                    $temp = false;
                    $counter++;
                }        
            }    

            if ($counter <5) {
                $option = '<option value="'. $e->name .'">' . $e->name . '</option>';
            
                $return .= $option;
            }
        }

        $return .= '</select>';

        return $return;
    }

    // cek ob available apa ngga
    function updateOBService($time) {
        $listob = \App\User::where('division','=','Office Boy')->get();
        $obs = \App\OBService::where('batch','!=',$time)->get();
        $counter = 0;
        // dd($listob);
        $return = '<select name="namaOB" class="form-control">';
        foreach ($listob as $e) {
            //$temp = true;
            foreach ($obs as $f) {
                if ($e->id_employee == $f->employee_id) {
                    $temp = false;
                    $counter++;
                }        
            }    

            if ($counter <5) {
                $option = '<option value="'. $e->name .'">' . $e->name . '</option>';
            // dd($option);
            $return .= $option;
            }
        }

        $return .= '</select>';

        return $return;
    }

    function getTaskOBServices() {
        if (\Auth::user()->division != 'Office Boy') {
            return \View::make('errors/401');
        }

        $task = DB::table('observice')
                ->join('employee','id_employee','=','employee_id')
                ->where('ob_id','=',\Auth::user()->id_employee)
                ->where('status','=',0)
                ->get();
        return \View::make('observice/getTaskOBServices')->with(compact('task'));
    }

    function getAllTask() {
        if (\Auth::user()->division != 'Office Boy') {
            return \View::make('errors/401');
        }

        $task = DB::table('observice')
                ->join('employee','id_employee','=','employee_id')
                ->where('ob_id','=',\Auth::user()->id_employee)
                ->where('status','=',1)
                ->get();
        return \View::make('observice/getAllTask')->with(compact('task'));
    }

    function approvalOBS($kodeOBS) {
        $obs =\App\OBService::where("kodeOBS", "=", $kodeOBS)->where('status','>=','0')->first();
        
        if (\Auth::user()->id_employee != $obs->ob_id) {
            return \View::make('errors/401');
        }

        if ($obs != "") {
            $obs->status = 1;
            //$obs->save();
            if ($obs->save()) {
                return \Redirect::to('/getTaskOBServices');
            }
        } 
    }

    function rejectionOBS($kodeOBS) {
        $obs =\App\OBService::where("kodeOBS", "=", $kodeOBS)->where('status','>=','0')->first();
        if (\Auth::user()->id_employee != $obs->ob_id) {
            return \View::make('errors/401');
        }

         if ($obs != "") {
            $obs->status = 2;
            $obs->save();
            if ($obs->save()) {
                return \Redirect::to('/getTaskOBServices');
            }
        } 
    }

    function finishOBS($kodeOBS) {
        $obs =\App\OBService::where("kodeOBS", "=", $kodeOBS)->where('status','=','1')->first();
        if (\Auth::user()->id_employee != $obs->ob_id) {
            return \View::make('errors/401');
        }
        
        if ($obs != "") {
            $obs->status = 3;
            //$obs->save();
            if ($obs->save()) {
                return \Redirect::to('/getTaskOBServices');
            }
        } 
    }
}
