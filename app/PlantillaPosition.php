<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Facades\Cache;
// use Illuminate\Database\Eloquent\SoftDeletes;

class PlantillaPosition extends Model
{
    // use SoftDeletes;
    public $connection = 'DTR_PAYROLL_CONNECTION';

    protected $dates = ['deleted_at'];
    protected $fillable = ['position_id' ,'item_no', 'sg_no' ,'office_code', 'old_position_name', 'year'];

    protected $primaryKey = 'pp_id';

    public function plantillas()
    {
        return $this->belongsTo(Plantilla::class, 'pp_id', 'pp_id');
    }
    public function position()
    {
        return $this->hasOne('App\Position', 'position_id', 'position_id');
    }
    public function office()
    {
        return $this->hasOne('App\Office', 'OfficeCode', 'office_code');
    }
    public function salaryAdjustment()
    {
        return $this->hasOne('App\SalaryAdjustment', 'pp_id', 'pp_id');
    }
    public function salary_grade()
    {
        return $this->hasOne(SalaryGrade::class, 'sg_no', 'sg_no');
    }
    public function PlantillaSchedule()
    {
        return $this->belongsTo(PlantillaSchedule::class, 'pp_id', 'pp_id');
    }

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::creating(function($record) {
    //         $record->pp_id = self::count() + 1;
    //         $record->pp_id = Setting::find('PP_id')->increment('Keyvalue');
    //     });
    // }
}
