<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    public $primaryKey  = 'kodePinjam';
    public $incrementing = false;

    public static function getMyPeminjaman() {
	    $query = DB::table('peminjaman')
            ->where('id_employee',\Auth::user()->id_employee)
            ->where('status','>=','0')
            ->get();

	    return ($query);
    }

    public static function getLogPeminjaman() {
	    $query = DB::table('peminjaman')
            ->get();

	    return ($query);
    }
}
