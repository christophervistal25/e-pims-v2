<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Office;
use Illuminate\Support\Facades\Cache;


class OfficeController extends Controller
{
    public function list()
    {
        return Cache::rememberForever('offices', function () {
            return Office::get(['office_code', 'office_name','office_short_name']);
        });
    }
}
