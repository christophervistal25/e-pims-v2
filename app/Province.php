<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\ProvinceScope;

class Province extends Model
{
    public $incrementing = false;
    public    $primaryKey = 'code';
    protected $fillable   = ['code', 'name', 'income_classification', 'population'];

    public function cities()
    {
        return $this->hasMany('App\City', 'province_code', 'code');
    }

    public function barangay()
    {
        return $this->hasMany('App\Barangay', 'province_code', 'code');
    }

}
