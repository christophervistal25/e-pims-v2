<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreaLevel extends Model
{
    public $connection = 'E_PIMS_CONNECTION';

    protected $primaryKey = 'area_level_id';

    public $table = 'Area_level';

    protected $keyType = 'string';

    protected $fillable = ['description'];

    public function plantillaPosition()
    {
        return $this->hasOne(PlantillaPosition::class, 'area_level_id', 'area_level');
    }
}
