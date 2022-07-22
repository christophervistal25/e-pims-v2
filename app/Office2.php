<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office2 extends Model
{
    public $incrementing = false;

    protected $primaryKey = 'OfficeCode2';

    protected $keyType = 'string';

    public $table = 'Office2';

    public $connection = 'DTR_PAYROLL_CONNECTION';

    public $timestamps = false;

    protected $fillable = [
        'OfficeCode2',
        'Description',
        'OfficeShort',
        'OfficeHead',
        'PositionName',
        'Display',
        'OfficeHead2',
        'PositionName2',
        'isHospital',
    ];
}
