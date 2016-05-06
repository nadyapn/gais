<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaidLeave extends Model
{
	public $primaryKey  = 'selfservice_id';
    //
    protected $table = 'paidLeave';
}
