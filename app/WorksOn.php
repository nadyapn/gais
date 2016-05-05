<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use DB;

class WorksOn extends Model
{
    public $table = 'works_on';
    public $primaryKey  = ['id_employee', 'id_project'];

    public static function getWorksOn() {
	    $query = DB::table('works_on')
	                ->join('project','project.id','=','works_on.id_project')
	                ->select('name')
	                ->where('works_on.id_employee',\Auth::user()->id_employee)
	                ->get();

	    return ($query);
    }
}
