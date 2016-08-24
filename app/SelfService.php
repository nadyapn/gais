<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class SelfService extends Model
{
	protected $table = 'selfservice';
	public $primaryKey  = 'kodeSS';
	public $incrementing = false;


	public static function getMyHistory() {
		$query = $all = DB::table('selfservice')
            	->join('employee','employee.id_employee','=','selfservice.employee_id')
            	->where('employee_id','=',\Auth::user()->id_employee)
            	->where('status','>=',0)
            	->get();

	    foreach ($query as $f) {
            $kodeSS = $f->kodeSS;
            $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->count();
            $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->count();
            $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->count();
            if ($rm > 0) {
                $f->tipe = "Reimbursement";
            }
            else if ($pl > 0) {
                $f->tipe = "Paid Leave";
            }
            else if ($ot > 0) {
                $f->tipe = "Overtime";
            }
            else
            {
                //default case. should never went here
                $f->tipe = "Error : " . $rm . " " . $pl . " " . $ot;
            }
        }

        return ($query);
    }


	public static function getMyReimbursement() {
	    $query = DB::table('reimbursement')
            ->join('selfservice','reimbursement.selfservice_id','=','selfservice.kodeSS')
            ->join('employee','selfservice.employee_id','=','employee.id_employee')
            ->where('id_employee',\Auth::user()->id_employee)
            ->where('status','>=','0')
            ->get();

	    return ($query);
    }

    public static function getMyPaidLeave() {
    	$query = DB::table('paidLeave')
            ->join('selfservice','paidLeave.selfservice_id','=','selfservice.kodeSS')
            ->join('employee','selfservice.employee_id','=','employee.id_employee')
            ->where('id_employee',\Auth::user()->id_employee)
            ->where('status','>=','0')
            ->get();

	    return ($query);
    }

    public static function getMyOvertime() {
	    $query = DB::table('overtime')
	           ->join('selfservice','overtime.selfservice_id','=','selfservice.kodeSS')
	           ->join('employee','selfservice.employee_id','=','employee.id_employee')
	           ->where('id_employee',\Auth::user()->id_employee)
	           ->where('status','>=','0')
	           ->get();

	    return ($query);
    }

    public static function getLogReimbursement() {
	    $query = DB::table('reimbursement')
            ->join('selfservice','reimbursement.selfservice_id','=','selfservice.kodeSS')
            ->join('employee','selfservice.employee_id','=','employee.id_employee')
            ->get();

	    return ($query);
    }

    public static function getLogPaidLeave() {
	    $query = DB::table('paidLeave')
            ->join('selfservice','paidLeave.selfservice_id','=','selfservice.kodeSS')
            ->join('employee','selfservice.employee_id','=','employee.id_employee')
            ->get();

	    return ($query);
    }

    public static function getLogOvertime() {
	    $query = DB::table('overtime')
            ->join('selfservice','overtime.selfservice_id','=','selfservice.kodeSS')
            ->join('employee','selfservice.employee_id','=','employee.id_employee')
            ->get();

	    return ($query);
    }

	public static function getReqForSupervisor() {
	    $query = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->where('supervisor',\Auth::user()->id_employee)
            ->where('status','0')
            ->get();

        if($query == "") return "not found";

            foreach ($query as $e) {
                $kodeSS = $e->kodeSS;
                $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->count();
                $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->count();
                $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->count();
                if ($rm > 0) {
                    $e->tipe = "Reimbursement";
                }
                else if ($pl > 0) {
                    $e->tipe = "Paid Leave";
                }
                else if ($ot > 0) {
                    $e->tipe = "Overtime";
                }
                else
                {
                    //default case. should never go here
                    $e->tipe = "Error : " . $rm . " " . $pl . " " . $ot;
                }
            }

	    return ($query);
    }

    public static function getReqForBU() {
        $query = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->where('status','1')
            ->where(function($like) {
                $like->where('kodeSS','like','RM%')
                    ->orWhere('kodeSS','like','OT%');

            })
            ->get();

        if($query == "") return "not found";

            foreach ($query as $e) {
                $kodeSS = $e->kodeSS;
                $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->count();
                $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->count();
                //$pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->count();
                if ($rm > 0) {
                    $e->tipe = "Reimbursement";
                }
                else if ($ot > 0) {
                    $e->tipe = "Overtime";
                }
                else
                {
                    //default case. should never go here
                    $e->tipe = "Error : " . $rm . " " . $ot;
                }
            }

	    return ($query);
    }

    public static function getReqForHR() {
	    $query = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->join('paidLeave','paidLeave.selfservice_id','=','selfservice.kodeSS')
            ->where('selfservice.status','1')
            ->get();

        if($query == "") return "not found";

	        foreach ($query as $e) {
	            $kodeSS = $e->kodeSS;
	            $rm = \App\Reimbursement::where("selfservice_id", "=", $kodeSS)->count();
	            $ot = \App\Overtime::where("selfservice_id", "=", $kodeSS)->count();
	            $pl = \App\PaidLeave::where("selfservice_id", "=", $kodeSS)->count();
	            if ($pl > 0) {
	                $e->tipe = "Paid Leave";
	            }
	            else
	            {
	        	    //default case. should never go here
	            $e->tipe = "Error : " . $rm . " " . $pl . " " . $ot;
	            }
	        }

	    return ($query);
    }

    public static function getDetail($kodeSS) {
	    $query = DB::table('selfservice')
            ->join('employee','employee.id_employee','=','selfservice.employee_id')
            ->where('kodeSS','=', $kodeSS)
            ->first();

        if($query == "") return "not found";

	    return ($query);
    }

    public static function getSS($kodeSS) {
        $query = \App\SelfService::where("kodeSS","=", $kodeSS)
            ->where("status",">=",0)
            ->first();
        return ($query);
    }
}
