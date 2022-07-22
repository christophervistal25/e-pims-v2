<?php

namespace App\Http\Controllers;

class CountryController extends Controller
{
    public function index()
    {
        return config('countries.all');
    }
}
