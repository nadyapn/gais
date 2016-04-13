<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use DB;

class SelfServiceController extends Controller
{
    // reimbursement
    function formReimbursement() {
    	return \View::make('selfservice/addReimbursement');
    }

    function addReimbursement() {
        $businesspurpose = \Request::input('businesspurpose');
    	$category = \Request::input('category');
    	$date = \Request::input('dateRem');
    	$description = \Request::input('descriptionRem');
    	$cost = \Request::input('cost'); 
    	
        $selfservice = new \App\SelfService();
        $selfservice->description = $description;
        $mydate = Carbon::now();
        $selfservice->request_date = $mydate;
        $selfservice->approval_date = $mydate;
        $selfservice->status = 0;
        $selfservice->employee_id = '12345'; // harusnya diganti session

    	$reimbursement = new \App\Reimbursement();
    	$reimbursement->business_purpose = $businesspurpose;
    	$reimbursement->category = $category;
    	$reimbursement->date = $date;
        $reimbursement->cost = $cost;
        $reimbursement->payment = 0;

        $selfservice->save();
        $kodeSS = DB::table('selfservice')->where('request_date', $mydate)->value('kodeSS');

        if (\Request::hasFile('foto')) {
            if (\Request::file('foto')->isValid()) {
                $extension = \Request::file('foto')->getClientOriginalExtension();
                $foto = $kodeSS.".".$extension;

                \Request::file('foto')->move('./foto', $foto);
                //\Request::file('logo')->move(base_path().'/logo', $logo);

                $reimbursement->photo = $foto;
            }
        }
        
        if($selfservice->save()) {
            $reimbursement->selfservice_id = $kodeSS;
            if ($reimbursement->save()) {
                return "berhasil";
            }
        }
        
    }

    function addReimbursementFbd() {
        return "Forbidden";
    }

    // paid leave
    function formPaidLeave() {
        return \View::make('selfservice/addPaidLeave');
    }

    function addPaidLeave() {
        $datehired = \Request::input('datehired');
        $periodofleave = \Request::input('periodofleave');
        $category = \Request::input('category');
        $description = \Request::input('rsnofleave');
        
        $selfservice = new \App\SelfService();
        $selfservice->description = $description;
        $mydate = Carbon::now();
        $selfservice->request_date = $mydate;
        $selfservice->approval_date = $mydate;
        $selfservice->status = 0;
        $selfservice->employee_id = '12345'; // harusnya diganti session
 
        $paidLeave = new \App\PaidLeave();
        $paidLeave->date_hired = $datehired;
        $paidLeave->category = $category;
        $paidLeave->period_of_leave = $periodofleave;

        $selfservice->save();
        $kodeSS = DB::table('selfservice')->where('request_date', $mydate)->value('kodeSS');
        
        if($selfservice->save()) {
            $paidLeave->selfservice_id = $kodeSS;
            if ($paidLeave->save()) {
                return "berhasil";
            }
        }
        
    }

    function addPaidLeaveFbd() {
        return "Forbidden";
    }

    // overtime
    function formOvertime() {
        return \View::make('selfservice/addOvertime');
    }

    function addOvertime() {
        $dateot = \Request::input('dateot');
        $timestarts = \Request::input('timestarts');
        $timeends = \Request::input('timeends');
        $description = \Request::input('rsnofot');
        
        $selfservice = new \App\SelfService();
        $selfservice->description = $description;
        $mydate = Carbon::now();
        $selfservice->request_date = $mydate;
        $selfservice->approval_date = $mydate;
        $selfservice->status = 0;
        $selfservice->employee_id = '12345'; // harusnya diganti session

        $overtime = new \App\Overtime();
        $overtime->date = $dateot;
        $overtime->time_start = $timestarts;
        $overtime->time_end = $timeends;

        $selfservice->save();
        $kodeSS = DB::table('selfservice')->where('request_date', $mydate)->value('kodeSS');
        
        if($selfservice->save()) {
            $overtime->selfservice_id = $kodeSS;
            if ($overtime->save()) {
                return "berhasil";
            }
        }
        
    }

    function addOvertimeFbd() {
        return "Forbidden";
    }

    // get detail
    function getDetail($kodeSS) {
        $ss = \App\SelfService::where("kodeSS", "=", $kodeSS)->first();
        $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->first();
        $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->first();
        $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->first();

        if($ss == "") return "not found";

        return \View::make('selfservice/getDetail')->with(compact('ss'))->with(compact('rm'))->with(compact('ot'))->with(compact('pl'));
    }

    // coba doang
    function getDetailTemplate() {
        return \View::make('selfservice/getDetailTemplate');
    }

    // get detail for supervisor (self service)
    function getReqForSupervisor() {
        $ss = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->where('supervisor','6789')
            ->where('status','0')
            ->get();

        if($ss == "") return "not found";

        //$array = array();
        //array_push()
        //$x = 0;

        foreach ($ss as $e) {
            $kodeSS = $e->kodeSS;
            $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->count();
            $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->count();
            $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->count();
            if ($rm > 0) {
                $e->tipe = "Reimbursement";
               // $array = array_push($array, $tipe); 
                //$x = $x + 1;
                // return $rm;  
            }
            else if ($pl > 0) {
                $e->tipe = "PaidLeave";
                //$array = array_push($array, $tipe); 
               // $x = $x + 1;
               // return $pl; 
            }
            else if ($ot > 0) {
                $e->tipe = "Overtime";
                //$array = array_push($array, $tipe); 
               // $x = $x + 1;
                // return $ot; 
            } 
            else
            {
                //default case. should never went here
                $e->tipe = "Error : " . $rm . " " . $pl . " " . $ot;
                //$x = $x + 1;
            }
        }

        // dd($ss);
        //return $ss;
        return \View::make('selfservice/getReqForSupervisor')->with(compact('ss'));
    }

