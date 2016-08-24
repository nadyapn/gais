<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class PaidLeave extends Model
{
    protected $table = 'paidLeave';
    public $primaryKey  = 'selfservice_id';
    public $incrementing = false;

    public static function getFirstTuple() {
    	$query = DB::table('paidleave')
            ->join('selfservice','paidleave.selfservice_id','=','selfservice.kodeSS')
            ->orderBy('selfservice.created_at','desc')
            ->first();

        return ($query);
    }

    public static function getTotalLeave() {
        $query = DB::table('paidLeave')
            ->join('selfservice','kodeSS','=','selfservice_id')
            ->join('employee','id_employee','=','employee_id')
            ->where('employee_id','=', \Auth::user()->id_employee)
            ->where('status','=',2)
            ->whereYear('approval_date','=',date('Y'))
            ->count();
        return ($query);
    }
}
