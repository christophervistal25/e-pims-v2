<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Position;
use Illuminate\Support\Facades\Cache;

class PositionController extends Controller
{
    public function list()
    {
        return Cache::rememberForever('positions', function () {
            return Position::get()->take(10);
        });
    }
}
