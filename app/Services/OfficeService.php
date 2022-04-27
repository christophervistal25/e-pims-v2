<?php
namespace App\Services;

use App\Office;
use App\Office2;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Collection;

class OfficeService
{
    public function get() : Collection
    {
        return Cache::rememberForever('OFFICES', function () {
            return Office::get();
        });
    }

    public function office2() : Collection
    {
        return Cache::rememberForever('OFFICES_2', function () {
            return Office2::get();
        });
    }
}