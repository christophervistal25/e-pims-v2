<?php

namespace App;

use App\Office;
use App\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    public $connection = 'E_PIMS_CONNECTION';
    public $table = 'plantillas';
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
        'year',
    ];

    protected $primaryKey = 'plantilla_id';

<<<<<<< HEAD

=======
    public function __construct() {
        $this->table = DB::connection($this->connection)->getDatabaseName() . '.dbo.' . $this->getTable();
    }
    
>>>>>>> 28d8afb9a0f3ad2e13bf2b113374fb83153baf59
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'Employee_id');
    }

    public function office()
    {
        return $this->hasOne(Office::class, 'OfficeCode', 'office_code');
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
        return $this->hasOne('App\PlantillaPosition', 'position_id', 'pp_id');
    }

    public function salary_adjustment() 
    {
        $this->primaryKey = 'employee_id';
        return $this->hasMany(SalaryAdjustment::class, 'employee_id', 'employee_id');
    }

    public function PlantillaSchedule()
    {
        return $this->belongsTo(PlantillaSchedule::class, 'plantilla_id', 'plantilla_id');
    }

    
}
