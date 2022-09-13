<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    public $incrementing = false;

    protected $primaryKey = 'office_code';

    protected $keyType = 'string';

    public $table = 'Offices';

    public $connection = 'E_PIMS_CONNECTION';

    public $timestamps = false;

    protected $fillable = [
        'office_code',
        'office_name',
        'office_short_name',
        'office_address',
        'office_short_address',
        'position_name',
    ];

    public function plantilla()
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

    // public function plantilla()
    // {
    //     return $this->hasOne(Plantilla::class, 'office_code', 'office_code');
    // }

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

    public function step()
    {
        return $this->hasOne(StepIncrement::class, 'office_code', 'office_code');
    }
}
