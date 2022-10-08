<?php

namespace App\Pipes;

use App\Setting;
use App\Plantilla;
use App\Promotion;

final class AddNewPromotionForEmployee
{
    public function handle($data)
    {
        $promotion = $this->create(plantillas:$data);
        $data['promotion'] = $promotion->load(['new_plantilla_position', 'new_plantilla']);
        return $data;
    }

    private function create(array $plantillas)
    {
        return Promotion::create([
                'promotion_id'   => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
                'newpp_id'       => request()->position,
                'promotion_date' => request()->date_promotion,
                'employee_id'    => request()->employee,
                'oldpp_id'       => $plantillas['upcoming']['pp_id'],
                'sg_no'          => request()->salary_grade,
                'step_no'        => 1,
                'sg_year'        => request()->salary_grade_year,
            ]);
    }
}
