<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Office;
class Plantilla extends Model
{
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
    protected $primaryKey = 'plantilla_id';

    public function position()
    {
        return $this->hasOne('App\Position', 'position_id', 'position_id');
    }
}
