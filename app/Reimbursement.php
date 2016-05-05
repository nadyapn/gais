<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reimbursement extends Model 
{
    protected $table = 'reimbursement';
    public $primaryKey  = 'selfservice_id';
    public $incrementing = false;
}
