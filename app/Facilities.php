<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Facilities extends Model
{
    protected $table = 'facilities';
    public $primaryKey  = 'kode';
    public $incrementing = false;

    public static function getFacilities() {
    	$query = DB::table('facilities')
            ->where('status','>=','0')
            ->get();

	    return ($query);
    }
}


