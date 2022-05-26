<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\CityScope;

class City extends Model
{
    public    $incrementing = false;
    protected $primaryKey   = 'city_code';
    public $keyType = 'string';
    public $table = 'Cities';
    protected $fillable     = ['name', 'status', 'province_code', 'city_code'];

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_code', 'code');
    }

    public function barangays()
    {
        return $this->hasMany(Barangay::class, 'city_code', 'city_code');
    }
}
