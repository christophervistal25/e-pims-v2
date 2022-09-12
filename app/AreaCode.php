<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaCode extends Model
{
    public $connection = 'E_PIMS_CONNECTION';

    protected $primaryKey = 'area_code_id';

    public $table = 'Area_code';

    protected $fillable = ['description'];

    public function plantillaPosition()
    {
        return $this->hasOne(PlantillaPosition::class, 'area_code_id', 'area_code');
    }
}
