<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'office_code',
        'office_name',
        'office_short_name',
        'office_address',
        'office_short_address',        
    ];
}
