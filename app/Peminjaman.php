<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    public $primaryKey  = 'kodePinjam';
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
            ->join('facilities','facilities_id','=','kode')
            ->select('request_date','peminjaman.status','sfname','kodePinjam')
            ->where('id_employee',\Auth::user()->id_employee)
            ->where('peminjaman.status','>=','0')
            ->get();

	    return ($query);
    }

    public static function getLogPeminjaman() {
	    $query = DB::table('peminjaman')
            ->join('employee','id_employee','=','employee_id')
            ->join('facilities','facilities_id','=','facilities.kode')
            ->select('request_date','peminjaman.status','sfname','kodePinjam','name')
            ->get();

	    return ($query);
    }

    public static function getDetailPeminjaman($kodePinjam) {
        $query = DB::table('peminjaman')
            ->join('employee','id_employee','=','employee_id')
            ->join('facilities','facilities_id','=','facilities.kode')
            ->select('kodePinjam','name','sfname','time_start','time_end','peminjaman.description','peminjaman.status','request_date','employee_id')
            ->where('kodePinjam','=',$kodePinjam)
            ->first();

        return ($query);
    }

    public static function getFirstTuple() {
        $query = DB::table('peminjaman')
            ->orderBy('created_at','desc')
            ->first();

        return ($query);
    }

    public static function getPeminjamanByMe($tanggal, $waktu, $sfname) {
        $query = DB::table('peminjaman')
                ->join('facilities','facilities_id','=','facilities.kode')
                ->where('used_date', '=', $tanggal)
                ->where('time_start', '<=', $waktu)
                ->where('time_end', '>', $waktu)
                ->where('sfname','=', $sfname)
                ->where('peminjaman.status',0)
                ->where('employee_id','=',\Auth::user()->id_employee)
                ->count();
        
        return ($query);
    }

    public static function getThisPeminjaman($tanggal, $waktu, $sfname) {
        $query = DB::table('peminjaman')
                ->join('facilities','facilities_id','=','facilities.kode')
                ->where('used_date', '=', $tanggal)
                ->where('time_start', '<=', $waktu)
                ->where('time_end', '>', $waktu)
                ->where('sfname','=', $sfname)
                ->where('peminjaman.status',0)
                ->count();
        
        return ($query);
    }
}
