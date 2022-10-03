<?php

use App\EmployeePersonnelFile;
use Illuminate\Support\Facades\Artisan;



Artisan::command('clear', function () {
    EmployeePersonnelFile::truncate();
});
