<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RefStatus extends Model
{
    protected $fillable = ['status_name'];

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
