<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Carbon\Carbon;

use Session;

use DB;

class SharedFacilitiesController extends Controller
{  
    
    // form shared facilities. return view form
    function formSF() {
        $sf = \App\Facilities::getFacilities();
        return \View::make('sharedfacilities/addSF')->with(compact('sf'));
    }

    // ketika submit form. no return view
    function addSF(Request $request) {
        $sf = \App\Facilities::getFacilities();
        $sfname = \Request::input('chooseFacility');

        $validator = \Validator::make($request->all(), [
            'chooseFacility' => 'required',
        ]);

        if ($validator->fails()) {
            $in = \Request::all();
            $messages = $validator->errors();
            return \View::make('sharedfacilities/addSF')
                        ->with(compact('messages'))
                        ->with(compact('sf'))
                        ->with(compact('in'));
        }

        $request->session()->put('sfname', $sfname);
        $value = $request->session()->get('sfname', 'default');
        
        return \View::make('sharedfacilities/peminjamanScheduler')->with(compact('value'));
    }

    // ketika ketik url. return view form SF lagi
    function addSFFbd() {
        return \View::make('sharedfacilities/addSF');
    }

    // return view form peminjaman
    function formPeminjaman($tanggal, $waktu) {
        $salahjam = "";
        return \View::make('sharedfacilities/formPeminjaman')->with(compact('tanggal'))->with(compact('waktu'))->with(compact('salahjam'));
    }

