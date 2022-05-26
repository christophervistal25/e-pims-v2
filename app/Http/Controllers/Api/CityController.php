<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\City;

class CityController extends Controller
{
    public function getBarangays(string $code): Collection
    {
        $city = City::with(['barangays:city_code,barangay_code,name'])->find($code);
        return $city->barangays;
    }
}
