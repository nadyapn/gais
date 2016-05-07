<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OBService extends Model
{
    protected $table = 'observice';
    public $primaryKey  = 'kodeOBS';
    public $incrementing = false;

    public static function getMyObService() {
	    $query = DB::table('observice')
            ->where('id_employee',\Auth::user()->id_employee)
            ->where('status','>=','0')
            ->get();

	    return ($query);
    }

    public static function getLogPeminjaman() {
	    $query = DB::table('observice')
            ->get();

	    return ($query);
    }
}
