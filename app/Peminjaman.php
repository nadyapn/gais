<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    public $primaryKey  = null;
    public $incrementing = false;

    public static function getWaitingList($facilities_id) {
        $query = DB::table('peminjaman')
            ->join('employee','id_employee','=','employee_id')
            ->where('status','>=','0')
            ->where('facilities_id', '=', $facilities_id)
            ->orderBy('request_date','desc')
            ->get();

        return ($query);
    }

    public static function getMyPeminjaman() {
	    $query = DB::table('peminjaman')
            ->join('employee','id_employee','=','employee_id')
            ->join('facilities','facilities_id','=','facilities.kode')
            ->where('id_employee',\Auth::user()->id_employee)
            ->where('peminjaman.status','>=','0')
            ->get();

	    return ($query);
    }

    public static function getLogPeminjaman() {
	    $query = DB::table('peminjaman')
            ->join('employee','id_employee','=','employee_id')
            ->join('facilities','facilities_id','=','facilities.kode')
            ->get();

	    return ($query);
    }

    public static function getDetailPeminjaman($kodePinjam) {
        $query = DB::table('peminjaman')
            ->join('employee','id_employee','=','employee_id')
            ->join('facilities','facilities_id','=','facilities.kode')
            ->where('kodePinjam','=',$kodePinjam)
            ->first();

        return ($query);
    }
}
