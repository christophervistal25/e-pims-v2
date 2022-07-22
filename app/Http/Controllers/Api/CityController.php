<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;

class CityController extends Controller
{
    public function getBarangays(string $code): Collection
    {
        $city = City::with(['barangays:city_code,barangay_code,name'])->find($code);

        return $city->barangays;
    }
}
