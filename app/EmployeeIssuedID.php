<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeIssuedID extends Model
{
    protected $fillable = [
        'id',
        'employee_id',
        'id_type',
        'id_no',
        'date',
        'place_of_issuance',
    ];

    public $table = 'employee_issued_i_d_s';
    public $connection = 'E_PIMS_CONNECTION';
}
