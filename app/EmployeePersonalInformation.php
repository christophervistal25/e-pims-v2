<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePersonalInformation extends Model
{
    public function employee()
    {
        return $this->belongsTo(Employe::class);
    }
}
