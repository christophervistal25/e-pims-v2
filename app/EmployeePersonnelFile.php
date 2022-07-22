<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeePersonnelFile extends Model
{
    use HasFactory;

    public $connection = 'E_PIMS_CONNECTION';

    protected $fillable = ['file_id', 'date', 'file', 'file_size'];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'Employee_id', 'Employee_id');
    }

    public function file_details()
    {
        return $this->hasOne(PersonnelFile::class, 'id', 'file_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return date('F d, Y', strtotime($value));
    }

    public function getFileSizeAttribute($value)
    {
        $result = 0;
        $bytes = floatval($value);
        $arBytes = [
            0 => [
                'UNIT' => 'TB',
                'VALUE' => pow(1024, 4),
            ],
            1 => [
                'UNIT' => 'GB',
                'VALUE' => pow(1024, 3),
            ],
            2 => [
                'UNIT' => 'MB',
                'VALUE' => pow(1024, 2),
            ],
            3 => [
                'UNIT' => 'KB',
                'VALUE' => 1024,
            ],
            4 => [
                'UNIT' => 'B',
                'VALUE' => 1,
            ],
        ];

        foreach ($arBytes as $arItem) {
            if ($bytes >= $arItem['VALUE']) {
                $result = $bytes / $arItem['VALUE'];
                $result = str_replace('.', ',', strval(round($result, 2))).' '.$arItem['UNIT'];
                break;
            }
        }

        return $result;
    }
}
