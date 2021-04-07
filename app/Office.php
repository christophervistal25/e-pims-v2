<?php

namespace App;
use App\Plantilla;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'office_code',
        'office_name'
    ];
    public function office()
    {
        return $this->belongsTo(Plantilla::class, 'office_code', 'office_code');
    }
}
