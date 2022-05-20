<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office2 extends Model
{
    protected $primaryKey = 'OfficeCode';
    protected $keyType = 'string';
    public $table = 'Office';
    public $connection = 'DTR_PAYROLL_CONNECTION';
    public $timestamps = false;
}
