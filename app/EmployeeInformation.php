<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeInformation extends Model
{
    protected $table = 'employee_informations';
    protected $fillable = ['EmpIDNo', 'pos_code', 'office_code', 'photo'];

    public function position()
    {
        return $this->hasOne(Position::class, 'position_code', 'pos_code');
    }

    public function office()
    {
        return $this->hasOne(Office::class, 'office_code', 'office_code');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'EmpIDNo', 'employee_id');
    }
}
