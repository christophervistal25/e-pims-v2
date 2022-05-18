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

    protected $primaryKey = 'office_code';
    protected $keyType = 'string';
    public $table = 'Offices';
    public $connection = 'DTR_PAYROLL_CONNECTION';
    public $timestamps = false;

    protected $fillable = [
        'office_code',
        'office_name',
        'office_short_name',
        'office_address',
        'office_short_address',
        'position_name',
    ];

    public function office()
    {
        return $this->belongsTo(Plantilla::class, 'office_code', 'office_code');
    }

    public function desc()
    {
        return $this->hasOne(Office2::class, 'OfficeCode2', 'OfficeCode2');
    }

    public function PlantillaSchedule()
    {
        return $this->belongsTo(PlantillaSchedule::class, 'office_code', 'office_code');
    }

    public function service_record()
    {
        return $this->belongsTo(service_record::class, 'office_code', 'office_code');
    }

    public function plantilla_positions()
    {
        return $this->belongsTo(PlantillaPosition::class, 'office_code', 'office_code');
    }
    public function divisions()
    {
        return $this->belongsTo(Division::class, 'office_code', 'office_code');
    }

    public function employee_information()
    {
        return $this->belongsTo(Employee::class, 'office_code', 'office_code');
    }

    public function PositionSchedule()
    {
        return $this->belongsTo(PositionSchedule::class, 'office_code', 'office_code');
    }
}
