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

    function addReimbursement(Request $request) {
        $businesspurpose = \Request::input('businesspurpose');
    	$category = \Request::input('category');
    	$date = \Request::input('dateRem');
    	$description = \Request::input('descriptionRem');
    	$cost = \Request::input('cost'); 

        $validator = \Validator::make($request->all(), [
            'businesspurpose' => 'required',
            'category' => 'required',
            'dateRem' => 'required',
            'descriptionRem' => 'required',
            'cost' => 'required|digits_between:0,100000000',
        ]);

        if ($validator->fails()) {
            $in = \Request::all();
            $messages = $validator->errors();
            return \View::make('selfservice/addReimbursement')
                        ->with(compact('messages'))
                        ->with(compact('in'));
        }

        date_default_timezone_set("Asia/Jakarta"); 
        $mydate = date('Y-m-d H:i:s'); //Returns IST 
    	
        $selfservice = new \App\SelfService();
        $selfservice->description = $description;
        $selfservice->request_date = $mydate;
        $selfservice->approval_date = $mydate;
        if (\Auth::user()->position === 'Supervisor') {
            $selfservice->status = 1;
        }
        else {
            $selfservice->status = 0;    
        }
        
        $selfservice->employee_id = \Auth::user()->id_employee; // harusnya diganti session

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
        } else {
            // kalo ga masukin foto
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

        $validator = \Validator::make($request->all(), [
            'datehired' => 'required',
            'periodofleave' => 'required',
            'category' => 'required',
            'rsnofleave' => 'required',

        ]);

        if ($validator->fails()) {
            $in = \Request::all();
            $messages = $validator->errors();
            return \View::make('selfservice/addPaidLeave')
                        ->with(compact('messages'))
                        ->with(compact('in'));
        }

        date_default_timezone_set("Asia/Jakarta"); 
        $mydate = date('Y-m-d H:i:s'); //Returns IST 
        
        $selfservice = new \App\SelfService();
        $selfservice->description = $description;
        $selfservice->request_date = $mydate;
        $selfservice->approval_date = $mydate;
        $selfservice->status = 0;
        $selfservice->employee_id = \Auth::user()->id_employee; // harusnya diganti session
 
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

        $validator = \Validator::make($request->all(), [
            'dateot' => 'required',
            'timestarts' => 'required',
            'timeends' => 'required',
            'rsnofot' => 'required',

        ]);

        if ($validator->fails()) {
            $in = \Request::all();
            $messages = $validator->errors();
            return \View::make('selfservice/addOvertime')
                        ->with(compact('messages'))
                        ->with(compact('in'));
        }

        date_default_timezone_set("Asia/Jakarta"); 
        $mydate = date('Y-m-d H:i:s'); //Returns IST 
        
        $selfservice = new \App\SelfService();
        $selfservice->description = $description;
        $selfservice->request_date = $mydate;
        $selfservice->approval_date = $mydate;
        $selfservice->status = 0;
        $selfservice->employee_id = \Auth::user()->id_employee; // harusnya diganti session

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
        $id_employee = \Auth::user()->id_employee; //harusnya session
        $rm = DB::table('reimbursement')
            ->join('selfservice','reimbursement.selfservice_id','=','selfservice.kodeSS')
            ->join('employee','selfservice.employee_id','=','employee.id_employee')
            ->where('id_employee',$id_employee)
            ->where('status','>=','0')
            ->get();

        return \View::make('selfservice/getMyReimbursement')->with(compact('rm'));
    }

    function getMyPaidLeave() {
        $id_employee = \Auth::user()->id_employee; //harusnya session
        $pl = DB::table('paidLeave')
            ->join('selfservice','paidLeave.selfservice_id','=','selfservice.kodeSS')
            ->join('employee','selfservice.employee_id','=','employee.id_employee')
            ->where('id_employee',$id_employee)
            ->where('status','>=','0')
            ->get();

        return \View::make('selfservice/getMyPaidLeave')->with(compact('pl'));
    }

    function getMyOvertime() {
        $id_employee = \Auth::user()->id_employee; //harusnya session
        $ot = DB::table('overtime')
            ->join('selfservice','overtime.selfservice_id','=','selfservice.kodeSS')
            ->join('employee','selfservice.employee_id','=','employee.id_employee')
            ->where('id_employee',$id_employee)
            ->where('status','>=','0')
            ->get();

        return \View::make('selfservice/getMyOvertime')->with(compact('ot'));
    }

    function myApproval() {
        $position = \Auth::user()->position;
        $id_employee = \Auth::user()->id_employee;

        if($position == 'Supervisor') {
            $ss = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->where('supervisor',$id_employee)
            ->where('status','0')
            ->get();

            if($ss == "") return "not found";

            foreach ($ss as $e) {
                $kodeSS = $e->kodeSS;
                $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->count();
                $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->count();
                $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->count();
                if ($rm > 0) {
                    $e->tipe = "Reimbursement";
                }
                else if ($pl > 0) {
                    $e->tipe = "PaidLeave";
                }
                else if ($ot > 0) {
                    $e->tipe = "Overtime";
                } 
                else
                {
                    //default case. should never went here
                    $e->tipe = "Error : " . $rm . " " . $pl . " " . $ot;
                }
            }

            return \View::make('selfservice/myApproval')->with(compact('ss'))->with(compact('position'));
        }

        else if($position == 'Business Unit') {
            $ss = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->where('supervisor',$id_employee)
            ->where('status','1')
            ->get();

            if($ss == "") return "not found";

            foreach ($ss as $e) {
                $kodeSS = $e->kodeSS;
                $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->count();
                $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->count();
                if ($rm > 0) {
                    $e->tipe = "Reimbursement";
                }
                else if ($ot > 0) {
                    $e->tipe = "Overtime";
                } 
                else
                {
                    //default case. should never went here
                    $e->tipe = "Error : " . $rm . " " . $pl . " " . $ot;
                }
            }

            return \View::make('selfservice/myApproval')->with(compact('ss'))->with(compact('position'));
        }

        else if($position == 'Human Resource') {
            $ss = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->where('supervisor',$id_employee)
            ->where('status','1')
            ->get();

            if($ss == "") return "not found";

            foreach ($ss as $e) {
                $kodeSS = $e->kodeSS;
                $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->count();
                if ($pl > 0) {
                    $e->tipe = "PaidLeave";
                } 
                else
                {
                    //default case. should never went here
                    $e->tipe = "Error : " . $rm . " " . $pl . " " . $ot;
                }
            }

            return \View::make('selfservice/myApproval')->with(compact('ss'))->with(compact('position'));
        }
           
    }
  

    function update($kodeSS) {
        $ss = \App\SelfService::where("kodeSS","=", $kodeSS)->first();
        $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->count();
        $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->count();
        $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->count();
            if ($rm > 0) {
                $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->first();
                //return($rm);
                return \View::make('selfservice/update')->with(compact('rm'))->with(compact('ss'));
            }
            else if ($pl > 0) {
               $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->first();
               //return($pl);
               return \View::make('selfservice/update')->with(compact('pl'))->with(compact('ss'));
            }
            else if ($ot > 0) {
                $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->first();
                //return($ot);
                return \View::make('selfservice/update')->with(compact('ot'))->with(compact('ss'));
            } 
            else
            {
                $ss->tipe = "Error : " . $rm . " " . $pl . " " . $ot;
            }
    }

    function updatePost($kodeSS) {
        $ss = \App\SelfService::where("kodeSS","=", $kodeSS)->first();
        $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->first();
        $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->first();
        $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->first();

        date_default_timezone_set("Asia/Jakarta"); 
        $mydate = date('Y-m-d H:i:s'); //Returns IST 

        if ($rm != "") {
            $businesspurpose = \Request::input('businesspurpose');
            $category = \Request::input('category');
            $date = \Request::input('dateRem');
            $description = \Request::input('descriptionRem');
            $cost = \Request::input('cost'); 
            
            $ss->description = $description;
            $ss->request_date = $mydate;
            $ss->approval_date = $mydate;

            $rm->business_purpose = $businesspurpose;
            $rm->category = $category;
            $rm->date = $date;
            $rm->cost = $cost;
            $rm->payment = 0;

            $ss->save();
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
            
            if($ss->save()) {
                if ($rm->save()) {
                    return "berhasil";
                }
            }
        }

        if ($pl != "") {
            $datehired = \Request::input('datehired');
            $periodofleave = \Request::input('periodofleave');
            $category = \Request::input('category');
            $description = \Request::input('rsnofleave');
            
            $ss->description = $description;
            $ss->request_date = $mydate;
            $ss->approval_date = $mydate;
     
            $pl->date_hired = $datehired;
            $pl->category = $category;
            $pl->period_of_leave = $periodofleave;

            $ss->save();
            $kodeSS = DB::table('selfservice')->where('request_date', $mydate)->value('kodeSS');
            
            if($ss->save()) {
                if ($pl->save()) {
                    return "berhasil";
                }
            }
        
        }

        if ($ot != "") {
            $dateot = \Request::input('dateot');
            $timestarts = \Request::input('timestarts');
            $timeends = \Request::input('timeends');
            $description = \Request::input('rsnofot');
            
            $ss->description = $description;

            $ss->request_date = $mydate;
            $ss->approval_date = $mydate;

            $ot->date = $dateot;
            $ot->time_start = $timestarts;
            $ot->time_end = $timeends;

            $ss->save();
            $kodeSS = DB::table('selfservice')->where('request_date', $mydate)->value('kodeSS');
            if($ss->save()) {
                if ($ot->save()) {
                    return "berhasil";
                }
            }
        }

    }

    function delete($kodeSS) {
        $ss = \App\SelfService::where("kodeSS","=", $kodeSS)->first();
        $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->first();
        $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->first();
        $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->first();

        if ($rm != "") {
            $ss->status = -1;

            $ss->save();
            
            if($ss->save()) {
                //$rm->selfservice_id = $kodeSS;
                if ($rm->save()) {
                    return "berhasil";
                }
            }
        }

        if ($pl != "") {
            $ss->status = -1;

            $ss->save();
            
            if($ss->save()) {
                //$pl->selfservice_id = $kodeSS;
                if ($pl->save()) {
                    return "berhasil";
                }
            }
        
        }

        if ($ot != "") {
            $ss->status = -1;

            $ss->save();
            
            if($ss->save()) {
                //$ot->selfservice_id = $kodeSS;
                if ($ot->save()) {
                    return "berhasil";
                }
            }
        }
    }

}
