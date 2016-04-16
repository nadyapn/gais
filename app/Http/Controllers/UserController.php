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

}



