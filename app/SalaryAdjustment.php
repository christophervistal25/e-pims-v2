<?php

namespace App;

use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalaryAdjustment extends Model
{
    // public $connection = 'DTR_PAYROLL_CONNECTION';
    protected $dates = ['date_adjustment'];
    protected $fillable = [
        'employee_id',
        'office_code',
        'item_no',
        'pp_id',
        'date_adjustment',
        'sg_no',
        'step_no',
        'salary_previous',
        'salary_new',
        'salary_diff',
        'remarks',
    ];

    protected $appends = [
        'date_adjustment_year'
    ];

    public function __construct() {
        $this->table = DB::connection($this->connection)->getDatabaseName() . '.dbo.' . $this->getTable();
    }

    public function getDateAdjustmentYearAttribute()
    {
        return $this->date_adjustment->format('Y');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'Employee_id');
    }
    // public function position()
    // {
    //     return $this->belongsTo(Position::class, 'PosCode', 'position_id');
    // }
    public function plantillaPosition()
    {
        return $this->belongsTo(PlantillaPosition::class, 'pp_id', 'pp_id');
    }
    public function plantilla()
    {
        return $this->belongsTo(Plantilla::class, 'employee_id', 'employee_id');
    }

    public function serializeDate(DateTimeInterface  $date)
    {
        return $date->format('Y-m-d');
    }

    public function service_record()
    {
        return $this->hasOne('App\service_record', 'employee_id', 'employee_id');
    }
}

