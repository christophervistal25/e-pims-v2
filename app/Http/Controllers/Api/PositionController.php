<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Position;

class PositionController extends Controller
{
    public function list()
    {
        return Position::get()->take(10);
    }
}
