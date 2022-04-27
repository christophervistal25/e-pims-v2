<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = ['title', 'description', 'employee_id', 'from_employee_id', 'link', 'view'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
