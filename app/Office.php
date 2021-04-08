<?php

namespace App;
use App\Plantilla;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $fillable = [
        'office_code',
<<<<<<< HEAD
        'office_name'
    ];
    public function office()
    {
        return $this->belongsTo(Plantilla::class, 'office_code', 'office_code');
    }
=======
        'office_name',
        'office_short_name',
        'office_address',
        'office_short_address',        
    ];
>>>>>>> salaryadjustment
}
