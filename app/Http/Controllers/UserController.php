<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{
    // login
	function login() {
		return \View::make('user/welcome');
	}

	
	// post log in
	function isLogin() {
		//return \View::make('user/homepageGAIS');
	}

	// logout
	function logout() {
		return \Redirect::to('login');

	}

	function homepageGAIS() {
		return \View::make('user/homepageGAIS');
	}

	function dashboardAdmin() {
		return \View::make('user/dashboardAdmin');
	}


	function dashboardNonAdmin() {
		$ss = \DB::table('selfservice')
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

		return \View::make('user/dashboardNonAdmin')->with(compact('ss'));
	}	

	//protected $layout = 'layouts.master';
}
