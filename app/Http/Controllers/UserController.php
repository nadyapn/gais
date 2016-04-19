<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    
    public function index()
    {
        return \View::make('user/welcome');
    }

    public function login()
    {   
        $credentials = \Request::only('email', 'password');
        $remember = \Request::has('remember');
        if (\Auth::attempt($credentials, $remember)) {
            return \Redirect::to('/homepageGAIS');
        } else {
            $msg = "asd";
            return \View::make('user/welcome')->with(compact('msg'));
        }
    }

    public function logout(){
        \Auth::logout();
        return \Redirect::to('login');
    }

    function homepageGAIS() {
        $role = \Auth::user()->role;
        $position = \Auth::user()->position;
        return \View::make('user/homepageGAIS')->with(compact('role'))->with(compact('position'));
    }

    function sidebarAdmin() {
        $role = \Auth::user()->role;
        $position = \Auth::user()->position;
        return \View::make('user/sidebarAdmin')->with(compact('role'))->with(compact('position'));
    }


    function sidebarNonAdmin() {
        $role = \Auth::user()->role;
        $position = \Auth::user()->position;
        return \View::make('user/sidebarNonAdmin')->with(compact('role'))->with(compact('position'));
    }

    function dashboardAdmin() {
        if (\Auth::user()->role == 'Admin') {
            return \View::make('user/dashboardAdmin');
        }
    }


    function dashboardNonAdmin() {
        if(\Auth::user()->position == 'Supervisor') {
            $ss = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->where('supervisor','=',\Auth::user()->id_employee)
            ->where('status','0')
            ->get();

            $all = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->where('employee_id','=',\Auth::user()->id_employee)
            ->get();

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

            foreach ($all as $f) {
                $kodeSS = $f->kodeSS;
                $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->count();
                $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->count();
                $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->count();
                if ($rm > 0) {
                    $f->tipe = "Reimbursement";
                }
                else if ($pl > 0) {
                    $f->tipe = "PaidLeave";
                }
                else if ($ot > 0) {
                    $f->tipe = "Overtime";
                } 
                else
                {
                    //default case. should never went here
                    $f->tipe = "Error : " . $rm . " " . $pl . " " . $ot;
                }
            }

            return \View::make('user/dashboardNonAdmin')->with(compact('ss'))->with(compact('all'));
        }

        else if(\Auth::user()->position == 'Business Unit') {
            $ss = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->where('status','1')
            ->get();

            $all = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->where('employee_id','=',\Auth::user()->id_employee)
            ->get();

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

            foreach ($all as $f) {
                $kodeSS = $f->kodeSS;
                $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->count();
                $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->count();
                $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->count();
                if ($rm > 0) {
                    $f->tipe = "Reimbursement";
                }
                else if ($pl > 0) {
                    $f->tipe = "PaidLeave";
                }
                else if ($ot > 0) {
                    $f->tipe = "Overtime";
                } 
                else
                {
                    //default case. should never went here
                    $f->tipe = "Error : " . $rm . " " . $pl . " " . $ot;
                }
            }

            return \View::make('user/dashboardNonAdmin')->with(compact('ss'))->with(compact('all'));
        }

        else if(\Auth::user()->position == 'Human Resource') {
            $ss = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->where('status','1')
            ->get();

            $all = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->where('employee_id','=',\Auth::user()->id_employee)
            ->get();

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

            foreach ($all as $f) {
                $kodeSS = $f->kodeSS;
                $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->count();
                $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->count();
                $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->count();
                if ($rm > 0) {
                    $f->tipe = "Reimbursement";
                }
                else if ($pl > 0) {
                    $f->tipe = "PaidLeave";
                }
                else if ($ot > 0) {
                    $f->tipe = "Overtime";
                } 
                else
                {
                    //default case. should never went here
                    $f->tipe = "Error : " . $rm . " " . $pl . " " . $ot;
                }
            }

            return \View::make('user/dashboardNonAdmin')->with(compact('ss'))->with(compact('all'));
        }
        else {
            $all = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->where('employee_id','=',\Auth::user()->id_employee)
            ->get();

            foreach ($all as $f) {
                $kodeSS = $f->kodeSS;
                $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->count();
                $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->count();
                $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->count();
                if ($rm > 0) {
                    $f->tipe = "Reimbursement";
                }
                else if ($pl > 0) {
                    $f->tipe = "PaidLeave";
                }
                else if ($ot > 0) {
                    $f->tipe = "Overtime";
                } 
                else
                {
                    //default case. should never went here
                    $f->tipe = "Error : " . $rm . " " . $pl . " " . $ot;
                }
            }

            return \View::make('user/dashboardNonAdmin')->with(compact('all'));
        }
    }

}



