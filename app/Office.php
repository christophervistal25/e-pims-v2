<?php

namespace App;
use App\Plantilla;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Office extends Model
{
    protected $fillable = [
        'office_code',
        'office_name',
        'office_short_name',
        'office_address',
        'office_short_address',
    ];

    public static function boot()
    {
        parent::boot();
        self::created(function() {
            Cache::forget('offices');
        });

        self::updated(function() {
            Cache::forget('offices');
        });

        self::saved(function() {
            Cache::forget('offices');
        });

        self::deleted(function() {
            Cache::forget('offices');
        });
    }

    public function office()
    {
        return $this->belongsTo(Plantilla::class, 'office_code', 'office_code');
    }
}
