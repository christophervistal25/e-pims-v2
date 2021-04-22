<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class RefStatus extends Model
{
    protected $fillable = ['status_name'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($status) {
            $maxStatusCode     = self::max('stat_code');
            $code              = str_pad(($maxStatusCode + 1), 4, '0', STR_PAD_LEFT);
            $status->stat_code = $code;
            Cache::forget('status');
        });

        self::created(function() {
            Cache::forget('status');
        });

        self::updated(function() {
            Cache::forget('status');
        });

        self::saved(function() {
            Cache::forget('status');
        });

        self::deleted(function() {
            Cache::forget('status');
        });
    }

    /**
     * Set the reference status name to uppercase
     *
     * @param  string  $value
     * @return void
     */
    public function setStatusNameAttribute($value)
    {
        $this->attributes['status_name'] = strtoupper($value);
    }

}
