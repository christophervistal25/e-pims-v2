<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Office;
class Plantilla extends Model
{
    public const REGIONS = [
        'Region 1',
        'Region 2',
        'Region 3',
        'Region 4',
        'Region 5',
        'Region 6',
        'Region 7',
        'Region 8',
        'Region 9',
        'Region 10',
        'Region 11',
        'Region 12',
        'NCR',
        'CAR',
        'CARAGA',
        'ARMM',
    ];
    protected $fillable = [
        'plantilla_id',
        'old_item_no',
        'item_no',
        'position_id',
        'position_ext',
        'sg_no',
        'step_no',
        'salary_amount',
        'employee_id',
        'area_code',
        'area_type',
        'area_level',
        'date_original_appointment',
        'date_last_promotion',
        'office_code',
        'division_id',
        'status',
    ];

    protected $primaryKey = 'plantilla_id';

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }

    public function office()
    {
        return $this->hasOne(Office::class, 'office_code', 'office_code');
    }

    public function positions()
    {
        return $this->hasOne(Position::class, 'position_id', 'position_id');
    }

    public function position()
    {
        return $this->hasOne('App\Position', 'position_id', 'pp_id');
    }
    public function plantillaPosition()
    {
        return $this->hasOne('App\PlantillaPosition', 'pp_id', 'pp_id');
    }
    public function salary_adjustment()
    {
        return $this->hasOne(SalaryAdjustment::class, 'employee_id', 'employee_id');
    }
}
