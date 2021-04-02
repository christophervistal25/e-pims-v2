<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeIssuedID extends Model
{
    protected $fillable = [
        'id_type',
        'id_no',
        'date',
        'place_of_issuance'
    ];
}
