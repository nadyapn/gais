<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
use Auth;
use DB;
use Socialite;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class UserController extends Controller
{
    
    public function index()
    {
        return \View::make('user/welcome');
    }


    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();

       
        $check = \App\User::where("email", "=", $user->email)->first();

        if($check) {
            \Auth::login($check);
            return \Redirect::to('/homepageGAIS');
        } else {
            return "FORBIDDEN";
        }
    }

    public function lalala()
    {  
        $check = \App\User::where("email", "=", "lusianaprima@gmail.com")->first();

        if($check) {
            \Auth::login($check);
            return \Redirect::to('/homepageGAIS');
        } else {
            return \View::make('errors/401');
        }
    }

    public function login()
    {   
        $credentials = \Request::only('email', 'password');
        //dd($credentials);
        $remember = \Request::has('remember');
        if (\Auth::attempt($credentials, $remember)) {
            if (\Auth::user()->division == 'Office Boy') {
                return \Redirect::to('/dashboardOB');    
            }
            else {
                return \Redirect::to('/homepageGAIS');
            }
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

    function sidebarOB() {
        $ob = \Auth::user()->division;
        return \View::make('user/sidebarOB')->with(compact('ob'));
    }

    function dashboardAdmin() {
        if (\Auth::user()->role == 'Admin') {
            return \View::make('user/dashboardAdmin');
        }
        else {
            return \View::make('errors/401');   
        }
    }


    function dashboardNonAdmin() {
        if(\Auth::user()->position == 'Team Leader') {
            $ss = \App\SelfService::getReqForSupervisor();
            $all = \App\SelfService::getMyHistory();
            $sf = \App\Peminjaman::getMyPeminjaman();
            $ob = \App\OBService::getMyOBService();

            return \View::make('user/dashboardNonAdmin')->with(compact('ss'))->with(compact('all'))->with(compact('sf'))->with(compact('ob'));
        }

        else if(\Auth::user()->position == 'Head of Business Unit') {
            $ss = \App\SelfService::getReqForBU();
            $all = \App\SelfService::getMyHistory();
            $sf = \App\Peminjaman::getMyPeminjaman();
            $ob = \App\OBService::getMyOBService();

            return \View::make('user/dashboardNonAdmin')->with(compact('ss'))->with(compact('all'))->with(compact('sf'))->with(compact('ob'));
        }

        else if(\Auth::user()->position == 'Head of HR') {
            $ss = \App\SelfService::getReqForHR();
            $all = \App\SelfService::getMyHistory();
            $sf = \App\Peminjaman::getMyPeminjaman();
            $ob = \App\OBService::getMyOBService();

            return \View::make('user/dashboardNonAdmin')->with(compact('ss'))->with(compact('all'))->with(compact('sf'))->with(compact('ob'));
        }
        else {
            $all = \App\SelfService::getMyHistory();
            $sf = \App\Peminjaman::getMyPeminjaman();
            $ob = \App\OBService::getMyOBService();

            return \View::make('user/dashboardNonAdmin')->with(compact('all'))->with(compact('sf'))->with(compact('ob'));
        }
    }

    function dashboardOB() {
        $task = DB::table('observice')
                ->join('employee','id_employee','=','employee_id')
                ->where('ob_id','=',\Auth::user()->id_employee)
                ->get();
        if (\Auth::user()->division == 'Office Boy') {
            return \View::make('observice/getTaskOBServices')->with(compact('task'));
        }
        else {
            return \View::make('errors/401');   
        }
    }
}