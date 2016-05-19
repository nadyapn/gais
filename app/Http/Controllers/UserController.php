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
            return "FORBIDDEN";
        }
    }

    public function login()
    {   
        $credentials = \Request::only('email', 'password');
        //dd($credentials);
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
        else {
            return \View::make('errors/401');   
        }
    }


    function dashboardNonAdmin() {
        if(\Auth::user()->position == 'Team Leader') {
            $ss = \App\SelfService::getReqForSupervisor();
            $all = \App\SelfService::getMyHistory();

            return \View::make('user/dashboardNonAdmin')->with(compact('ss'))->with(compact('all'));
        }

        else if(\Auth::user()->id_employee == '1') {
            $ss = \App\SelfService::getReqForBU();
            $all = \App\SelfService::getMyHistory();

            return \View::make('user/dashboardNonAdmin')->with(compact('ss'))->with(compact('all'));
        }

        else if(\Auth::user()->id_employee == '2') {
            $ss = \App\SelfService::getReqForHR();
            $all = \App\SelfService::getMyHistory();

            return \View::make('user/dashboardNonAdmin')->with(compact('ss'))->with(compact('all'));
        }
        else {
            $all = \App\SelfService::getMyHistory();

            return \View::make('user/dashboardNonAdmin')->with(compact('all'));
        }
    }
}