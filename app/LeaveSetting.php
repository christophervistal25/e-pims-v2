<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveSetting extends Model
{
    protected $fillable = [
        'vacation_increment',
        'sick_increment',
        'mandatory_per_year',
        'undertime_one_minute',
        'undertime_one_hour',
        'tardiness_one_minute',
        'tardiness_one_hour',
    ];
}
