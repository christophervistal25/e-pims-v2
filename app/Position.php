<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['position_name', 'position_id', 'position_code' ,'position_name', 'sg_no' ,'position_short_name'];

    protected $primaryKey = 'position_id';

    public function plantillas()
    {
        return $this->belongsTo(Plantilla::class, 'position_id', 'position_id');
    }

    public function salary_grade()
    {
        return $this->hasOne(SalaryGrade::class, 'sg_no', 'salary_grade');
    }
}


