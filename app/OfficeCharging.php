<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfficeCharging extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $primaryKey = 'office_code';
    protected $keyType = 'string';
    public $table = 'Office';
    public $connection = 'DTR_PAYROLL_CONNECTION';
    public $timestamps = false;
}
