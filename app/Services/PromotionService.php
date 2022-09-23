<?php

namespace App\Services;

use App\Plantilla;
use App\PlantillaPosition;
use App\Promotion;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PromotionService extends ServiceRecordService
{
    /**
     * It creates a new record in the `promotion` table, and it increments the `Keyvalue` column of
     * the `setting` table by 1
     *
     * @param int oldPlantillaID The old position of the employee
     * @param array data array of data to be inserted
     */
    public function store(int $oldPlantillaID, array $data = [])
    {
        Promotion::create([
            'promotion_id'   => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
            'promotion_date' => $data['date_promotion'],
            'employee_id'    => $data['employee'],
            'oldpp_id'       => $oldPlantillaID,
            'sg_no'          => $data['salary_grade'],
            'step_no'        => $data['step'],
            'sg_year'        => $data['salary_grade_year'],
            'newpp_id'       => $data['position'],
        ]);
    }

    /**
     * It updates the promotion and plantilla table
     *
     * @param Promotion promotion the promotion model
     * @param array data array of data from the form
     */
    public function changePositionInPromotion(Promotion $promotion, array $data = []): bool
    {
        $promotionUpdate = null;
        $plantillaUpdate = null;

        DB::transaction(function () use ($data, &$promotion, &$promotionUpdate, &$plantillaUpdate) {
            $plantillaPosition = PlantillaPosition::find($data['position']);
            $promotion->promotion_date = $data['last_promotion'];
            $promotion->newpp_id = $plantillaPosition->pp_id;
            $promotion->sg_no = $data['salary_grade'];
            $promotion->step_no = $data['step'];
            $promotion->sg_year = $data['current_salary_grade_year'];

            $plantilla = $promotion->new_plantilla_position->plantillas;
            $plantilla->item_no = $plantillaPosition->item_no;
            $plantilla->pp_id = $plantillaPosition->pp_id;
            $plantilla->sg_no = $data['salary_grade'];
            $plantilla->step_no = $data['step'];
            $plantilla->salary_amount = Str::remove(',', $data['salary_amount']);
            $plantilla->area_code = $data['area_code'];
            $plantilla->area_type = $data['area_type'];
            $plantilla->area_level = $data['area_level'];
            $plantilla->date_original_appointment = $data['original_appointment'];
            $plantilla->date_last_promotion = $data['last_promotion'];
            $plantilla->office_code = $data['office'];
            $plantilla->division_id = $data['division'];
            $plantilla->status = $data['status'];
            $plantilla->year = $data['current_salary_grade_year'];

            $promotionUpdate = $promotion->save();
            $plantillaUpdate = $plantilla->save();
        });

        return $promotionUpdate && $plantillaUpdate;
    }

    /**
     * It updates the plantilla table with the new data
     *
     * @param Promotion promotion the promotion object
     * @param array data
     */
    public function updatePromotion(Promotion $promotion, array $data = []): bool
    {
        $plantilla = $promotion->new_plantilla_position->plantillas;
        $plantilla->step_no = $data['step'];
        $plantilla->salary_amount = Str::remove(',', $data['salary_amount']);
        $plantilla->date_original_appointment = $data['original_appointment'];
        $plantilla->date_last_promotion = $data['last_promotion'];
        $plantilla->area_code = $data['area_code'];
        $plantilla->area_type = $data['area_type'];
        $plantilla->area_level = $data['area_level'];
        $plantilla->division_id = $data['division'];
        $plantilla->status = $data['status'];

        return $plantilla->save();
    }
}
