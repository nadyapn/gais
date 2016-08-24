<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class OBService extends Model
{
    protected $table = 'observice';
    public $primaryKey  = 'kodeOBS';
    public $incrementing = false;

    public static function getMyOBService() {
	    $query = DB::table('observice')
            ->where('employee_id',\Auth::user()->id_employee)
            ->where('status','>=','0')
            ->orderBy('kodeOBS','desc')
            ->get();
        //dd($query);
	    return ($query);
    }

    public static function getAllMyTask() {
        $query = DB::table('observice')
            ->where('ob_id',\Auth::user()->id_employee)
            ->where('status','>=','0')
            ->orderBy('kodeOBS','desc')
            ->get();
        //dd($query);
        return ($query);
    }

    public static function getLogOBService() {
	    $query = DB::table('observice')
            ->get();

        foreach ($query as $e) {
            $em_name = DB::table('employee')
            ->join('observice','id_employee','=','employee_id')
            ->where('kodeOBS','=',$e->kodeOBS)
            ->value('name');
            $ob_name = DB::table('employee')
            ->join('observice','id_employee','=','ob_id')
            ->where('kodeOBS','=',$e->kodeOBS)
            ->value('name');

            $e->em_name = $em_name;
            $e->ob_name = $ob_name;
        }
	    return ($query);
    }

    public static function isOBNotAvailabe($time, $category, $ob_id) {
        $category_count = \App\OBService::where("category", "=", $category)
                        ->where("batch",'=',$time)
                        ->where("ob_id",'=',$ob_id)
                        ->count();
        
        if ($category_count >= 5) {
            return true;
        }
        else {
            return false;
        }
    }

    public static function getDetailOBS($kodeOBS) {
        $query = DB::table('observice')
            ->join('employee','id_employee','=','ob_id')
            ->where('kodeOBS','=',$kodeOBS)
            ->where('status','>=','0')
            ->first();

        

        //dd($query);
        return ($query);
    }
}
