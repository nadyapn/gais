<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaidLeave extends Model
{
    protected $table = 'paidLeave';
    public $primaryKey  = 'selfservice_id';
    public $incrementing = false;
}
