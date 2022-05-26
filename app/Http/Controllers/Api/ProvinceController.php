<?php

namespace App\Http\Controllers\Api;

use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;


class ProvinceController extends Controller
{
    public function all(): Collection
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

    public function citiesByProvince(string $code): Collection
    {
        $province = Province::with(['cities'])->find($code);
        return $province->cities;
    }
}
