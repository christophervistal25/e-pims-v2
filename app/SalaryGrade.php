<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryGrade extends Model
{
    public $connection = 'E_PIMS_CONNECTION';

    protected $fillable = [
        'sg_no',
        'sg_step1',
        'sg_step2',
        'sg_step3',
        'sg_step4',
        'sg_step5',
        'sg_step6',
        'sg_step7',
        'sg_step8',
        'sg_year',
    ];

    public function position()
    {
        return $this->belongsTo(Position::class, 'sg_no', 'sg_no');
    }

    public function plantilla_position()
    {
        return $this->belongsTo(PlantillaPosition::class, 'sg_no', 'sg_no');
    }
}
