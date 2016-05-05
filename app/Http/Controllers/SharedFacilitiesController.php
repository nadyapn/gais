<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use DB;

class SelfServiceController extends Controller
{  

    // form peminjaman shared facilities. return view form
    function formReimbursement() {
        return \View::make('sharedfacilities/addPeminjaman');
    }

    // ketika submit form. no return view
    function addReimbursement(Request $request) {
        
    }

    // ketika ketik url. return view form peminjaman lagi
    function addReimbursementFbd() {
        return \View::make('sharedfacilities/addPeminjaman');
    }

    // get detail peminjaman. return view get detail
    function getDetail($kodePinjam) {
        return \View::make('sharedfacilities/getDetail');
    }

    // get detail peminjaman untuk admin. view get detail untuk admin
    function getDetailAdmin($kodePinjam) {
        return \View::make('sharedfacilities/getDetailAdmin');
    }

    // get log peminjaman. return viw list semua log
    function getLogPeminjaman() {
        return \View::make('sharedfacilities/getLogPeminjaman');
    }

    // get history peminjaman. return view semua history kita
    function getMyPeminjaman() {
        return \View::make('sharedfacilities/getMyPeminjaman');
    }

    // update peminjaman. return view form (mirip kayak create)
    function update($kodePinjam) {                                                                  
        return \View::make('sharedfacilities/update');
    }

    // ketika submit update. no return view
    function updatePost($kodePinjam, Request $request) {
        
    }

    // ketika cancel peminjaman. no return view
    function delete($kodePinjam) {
        
    }
}
