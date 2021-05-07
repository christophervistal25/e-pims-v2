<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefNameExtension extends Model
{
    protected $fillable = ['extension'];
    public $timestamps = false;
}
