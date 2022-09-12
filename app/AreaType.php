<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaType extends Model
{
    public $connection = 'E_PIMS_CONNECTION';

    protected $primaryKey = 'area_type_id';

    public $table = 'Area_type';

    protected $keyType = 'string';

    protected $fillable = ['description'];

    public function plantillaPosition()
    {
        return $this->hasOne(PlantillaPosition::class, 'area_type_id', 'area_type');
    }
}
