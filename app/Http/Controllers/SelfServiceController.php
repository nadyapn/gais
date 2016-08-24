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
        $project = \Request::input('project');

        $validator = \Validator::make($request->all(), [
            'businesspurpose' => 'required',
            'category' => 'required',
            'dateRem' => 'required',
            'descriptionRem' => 'required',
            'cost' => 'required|digits_between:0,100000000',
            'foto' => 'required',
            ]);

        if ($validator->fails()) {
            $in = \Request::all();
            $messages = $validator->errors();
            return \View::make('selfservice/addReimbursement')
            ->with(compact('messages'))
            ->with(compact('in'))
            ->with(compact('request'));
        }

        date_default_timezone_set("Asia/Jakarta");
        $mydate = date('Y-m-d H:i:s'); //Returns IST

        // masukkin dalam database
        $rm = \App\Reimbursement::getFirstTuple();

        if ($rm == "") {
            $selfservice = new \App\SelfService();
            $selfservice->kodeSS = "RM1";
        }
        else {
            $selfservice = new \App\SelfService();
            $temp = (string) $rm->kodeSS;
            $temp2 = substr($temp, 2);
            $temp3 = intval($temp2) + 1;
            $selfservice->kodeSS = "RM" . $temp3;
        }

        $selfservice->description = $description;
        $selfservice->request_date = $mydate;
        $selfservice->approval_date = $mydate;
        if (\Auth::user()->position === 'Team Leader' || \Auth::user()->id_employee === 'Head of HR') {
            $selfservice->status = 1;
        }
        else if (\Auth::user()->position == 'Head of Business Unit') {
            $selfservice->status = 2;
        }
        else {
            $selfservice->status = 0;
        }

        $selfservice->employee_id = \Auth::user()->id_employee;

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

                $reimbursement->photo = $foto;
            }
        }

        if($selfservice->save()) {
            $reimbursement->selfservice_id = $kodeSS;
            if ($reimbursement->save()) {
                return \Redirect::to('/dashboardNonAdmin');
            }
        }

    }

    function addReimbursementFbd() {
        return \View::make('selfservice/addReimbursement');
    }

    // paid leave
    function formPaidLeave() {
        $total_leave = 12 - \App\PaidLeave::getTotalLeave();
        return \View::make('selfservice/addPaidLeave')->with(compact('total_leave'));
    }

    function addPaidLeave(Request $request) {
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

        $pl = \App\PaidLeave::getFirstTuple();

        if ($pl == "") {
            $selfservice = new \App\SelfService();
            $selfservice->kodeSS = "PL1";
        }
        else {
            $selfservice = new \App\SelfService();
            $temp = (string) $pl->kodeSS;
            $temp2 = substr($temp, 2);
            $temp3 = intval($temp2) + 1;
            $selfservice->kodeSS = "PL" . $temp3;
        }

        $selfservice->description = $description;
        $selfservice->request_date = $mydate;
        $selfservice->approval_date = $mydate;
        if (\Auth::user()->position === 'Team Leader' || \Auth::user()->id_employee === 'Head of Business Unit') {
            $selfservice->status = 1;
        }
        else if (\Auth::user()->position == 'Head of HR') {
            $selfservice->status = 2;
        }
        else {
            $selfservice->status = 0;
        }

        $selfservice->employee_id = \Auth::user()->id_employee;

        $paidLeave = new \App\PaidLeave();
        $paidLeave->date_hired = $datehired;
        $paidLeave->category = $category;
        $paidLeave->period_of_leave = $periodofleave;
        $total_leave = \App\PaidLeave::getTotalLeave();
        $paidLeave->total_leave = 12 - $total_leave;
        
        $selfservice->save();
        $kodeSS = DB::table('selfservice')->where('request_date', $mydate)->value('kodeSS');

        if($selfservice->save()) {
            $paidLeave->selfservice_id = $kodeSS;
            if ($paidLeave->save()) {
                return \Redirect::to('/dashboardNonAdmin');
            }
        }
    }

    function addPaidLeaveFbd() {
        return \View::make('selfservice/addPaidLeave');
    }

    // overtime
    function formOvertime() {
        return \View::make('selfservice/addOvertime');
    }

    function addOvertime(Request $request) {
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

        $ot = \App\Overtime::getFirstTuple();

        if ($ot == "") {
            $selfservice = new \App\SelfService();
            $selfservice->kodeSS = "OT1";
        }
        else {
            $selfservice = new \App\SelfService();
            $temp = (string) $ot->kodeSS;
            $temp2 = substr($temp, 2);
            $temp3 = intval($temp2) + 1;
            $selfservice->kodeSS = "OT" . $temp3;
        }

        $selfservice->description = $description;
        $selfservice->request_date = $mydate;
        $selfservice->approval_date = $mydate;

        if (\Auth::user()->position === 'Team Leader' || \Auth::user()->position === 'Head of HR') {
            $selfservice->status = 1;
        }
        else if (\Auth::user()->position == 'Head of Business Unit') {
            $selfservice->status = 2;
        }
        else {
            $selfservice->status = 0;
        }

        $selfservice->employee_id = \Auth::user()->id_employee;

        $overtime = new \App\Overtime();
        $overtime->date = $dateot;
        $overtime->time_start = $timestarts;
        $overtime->time_end = $timeends;

        $selfservice->save();
        $kodeSS = DB::table('selfservice')->where('request_date', $mydate)->value('kodeSS');

        if($selfservice->save()) {
            $overtime->selfservice_id = $kodeSS;
            if ($overtime->save()) {
                return \Redirect::to('/dashboardNonAdmin');
            }
        }
    }

    function addOvertimeFbd() {
        return \View::make('selfservice/addOvertime');
    }

    // get detail
    function getDetail($kodeSS) {
        $ss = \App\SelfService::getDetail($kodeSS);
        $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->first();
        $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->first();
        $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->first();

        if($ss == "") return "not found";

        if($ss->employee_id == \Auth::user()->id_employee || \Auth::user()->supervisor == \Auth::user()->employee_id) {
            return \View::make('selfservice/getDetail')->with(compact('ss'))->with(compact('rm'))->with(compact('ot'))->with(compact('pl'));
        }
        else {
            return \View::make('errors/401');
        }
    }

    function getDetailAdmin($kodeSS) {
        $ss = \App\SelfService::getDetail($kodeSS);
        $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->first();
        $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->first();
        $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->first();

        if($ss == "") return "not found";

        if (\Auth::user()->role == 'Admin') {
            return \View::make('selfservice/getDetailAdmin')->with(compact('ss'))->with(compact('rm'))->with(compact('ot'))->with(compact('pl'));
        }
        else {
            return \View::make('errors/401');
        }
    }

    function getLogReimbursement() {
        $rm = \App\SelfService::getLogReimbursement();

        if(\Auth::user()->role == 'Admin')  {
            return \View::make('selfservice/getLogReimbursement')->with(compact('rm'));
        }
        else {
            return \View::make('errors/401');
        }
    }

    function getLogPaidLeave() {
        $pl = \App\SelfService::getLogPaidLeave();

        if(\Auth::user()->role == 'Admin')  {
            return \View::make('selfservice/getLogPaidLeave')->with(compact('pl'));
        }
        else {
            return \View::make('errors/401');
        }
    }

    function getLogOvertime() {
        $ot = \App\SelfService::getLogOvertime();

        if(\Auth::user()->role == 'Admin')  {
            return \View::make('selfservice/getLogOvertime')->with(compact('ot'));
        }
        else {
            return \View::make('errors/401');
        }
    }

    function getMyReimbursement() {
        $rm = \App\SelfService::getMyReimbursement();

        return \View::make('selfservice/getMyReimbursement')->with(compact('rm'));
    }

    function getMyPaidLeave() {
        $pl = \App\SelfService::getMyPaidLeave();

        return \View::make('selfservice/getMyPaidLeave')->with(compact('pl'));
    }

    function getMyOvertime() {
        $ot = \App\SelfService::getMyOvertime();

        return \View::make('selfservice/getMyOvertime')->with(compact('ot'));
    }

    function myApproval() {
        $position = \Auth::user()->position;

        if($position == 'Team Leader') {
            $ss = \App\SelfService::getReqForSupervisor();

            return \View::make('selfservice/myApproval')->with(compact('ss'))->with(compact('position'));
        }

        else if($position == 'Head of Business Unit') {
            $ss = \App\SelfService::getReqForBU();

            return \View::make('selfservice/myApproval')->with(compact('ss'))->with(compact('position'));
        }

        else if($position == 'Head of HR') {
            $ss = \App\SelfService::getReqForHR();

            return \View::make('selfservice/myApproval')->with(compact('ss'))->with(compact('position'));
        }
        else {
            return \View::make('errors/401');
        }
    }


    function update($kodeSS) {                                                                      // BELOMAN YAALLAH BU BETTY YAALLAH
        $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->count();
        $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->count();
        $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->count();
        $ss = \App\SelfService::getDetail($kodeSS);
        $total_leave = 12 - \App\PaidLeave::getTotalLeave();

        if ($ss->employee_id == \Auth::user()->id_employee) {
            if ($rm > 0) {
                $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->first();
                $id_employee = $ss->employee_id;
                if($id_employee = \Auth::user()->id_employee) {
                    return \View::make('selfservice/update')->with(compact('rm'))->with(compact('ss'));
                }
                else {
                    return \View::make('user/dashboardNonAdmin');
                }
            }
            else if ($pl > 0) {
             $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->first();
             $id_employee = $ss->employee_id;
             if($id_employee = \Auth::user()->id_employee) {
                return \View::make('selfservice/update')->with(compact('pl'))->with(compact('ss'))->with(compact('total_leave'));
            }
            else {
                return \View::make('user/dashboardNonAdmin');
            }
        }
        else if ($ot > 0) {
            $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->first();
            if($id_employee = \Auth::user()->id_employee) {
                return \View::make('selfservice/update')->with(compact('ot'))->with(compact('ss'));
            }
            else {
                return \View::make('user/dashboardNonAdmin');
            }
        }
        else
        {
            return \View::make('errors/401');
        }
    }
    else {
        return \View::make('errors/401');
    }
}

