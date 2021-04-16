<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Office;

class OfficeController extends Controller
{
    public function list()
    {
        return Office::get(['office_code', 'office_name','office_short_name']);
    }
}
