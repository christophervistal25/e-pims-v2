<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'Keyname',
        'Keyvalue',
    ];

    public $timestamps = false;
    public $incrementing = false;
    public $primaryKey = 'Keyname';
    public static $id = 0;

    public static function prepare()
    {
        self::$id = self::where('Keyname', 'AUTONUMBER2')->Keyvalue;
    }

    public static function execute()
    {
        return self::where('Keyname', 'AUTONUMBER2')->first()->increment('Keyvalue', self::$id++)->Keyvalue;
    }
}
