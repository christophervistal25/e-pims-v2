<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Province;
use Illuminate\Support\Collection;

class ProvinceController extends Controller
{
    public function provinces(): Collection
    {
        return Province::orderBy('name')->get(['province_code', 'name']);
    }

    public function show(string $code): Province
    {
        return Province::find($code);
    }

    public function allWithCityAndBarangay(): Collection
    {
        return Province::with(['cities:code,province_code,name', 'barangay:code,province_code,city_code,name'])->get(['code', 'name']);
    }

    public function allWithBarangay()
    {
        return Province::with('barangay:code,province_code,city_code,name')->get(['code', 'name']);
    }

    public function allWithCity()
    {
        return Province::with('cities:code,province_code,name')->get(['code', 'name']);
    }

    public function getCities(string $code): Collection
    {
        $province = Province::with(['cities'])->find($code);

        return $province->cities;
    }
}
