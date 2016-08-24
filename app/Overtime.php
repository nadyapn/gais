<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Overtime extends Model
{
    protected $table = 'overtime';
    public $primaryKey  = 'selfservice_id';
    public $incrementing = false;

    public static function getFirstTuple() {
    	$query = DB::table('overtime')
            ->join('selfservice','overtime.selfservice_id','=','selfservice.kodeSS')
            ->orderBy('selfservice.created_at','desc')
            ->first();

        return ($query);
    }
}
