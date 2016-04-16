<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reimbursement extends Model 
{
	public $primaryKey  = 'selfservice_id';
    //
    protected $table = 'reimbursement';
}
