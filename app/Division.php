<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use SoftDeletes;

    public $connection = 'E_PIMS_CONNECTION';

    public $table = 'Divisions';

    protected $dates = ['deleted_at'];

    protected $fillable = ['division_id', 'division_name', 'office_code'];

    protected $primaryKey = 'division_id';

    public function offices()
    {
        return $this->hasOne(Office::class, 'office_code', 'office_code');
    }
}
