<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    public $incrementing = false;

    public $connection = 'E_PIMS_CONNECTION';

    protected $primaryKey = 'barangay_code';

    public $table = 'Barangays';

    protected $fillable = ['barangay_code', 'province_code', 'city_code', 'name', 'type', 'population', 'status'];

    public function province()
    {
        return $this->belongsTo('App\Province');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }
}
