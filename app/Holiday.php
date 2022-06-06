<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Holiday extends Model
{
    use SoftDeletes;

    public $connection = 'DTR_PAYROLL_CONNECTION';

    public const TYPES = ['REGULAR', 'SPECIAL NON-WORKING', 'SPECIAL WORKING'];

    protected $fillable = ['name', 'date',  'type'];

    protected $appends = ['title', 'date_string'];

    public function getTypeAttribute($value)
    {
        return Str::upper($value);
    }

    public function setTypeAttribute($value)
    {
        return $this->attributes['type'] = Str::upper($value);
    }

    public function getTitleAttribute()
    {
        return $this->name;
    }


    public function getDateStringAttribute()
    {
        return Carbon::parse(date('Y') . '-' . $this->date)->format('l jS \of F Y');
    }
}
