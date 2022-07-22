<?php

namespace App\Http\Controllers;

use App\PersonnelFile;

class PersonnelFile201Controller extends Controller
{
    public function index()
    {
        $peronnelFiles = PersonnelFile::get();

        return view('personnel-file.index', [
            'peronnelFiles' => $peronnelFiles,
            'class' => 'mini-sidebar',
        ]);
    }
}
