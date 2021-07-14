<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Holiday extends Model
{
    use SoftDeletes;

    public const TYPES = ['REGULAR', 'SPECIAL NON-WORKING', 'SPECIAL WORKING'];
    
    protected $fillable = ['name', 'date',  'type'];

    public function getTypeAttribute($value)
    {
        return Str::upper($value);
    }

    public function setTypeAttribute($value)
    {
        return $this->attributes['type'] = Str::upper($value);
    }
}
