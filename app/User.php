<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use DB;

class User extends Authenticatable
{
    protected $table = 'employee';
    public $primaryKey  = 'id_employee';
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getOB($name) {
        if ($name == null) {
            $query = DB::table('employee')
            ->where('division','=','Office Boy')
            ->get();

            return ($query);
        }
        else {
            $query = DB::table('employee')
            ->where('division','=','Office Boy')
            ->where('name','=',$name)
            ->value('id_employee');

            return ($query);
        }
        
    }
}
