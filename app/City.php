<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\CityScope;

class City extends Model
{
    public    $incrementing = false;
    protected $primaryKey   = 'code';
    protected $fillable     = ['name', 'status', 'province_code', 'code'];

    public function province()
    {
        return $this->belongsTo('App\Province', 'province_code', 'code');
    }

    public function barangays()
    {
        return $this->hasMany('App\Barangay', 'city_code', 'code');
    }



}