    // post peminjaman
    function addPeminjaman($tanggal, $waktu, Request $request) {
        $endtime = \Request::input('endtime');
        $desc = \Request::input('description');

        $validator = \Validator::make($request->all(), [
            'endtime' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            $in = \Request::all();
            $messages = $validator->errors();
            return \View::make('sharedfacilities/formPeminjaman')
                        ->with(compact('messages'))
                        ->with(compact('tanggal'))
                        ->with(compact('waktu'))
                        ->with(compact('in'));
        }
        else if ($endtime <= $waktu) {
            $in = \Request::all();
            $messages = $validator->errors();
            $salahjam = "End time is not valid";
            return \View::make('sharedfacilities/formPeminjaman')
                        ->with(compact('messages'))
                        ->with(compact('tanggal'))
                        ->with(compact('waktu'))
                        ->with(compact('salahjam'))
                        ->with(compact('in'));
        }

        date_default_timezone_set("Asia/Jakarta"); 
        $mydate = date('Y-m-d H:i:s'); //Returns IST
        
        $value = session()->get('sfname', 'default');
        $facilities_id = $sf = \App\Facilities::where('sfname','=',$value)->value('kode');

        // cek database
        $peminjamansf = DB::table('peminjaman')
            ->orderBy('created_at','desc')
            ->first();

        if ($peminjamansf == "") {
            $peminjaman = new \App\Peminjaman();
            $peminjaman->kodePinjam = "1";
            $peminjaman->request_date = $mydate;
            $peminjaman->used_date = date("Y-m-d", strtotime($tanggal));
            $peminjaman->time_start = $waktu;
            $peminjaman->time_end = $endtime;
            $peminjaman->description = $desc;
            $peminjaman->employee_id = \Auth::user()->id_employee;
            $peminjaman->facilities_id = $facilities_id;
        }
        else {
            $peminjaman = new \App\Peminjaman();
            $temp = (string) $peminjamansf->kodePinjam;
            $temp2 = intval($temp) + 1;
            $peminjaman->kodePinjam = $temp2;
            $peminjaman->request_date = $mydate;
            $peminjaman->used_date = date("Y-m-d", strtotime($tanggal));
            $peminjaman->time_start = $waktu;
            $peminjaman->time_end = $endtime;
            $peminjaman->description = $desc;
            $peminjaman->employee_id = \Auth::user()->id_employee;
            $peminjaman->facilities_id = $facilities_id;
        }

        if($peminjaman->save()) {
            return \Redirect::to('/dashboardNonAdmin');
        }
    }

    // return view form waiting list
    function formWaitingList($tanggal, $waktu) {
        $value = session()->get('sfname', 'default');
        $facilities_id = $sf = \App\Facilities::where('sfname','=',$value)->value('kode');
        $salahjam = "";
        $wl = \App\Peminjaman::getWaitingList($facilities_id);
        return \View::make('sharedfacilities/formWaitingList')
            ->with(compact('tanggal'))
            ->with(compact('waktu'))
            ->with(compact('salahjam'))
            ->with(compact('wl'));
    }

    // post waiting list
    function addWaitingList($tanggal, $waktu, Request $request) {
        $value = session()->get('sfname', 'default');
        $facilities_id = $sf = \App\Facilities::where('sfname','=',$value)->value('kode');
        $wl = \App\Peminjaman::getWaitingList($facilities_id);
        $endtime = \Request::input('endtime');
        $desc = \Request::input('description');

        $validator = \Validator::make($request->all(), [
            'endtime' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            $in = \Request::all();
            $messages = $validator->errors();
            return \View::make('sharedfacilities/formWaitingList')
                        ->with(compact('messages'))
                        ->with(compact('tanggal'))
                        ->with(compact('waktu'))
                        ->with(compact('in'))
                        ->with(compact('wl'));
        }
        else if ($endtime <= $waktu) {
            $in = \Request::all();
            $messages = $validator->errors();
            $salahjam = "End time is not valid";
            return \View::make('sharedfacilities/formWaitingList')
                        ->with(compact('messages'))
                        ->with(compact('tanggal'))
                        ->with(compact('waktu'))
                        ->with(compact('salahjam'))
                        ->with(compact('in'))
                        ->with(compact('wl'));
        }

        date_default_timezone_set("Asia/Jakarta"); 
        $mydate = date('Y-m-d H:i:s'); //Returns IST
        
        $value = session()->get('sfname', 'default');
        $facilities_id = $sf = \App\Facilities::where('sfname','=',$value)->value('kode');

        // cek database
        $peminjamansf = DB::table('peminjaman')
            ->orderBy('created_at','desc')
            ->first();

        $peminjaman = new \App\Peminjaman();
        $temp = (string) $peminjamansf->kodePinjam;
        $temp2 = intval($temp) + 1;
        $peminjaman->kodePinjam = $temp2;
        $peminjaman->request_date = $mydate;
        $peminjaman->used_date = date("Y-m-d", strtotime($tanggal));
        $peminjaman->time_start = $waktu;
        $peminjaman->time_end = $endtime;
        $peminjaman->description = $desc;
        $peminjaman->status = 1;
        $peminjaman->employee_id = \Auth::user()->id_employee;
        $peminjaman->facilities_id = $facilities_id;

        if($peminjaman->save()) {
            return \Redirect::to('/getMyPeminjaman');
        }
    }

    function sfAriq() {
        return \View::make('sharedfacilities/sfAriq');
    }

    // mau create atau delete
    function sfSpecialMenu() {
        return \View::make('sharedfacilities/sfSpecialMenu');
    }

    function facilitiesForm() {
        return \View::make('sharedfacilities/facilitiesForm');
    }    

    // get detail peminjaman. return view get detail
    function getDetail($kodePinjam) {
        $peminjaman = \App\Peminjaman::getDetailPeminjaman($kodePinjam);
        return \View::make('sharedfacilities/getDetail')->with(compact('peminjaman'));
    }

    // get detail peminjaman untuk admin. view get detail untuk admin
    function getDetailAdmin($kodePinjam) {
        $peminjaman = \App\Peminjaman::getDetailPeminjaman($kodePinjam);
        return \View::make('sharedfacilities/getDetail')->with(compact('peminjaman'));
    }

    // get log peminjaman. return viw list semua log
    function getLogPeminjaman() {
        $peminjaman = \App\Peminjaman::getLogPeminjaman();
        return \View::make('sharedfacilities/getLogPeminjaman')->with(compact('peminjaman'));
    }

    // get history peminjaman. return view semua history kita
    function getMyPeminjaman() {
        $peminjaman = \App\Peminjaman::getMyPeminjaman();
        return \View::make('sharedfacilities/getMyPeminjaman')->with(compact('peminjaman'));
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
        $sf = \App\Peminjaman::where("kodePinjam","=", $kodePinjam)->first();

        $sf->status = -1;
        if($sf->save()) {
            return \Redirect::to('/getMyPeminjaman');
        }
    }

    // form add shared facilities. return view form
    function formFacility() {
        if (\Auth::user()->role != 'Admin') {
           return \View::make('errors/401');
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
            $facility->sfname = $name;
            $facility->category = $category;
        }
        else {
            $facility = new \App\Facilities();
            $temp = (string) $sf->kode;
            $temp2 = intval($temp) + 1;
            $facility->kode = $temp2;
            $facility->description = $description;
            $facility->sfname = $name;
            $facility->category = $category;
        }

        if($facility->save()) {
            return \Redirect::to('/dashboardAdmin');
        }
    }

    // ketika ketik url. return view form facility lagi
    function addFacilityFbd() {
        if (\Auth::user()->role != 'Admin') {
           return \View::make('errors/401');
        }
        else {
            return \View::make('sharedfacilities/addFacility');
        }
    }

    // ketika delete facility. return view list all facilities
    function getAllFacilities() {
        $sf = \App\Facilities::getFacilities();
        if (\Auth::user()->role != 'Admin') {
           return \View::make('errors/401');
        }
        else {
            return \View::make('sharedfacilities/getAllFacilities')->with(compact('sf'));
        }
    }

    // ketika delete salah satu fasilitas. no return view
    function deleteFacility($kode) {
        $sf = \App\Facilities::where("kode","=", $kode)->first();
        if (\Auth::user()->role != 'Admin') {
           return \View::make('errors/401');
        }
        else {
            $sf->status = -1;
            $sf->save();
            if ($sf->save()) {
                return \Redirect::to('/deleteFacility');
            }
        }
    }
}
