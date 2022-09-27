<?php

namespace App\Pipes;

use App\Promotion;

final class PromotedEmployees
{
    public function handle()
    {
        return Promotion::with(['employee', 'old_plantilla_position', 'old_plantilla_position.position', 'new_plantilla_position.position']);
    }
}
