<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [    
        'key_id',
        'key_value',
    ];
    protected $primaryKey = 'key_id';
}
