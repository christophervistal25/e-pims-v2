<?php

namespace App\Services;

use App\Office;
use App\Office2;
use App\OfficeCharging;
use Illuminate\Support\Collection;

class OfficeService
{
    public function offices() :Collection
    {
        return Office::get();
    }

    public function get(): Collection
    {
        return OfficeCharging::get();
    }

    public function office2(): Collection
    {
        return Office2::get();
    }
}
