<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class Reimbursement extends Model 
{
    protected $table = 'reimbursement';
    public $primaryKey  = 'selfservice_id';
    public $incrementing = false;

    public static function getFirstTuple() {
    	$query = DB::table('reimbursement')
            ->join('selfservice','reimbursement.selfservice_id','=','selfservice.kodeSS')
            ->orderBy('selfservice.created_at','desc')
            ->first();

        return ($query);
    }
}