    // get detail for HR (paid leave)

    function getReqForHR() {
        $pl = DB::table('paidLeave')
            ->join('selfservice', 'paidLeave.selfservice_id', '=', 'selfservice.kodeSS')
            ->where('status',1)
            ->get();

        //return $pl;
        return \View::make('selfservice/getReqForHR')->with(compact('pl'));
    }

    function getReqForBU() {
        $first = DB::table('reimbursement')
            ->join('selfservice','reimbursement.selfservice_id','=','selfservice.kodeSS')
            ->select('kodeSS','status')
            ->where('status',1);
        $ss = DB::table('overtime')
            ->join('selfservice','overtime.selfservice_id','=','selfservice.kodeSS')
            ->select('kodeSS','status')
            ->where('status',1)
            ->union($first)
            ->get();


        // dd($ss);
        //return $ss;
        return \View::make('selfservice/getReqForBU')->with(compact('ss'));
    }

    function getLogReimbursement() {
        $rm = DB::table('reimbursement')
            ->join('selfservice','reimbursement.selfservice_id','=','selfservice.kodeSS')
            ->join('employee','selfservice.employee_id','=','employee.id_employee')
            ->get();

        return \View::make('selfservice/getLogReimbursement')->with(compact('rm'));
    }

    function getLogPaidLeave() {
        $pl = DB::table('paidLeave')
            ->join('selfservice','paidLeave.selfservice_id','=','selfservice.kodeSS')
            ->join('employee','selfservice.employee_id','=','employee.id_employee')
            ->get();

        return \View::make('selfservice/getLogPaidLeave')->with(compact('pl'));
    }

    function getLogOvertime() {
        $ot = DB::table('overtime')
            ->join('selfservice','overtime.selfservice_id','=','selfservice.kodeSS')
            ->join('employee','selfservice.employee_id','=','employee.id_employee')
            ->get();

        return \View::make('selfservice/getLogOvertime')->with(compact('ot'));
    }

    function getMyReimbursement() {
        $id_employee = '12345'; //harusnya session
        $rm = DB::table('reimbursement')
            ->join('selfservice','reimbursement.selfservice_id','=','selfservice.kodeSS')
            ->join('employee','selfservice.employee_id','=','employee.id_employee')
            ->where('id_employee',$id_employee)
            ->where('status','>=','0')
            ->get();

        return \View::make('selfservice/getMyReimbursement')->with(compact('rm'));
    }

    function getMyPaidLeave() {
        $id_employee = '12345'; //harusnya session
        $pl = DB::table('paidLeave')
            ->join('selfservice','paidLeave.selfservice_id','=','selfservice.kodeSS')
            ->join('employee','selfservice.employee_id','=','employee.id_employee')
            ->where('id_employee',$id_employee)
            ->where('status','>=','0')
            ->get();

        return \View::make('selfservice/getMyPaidLeave')->with(compact('pl'));
    }

    function getMyOvertime() {
        $id_employee = '12345'; //harusnya session
        $ot = DB::table('overtime')
            ->join('selfservice','overtime.selfservice_id','=','selfservice.kodeSS')
            ->join('employee','selfservice.employee_id','=','employee.id_employee')
            ->where('id_employee',$id_employee)
            ->where('status','>=','0')
            ->get();

        return \View::make('selfservice/getMyOvertime')->with(compact('ot'));
    }

    function updateReimbursement($kodeSS) {
        $selfservice = \App\SelfService::where('kodeSS',$kodeSS)->first();
        $reimbursement = \App\Reimbursement::where('selfservice_id',$kodeSS)->first();
        return \View::make('selfservice/updateReimbursement')->with(compact('selfservice'))->with(compact('reimbursement'));
    }

    function updateReimbursementPost($kodeSS) {
        $businesspurpose = \Request::input('businesspurpose');
        $category = \Request::input('category');
        $date = \Request::input('dateRem');
        $description = \Request::input('descriptionRem');
        $cost = \Request::input('cost'); 
        
        //$user = \App\User::where("id", "=", $id)->first();

        $selfservice = \App\SelfService::where('kodeSS',$kodeSS)->first();
        $selfservice->description = $description;
        $mydate = Carbon::now();
        $selfservice->request_date = $mydate;
        $selfservice->approval_date = $mydate;
        $selfservice->status = 0;
        $selfservice->employee_id = '12345'; // harusnya diganti session

        $reimbursement = \App\Reimbursement::where('selfservice_id',$kodeSS)->first();
        $reimbursement->business_purpose = $businesspurpose;
        $reimbursement->category = $category;
        $reimbursement->date = $date;
        $reimbursement->cost = $cost;
        $reimbursement->payment = 0;

        $selfservice->save();
        $kodeSS = DB::table('selfservice')->where('request_date', $mydate)->value('kodeSS');

        if (\Request::hasFile('foto')) {
            if (\Request::file('foto')->isValid()) {
                $extension = \Request::file('foto')->getClientOriginalExtension();
                $foto = $kodeSS.".".$extension;

                \Request::file('foto')->move('./foto', $foto);
                //\Request::file('logo')->move(base_path().'/logo', $logo);

                $reimbursement->photo = $foto;
            }
        }
        
        if($selfservice->save()) {
            $reimbursement->selfservice_id = $kodeSS;
            if ($reimbursement->save()) {
                return "berhasil";
            }
        }

    }

}
