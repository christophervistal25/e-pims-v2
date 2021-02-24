<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $incrementing = false;
    protected $primaryKey = 'employee_id';

    protected $fillable = [
        'employee_id', 'old_item_no','lastname','firstname','middlename','sex','employee_ids','date_birth','status',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function($employee) {
            $employee->employee_id = str_pad($employee->count() + 1, 7, 0, STR_PAD_LEFT);
        });
    }


    public function plantilla()
    {
        return $this->hasMany(Plantilla::class);
    }

    public function information()
    {
        return $this->hasOne(EmployeePersonalInformation::class);
    }
}
