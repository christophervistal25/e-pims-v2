<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveIncrement extends Model
{
    protected $fillable = [
        'leave_type',
        'increment',
        'description',
    ];

    public function leave()
    {
        return $this->belongsTo(LeaveType::class, 'id', 'leave_type_id');
    }
}
