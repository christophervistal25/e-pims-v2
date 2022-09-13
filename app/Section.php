<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public $connection = 'E_PIMS_CONNECTION';

    protected $primaryKey = 'section_id';

    public $table = 'Sections';

    public function plantillaPosition()
    {
        return $this->hasOne(PlantillaPosition::class, 'section_id', 'section_id');
    }

}
