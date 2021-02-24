<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $primaryKey = 'employee_id';

    protected $fillable = [
        'employee_id', 'old_item_no','lastname','firstname','middlename','sex','employee_ids','date_birth','status',
    ];
    public function plantilla()
    {
        return $this->hasMany(Plantilla::class);
    }

    public function information()
    {
        return $this->hasOne(EmployeePersonalInformation::class);
    }
}
