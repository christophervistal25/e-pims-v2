<?php

namespace App\Services;

use App\Office2;
use App\OfficeCharging;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class OfficeService
{
    public function get(): Collection
    {
        return Cache::rememberForever('OFFICES', function () {
            return OfficeCharging::get();
        });
    }

    public function office2(): Collection
    {
        return Cache::rememberForever('OFFICES_2', function () {
            return Office2::get();
        });
    }
}
