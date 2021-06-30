<?php

namespace App;
use App\Plantilla;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\SoftDeletes;
class Office extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $primaryKey = 'office_code';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'office_code',
        'office_name',
        'office_short_name',
        'office_head',
        'position_name',
        'office_address',
        'office_short_address',
    ];

    public const ID_PREFIX = '1';

    public static function boot()
    {
        parent::boot();

        self::creating(function ($office) {
            $maxOfficeCode         = self::max('office_code');
            $code                  = self::ID_PREFIX . str_pad(($maxOfficeCode + 1), 4, '0', STR_PAD_LEFT);
            // $office->office_code = $code;
        });

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
    public function service_record()
    {
        return $this->belongsTo(service_record::class, 'office_code', 'office_code');
    }

    public function plantilla_positions()
    {
        return $this->belongsTo(PlantillaPosition::class, 'office_code', 'office_code');
    }
    public function divisions()
    {
        return $this->belongsTo(Division::class, 'office_code', 'office_code');
    }


}
