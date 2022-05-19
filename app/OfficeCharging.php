<?php

namespace App;

use App\Office2;
use App\Plantilla;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Office extends Model
{
    public $incrementing = false;

    protected $primaryKey = 'OfficeCode';
    protected $keyType = 'string';
    public $table = 'Office';
    public $connection = 'DTR_PAYROLL_CONNECTION';
    public $timestamps = false;

}
