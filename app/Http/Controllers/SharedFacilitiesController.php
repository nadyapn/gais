<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use DB;

class SharedFacilitiesController extends Controller
{  

    // form peminjaman shared facilities. return view form
    function formPeminjaman() {
        $sf = \App\Facilities::getFacilities();
        return \View::make('sharedfacilities/addPeminjaman')->with(compact('sf'));
    }

    // ketika submit form. no return view
    function addPeminjaman(Request $request) {
        $sf = \App\Facilities::getFacilities();
        $sfname = \Request::input('chooseFacility');

        $validator = \Validator::make($request->all(), [
            'chooseFacility' => 'required',
        ]);

        if ($validator->fails()) {
            $in = \Request::all();
            $messages = $validator->errors();
            return \View::make('sharedfacilities/addPeminjaman')
                        ->with(compact('messages'))
                        ->with(compact('sf'))
                        ->with(compact('in'));
        }

        return \Redirect::to('/facilitiesForm');
    }

    function contoh() {
        return \View::make('sharedfacilities/contoh');
    }

    function contoh2($tanggal, $waktu) {
        return \View::make('sharedfacilities/addContoh')->with(compact('tanggal'))->with(compact('waktu'));
    }

    function addContoh($tanggal, $waktu) {
        

        return \Redirect::to('contoh');
    }

    // ketika ketik url. return view form peminjaman lagi
    function addPeminjamanFbd() {
        return \View::make('sharedfacilities/addPeminjaman');
    }

    function facilitiesForm() {
        return \View::make('sharedfacilities/facilitiesForm');
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

    // form add shared facilities. return view form
    function formFacility() {
        if (\Auth::user()->role != 'Admin') {
           return \View::make('user/homepageGAIS');
        }
        else {
            return \View::make('sharedfacilities/addFacility');
        }
    }

    // ketika submit form. no return view
    function addFacility(Request $request) {
        $name = \Request::input('facilityName');
        $category = \Request::input('category');
        $description = \Request::input('facilityDescription');

        $validator = \Validator::make($request->all(), [
            'facilityName' => 'required',
            'category' => 'required',
            'facilityDescription' => 'required',
        ]);

        if ($validator->fails()) {
            $in = \Request::all();
            $messages = $validator->errors();
            return \View::make('sharedfacilities/addFacility')
                        ->with(compact('messages'))
                        ->with(compact('in'));
        }

        // cek database
        $sf = DB::table('facilities')
            ->orderBy('created_at','desc')
            ->first();

        if ($sf == "") {
            $facility = new \App\Facilities();
            $facility->kode = "1";
            $facility->description = $description;
            $facility->name = $name;
            $facility->category = $category;
        }
        else {
            $facility = new \App\Facilities();
            $temp = (string) $sf->kode;
            $temp2 = intval($temp) + 1;
            $facility->kode = $temp2;
            $facility->description = $description;
            $facility->name = $name;
            $facility->category = $category;
        }

        if($facility->save()) {
            return \Redirect::to('/dashboardAdmin');
        }
    }

    // ketika ketik url. return view form facility lagi
    function addFacilityFbd() {
        if (\Auth::user()->role != 'Admin') {
           return \View::make('user/homepageGAIS');
        }
        else {
            return \View::make('sharedfacilities/addFacility');
        }
    }

    // ketika delete facility. no return view
    function deleteFacility($kode) {
        $sf = \App\Facilities::where("kode","=", $kode)->first();
        $sf->status = -1;
        $sf->save();
    }
}
