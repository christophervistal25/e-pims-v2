<?php
namespace App\Pipes;

class PromotedFilterByOffice
{
    public function handle($records)
    {
        if(request()->office !== '*') {
            return $records->whereHas('new_plantilla_position', fn ($query) => $query->where('office_code', request()->office));
        }

        return $records;
    }
}
