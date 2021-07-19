<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeLeaveApplication extends Model
{
    //

    public static function recordByStatus(string $status)
    {
        return self::where('approved_status', $status)->count();
    }
}
