<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $connection = 'E_PIMS_CONNECTION';

    public $table = 'Sections';

    protected $dates = ['deleted_at'];

    protected $fillable = ['section_id', 'section_name', 'division_id'];

    protected $primaryKey = 'section_id';

    public function divisions()
    {
        return $this->hasOne(Division::class, 'division_id', 'division_id');
    }
}