function updatePost($kodeSS, Request $request) {
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
                return \View::make('selfservice/update')
                    ->with(compact('workson'))
                    ->with(compact('rm'))
                    ->with(compact('ss'))
                    ->with(compact('messages'))
                    ->with(compact('in'));
            }

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

                    $rm->photo = $foto;
                }
            }

            if($ss->save()) {
                if ($rm->save()) {
                    return \Redirect::to('/dashboardNonAdmin');
                }
            }
        }

        if ($pl != "") {
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
                return \View::make('selfservice/update')
                    ->with(compact('messages'))
                    ->with(compact('pl'))
                    ->with(compact('ss'))
                    ->with(compact('in'));
            }

            $ss->description = $description;
            $ss->request_date = $mydate;
            $ss->approval_date = $mydate;

            $pl->date_hired = $datehired;
            $pl->category = $category;
            $pl->period_of_leave = $periodofleave;

            $total_leave = \App\PaidLeave::getTotalLeave();
            
            $ss->save();
            $kodeSS = DB::table('selfservice')->where('request_date', $mydate)->value('kodeSS');

            if($ss->save()) {
                if ($pl->save()) {
                    return \Redirect::to('/dashboardNonAdmin');
                }
            }
        }

        if ($ot != "") {
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
                return \View::make('selfservice/update')
                    ->with(compact('messages'))
                    ->with(compact('ot'))
                    ->with(compact('ss'))
                    ->with(compact('in'));
            }

            $ss->description = $description;
            $ss->request_date = $mydate;
            $ss->approval_date = $mydate;

            $ss->save();


            $ot->date = $dateot;
            $ot->time_start = $timestarts;
            $ot->time_end = $timeends;

            $ot->save();

            if($ss->save()) {
                if ($ot->save()) {
                    return \Redirect::to('/dashboardNonAdmin');
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
                if ($rm->save()) {
                    return \Redirect::to('/getMyReimbursement');
                }
            }
        }

        if ($pl != "") {
            $ss->status = -1;
            $ss->save();
            if($ss->save()) {
                if ($pl->save()) {
                    return \Redirect::to('/getMyPaidLeave');
                }
            }
        }

        if ($ot != "") {
            $ss->status = -1;
            $ss->save();
            if($ss->save()) {
                if ($ot->save()) {
                    return \Redirect::to('/getMyOvertime');
                }
            }
        }
    }

    function approval($kodeSS) { 
        if((\Auth::user()->position == 'Team Leader')) {
            $ss = \App\SelfService::getSS($kodeSS);
            $ss->status = 1;
            $ss->save();
            
            return \Redirect::to('/myApproval');
        }
        else if(\Auth::user()->position == 'Head of Business Unit' || \Auth::user()->position == 'Head of HR') {
            $ss = \App\SelfService::getSS($kodeSS);
            $ss->status = 2;
            $ss->save();
            
            return \Redirect::to('/myApproval');
        }
        else {
            return \View::make('user/homepageGAIS');
        }
    }

    function rejection($kodeSS) {
        $ss = \App\SelfService::getSS($kodeSS);
        return \View::make('selfservice/rejection')->with(compact('ss'));
    }

    function rejectionPost($kodeSS, Request $request) {
        $ss = \App\SelfService::getSS($kodeSS);
        $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->first();

        $message = \Request::input('message');

        $validator = \Validator::make($request->all(), [
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            $in = \Request::all();
            $messages = $validator->errors();
            return \View::make('selfservice/rejection')
                ->with(compact('messages'))
                ->with(compact('ss'))
                ->with(compact('in'));
        }
        
        if(\Auth::user()->position == 'Team Leader') {
            $ss = \App\SelfService::getSS($kodeSS);
            $ss->status = 3;
            $ss->message = $message;
            $ss->save();

            return \Redirect::to('/myApproval');
        }
        else if(\Auth::user()->position == 'Head of Business Unit' || \Auth::user()->position == 'Head of HR') {
            $ss = \App\SelfService::getSS($kodeSS);
            $ss->status = 4;
            $ss->message = $message;
            $ss->save();

            return \Redirect::to('/myApproval');
        }
        else {
            return \View::make('user/homepageGAIS');
        }
    }

    // cek project available 
    function cekproject($project) {
        $listproject = \App\WorksOn::getWorksOn();
        $return = '<select name="project" class="form-control">';
        foreach ($listproject as $e) {
            $option = '<option value="'. $e->name .'">' . $e->name . '</option>';
            $return .= $option;
        }

        $return .= '</select>';

        return $return;
    }

    // cek project available 
    function updateReimbursement($project) {
        $listproject = \App\WorksOn::getWorksOn();
        $return = '<select name="project" class="form-control">';
        foreach ($listproject as $e) {
            $option = '<option value="'. $e->name .'">' . $e->name . '</option>';
            $return .= $option;
        }

        $return .= '</select>';

        return $return;
    }
}