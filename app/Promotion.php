<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
      use HasFactory;
      protected $fillable = ['promotion_id', 'promotion_date', 'employee_id', 'oldpp_id', 'sg_no', 'step_no', 'sg_year', 'newpp_id'];
      public $timestamps = false;
}
