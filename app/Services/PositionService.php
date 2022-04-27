<?php
namespace App\Services;

use App\Position;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

class PositionService
{
    public function get() : Collection
    {
        return Cache::rememberForever('POSITIONS', function () {
            return Position::get();
        });
    }
}