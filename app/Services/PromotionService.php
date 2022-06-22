<?php
namespace App\Services;

use App\Setting;
use App\Promotion;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class PromotionService
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
                  'promotion_id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
                  'promotion_date' => Carbon::now(),
                  'employee_id' => $data['employee'],
                  'oldpp_id' => $oldPlantillaID,
                  'sg_no' => $data['salary_grade'],
                  'step_no' => $data['step'],
                  'sg_year' => $data['current_salary_grade_year'],
                  'newpp_id' => $data['position']
            ]);
      }
}