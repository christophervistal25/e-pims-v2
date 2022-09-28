<?php

namespace App;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PersonnelFile extends Model
{
    use HasFactory;

    public $connection = 'E_PIMS_CONNECTION';

    protected $fillable = ['id', 'name'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = tap(Setting::where('Keyname', 'AUTONUMBER')->first())->increment('Keyvalue', 1)->Keyvalue;
        });
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Str::upper($value),
            set: fn ($value) => Str::upper($value),
        );
    }
}
