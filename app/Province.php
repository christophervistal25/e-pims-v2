<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    public $connection = 'E_PIMS_CONNECTION';
    
    public $incrementing = false;

    public $primaryKey = 'province_code';

    protected $fillable = ['province_code', 'name', 'income_classification', 'population'];

    public $table = 'Provinces';

    public function cities()
    {
        return $this->hasMany('App\City', 'province_code', 'province_code');
    }

    public function barangay()
    {
        return $this->hasMany('App\Barangay', 'province_code', 'code');
    }
}
