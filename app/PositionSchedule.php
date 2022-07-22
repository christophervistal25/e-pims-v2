<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PositionSchedule extends Model
{
    public $connection = 'DTR_PAYROLL_CONNECTION';

    protected $dates = ['deleted_at'];

    protected $fillable = ['pos_id', 'pp_id', 'position_id', 'item_no', 'sg_no', 'office_code', 'old_position_name', 'year'];

    protected $primaryKey = 'pos_id';

    public function office()
    {
        return $this->hasOne('App\Office', 'office_code', 'office_code');
    }

    public function position()
    {
        return $this->hasOne('App\Position', 'position_id', 'position_id');
    }
}
