<?php

namespace App\Pipes;

use App\Setting;
use App\Plantilla;
use App\Promotion;

final class AddNewPromotionForEmployee
{
    public function handle($old)
    {
        return $this->create(plantilla:$old);
    }

    private function create(Plantilla $plantilla)
    {
        Promotion::create([
            'promotion_id'   => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
            'newpp_id'       => request()->position,
            'promotion_date' => request()->date_promotion,
            'employee_id'    => request()->employee,
            'oldpp_id'       => $plantilla->pp_id,
            'sg_no'          => request()->salary_grade,
            'step_no'        => 1,
            'sg_year'        => request()->salary_grade_year,
        ]);
    }
}
