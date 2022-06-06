<?php

namespace App;

use App\Office;
use App\Employee;
use App\Position;
use App\Plantilla;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StepIncrement extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'employee_id',
        'item_no',
        'position_id',
        'date_step_increment',
        'sg_no_from',
        'date_latest_appointment',
        'step_no_from',
        'salary_amount_from',
        'sg_no_to',
        'step_no_to',
        'salary_amount_to',
        'salary_diff',
        'office_code',
        'deleted_at',
        'created_at',
        'updated_at',
        'PosCode',
    ];


    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'Employee_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'PosCode', 'PosCode');
    }

    public function plantilla()
    {
        return $this->belongsTo(Plantilla::class, 'employee_id', 'employee_id');
    }

    public function service_record()
    {
        return $this->hasOne(service_record::class, 'employee_id', 'employee_id');
    }

    public function office()
    {
        return $this->belongsTo(Office::class, 'office_code', 'office_code');
    }
}
