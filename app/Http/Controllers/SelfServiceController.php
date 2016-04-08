<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use DB;

class SelfServiceController extends Controller
{
    //
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
        $selfservice->employee_id = '12345';

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

    function getDetail($kodeSS) {
        $ss = \App\SelfService::where("kodeSS", "=", $kodeSS)->first();
        $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->first();

        if($ss == "") return "not found";
        if($rm == "") return "not found";

        //return \View::make('selfservice/getDetail');
        return \View::make('selfservice/getDetail')->with(compact('ss'))->with(compact('rm'));
    }

}
