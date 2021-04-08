<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['position_id', 'position_name', 'position_code', 'salary_grade', 'position_short_name'];

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


