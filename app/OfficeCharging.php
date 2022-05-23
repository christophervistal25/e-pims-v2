<?php

namespace App;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
>>>>>>> fd1f86f743031e27de1f1a4782a81c2af3145fbe
use Illuminate\Database\Eloquent\Model;

class OfficeCharging extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $primaryKey = 'office_code';
    protected $keyType = 'string';
    public $table = 'Office';
    public $connection = 'DTR_PAYROLL_CONNECTION';
    public $timestamps = false;
}
