<?php

namespace App\Http\Controllers;

use App\User;
use Freshbitsweb\Laratables\Laratables;

class UserController extends Controller
{
    public function list()
    {
        return Laratables::recordsOf(User::class);
    }

    public function index()
    {
        return view('maintenance.user.index');
    }
}
