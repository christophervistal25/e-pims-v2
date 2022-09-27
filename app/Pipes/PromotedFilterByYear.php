<?php
namespace App\Pipes;

class PromotedFilterByYear
{
    public function handle($records)
    {
        if(request()->year !== '*') {
            $records->where('sg_year', request()->year);
        }

        return $records;
    }
}
