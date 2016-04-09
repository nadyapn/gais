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
    public function login(Request $request)
    {   session_start();
        $user= DB::table('employee')->where([['email','=',$request->email],['password','=',$request->password]])->first();
        $nama= DB::table('employee')->where('email','=',$request->email)->value('name');
        
        if($user===null){
            echo "tidak ada";
            die;
        }
        else
            {
            $_SESSION["username"] = $nama;
            }

        $_SESSION['role']=$user->role;
        
        if($_SESSION['role']==='Non-Admin'){//cek apakah user admin atau bukan
            return view('/non-admin'); // kalau user adalah non-admin ,masuk ke halaman non-admin, halaman non-admin nya belom dibikin

        }
        else{
           
            return view('/welcome'); // kalau user adalah admin, masuk ke halaman admin=welcome.blade.php

        }
        


     
    }


    public function index()
    {
        return view('./auth/login');
    }
    public function logout(){
        session_unset();
        return view('./auth/login');
    }

}


