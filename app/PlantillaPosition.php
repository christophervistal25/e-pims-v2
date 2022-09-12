<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// use Illuminate\Support\Facades\Cache;
// use Illuminate\Database\Eloquent\SoftDeletes;

class PlantillaPosition extends Model
{
    // use SoftDeletes;
    public $connection = 'E_PIMS_CONNECTION';

    protected $dates = ['deleted_at'];

    protected $fillable = ['pp_id', 'PosCode', 'item_no', 'sg_no', 'office_code', 'old_position_name', 'year'];

    public const REGIONS = [
        'Region 1',
        'Region 2',
        'Region 3',
        'Region 4',
        'Region 5',
        'Region 6',
        'Region 7',
        'Region 8',
        'Region 9',
        'Region 10',
        'Region 11',
        'Region 12',
        'NCR',
        'CAR',
        'CARAGA',
        'ARMM',
    ];

    public const AREA_TYPES = [
        'Region', 'Province', 'District', 'Municipality', 'Foreign Post',
    ];

    public const AREA_LEVELS = ['A', 'K', 'S', 'T'];


    public $keyType = 'string';

    protected $primaryKey = 'pp_id';

    public function plantillas()
    {
        return $this->belongsTo(Plantilla::class, 'pp_id', 'pp_id');
    }

    public function plantilla_history()
    {
        return $this->hasMany(Plantilla::class, 'pp_id', 'pp_id')->orderBy('year', 'DESC');
    }

    public function position()
    {
        return $this->hasOne(Position::class, 'PosCode', 'PosCode');
    }

    public function office()
    {
        return $this->hasOne('App\Office', 'office_code', 'office_code');
    }

    public function salaryAdjustment()
    {
        return $this->hasOne('App\SalaryAdjustment', 'pp_id', 'pp_id');
    }

    public function salary_grade()
    {
        return $this->hasMany(SalaryGrade::class, 'sg_no', 'sg_no')->orderBy('sg_year', 'DESC');
    }

    public function PlantillaSchedule()
    {
        return $this->belongsTo(PlantillaSchedule::class, 'pp_id', 'pp_id');
    }
    public function areaCode()
    {
        return $this->belongsTo(AreaCode::class, 'area_code', 'area_code_id');
    }

    public function areaType()
    {
        return $this->belongsTo(AreaType::class, 'area_type', 'area_type_id');
    }
    public function areaLevel()
    {
        return $this->belongsTo(AreaLevel::class, 'area_level', 'area_level_id');
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
