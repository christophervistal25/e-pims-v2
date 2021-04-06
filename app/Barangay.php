<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Scopes\BarangayScope;

class Barangay extends Model
{

    public    $incrementing = false;
    protected $primaryKey   = 'code';
    protected $fillable = ['name', 'code', 'status'];


    public function province()
    {
        return $this->belongsTo('App\Province');
    }

    public function city()
    {
        return $this->belongsTo('App\City');
    }

}
