<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    protected $table = 'overtime';
    public $primaryKey  = 'selfservice_id';
    public $incrementing = false;
}
