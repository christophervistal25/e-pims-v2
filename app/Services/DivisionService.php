<?php

namespace App\Services;

use App\Division;
use Illuminate\Database\Eloquent\Collection;

class DivisionService
{
    /**
     * It returns a collection of divisions where the office code is equal to the office code passed in.
     *
     * @param string office The office code of the office you want to get the divisions for.
     * @return A collection of divisions.
     */
    public function getDivisionByOffice(string $office)
    {
        return Division::where('office_code', $office)->get();
    }
}
