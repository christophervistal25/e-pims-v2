<?php

namespace App\Services;

use App\Position;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class PositionService
{
    public function get(): Collection
    {
        return Cache::rememberForever('POSITIONS', function () {
            return Position::get();
        });
    }
}
