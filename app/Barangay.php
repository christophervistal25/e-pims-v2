<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\BarangayScope;

class Barangay extends Model
{

    public $incrementing = false;
    protected $primaryKey   = 'barangay_code';
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
