<?php

namespace App\Pipes;

use App\PlantillaPosition;
use App\Setting;
use App\service_record as ServiceRecord;

final class AddPromotionToServiceRecord
{

    private function getPositionByPlantillaID(int $plantillaID) :string
    {
        return PlantillaPosition::find($plantillaID, ['PosCode'])?->PosCode;
    }

    public function handle($data)
    {
        ServiceRecord::create([
            'id'                => tap(Setting::where('Keyname', 'AUTONUMBER')->first())->increment('Keyvalue', 1)->Keyvalue,
            'employee_id'       => $data['promotion']->employee_id,
            'service_from_date' => $data['current']->getOriginal('date_last_promotion'),
            'service_to_date'   => request()->date_promotion,
            'PosCode'           => $this->getPositionByPlantillaID($data['current']->getOriginal('pp_id')),
            'status'            => $data['current']->getOriginal('status'),
            'salary'            => $data['current']->getOriginal('salary_amount'),
            'office_code'       => $data['current']->getOriginal('office_code'),
            'leave_without_pay' => null,
            'separation_date'   => null,
            'separation_cause'  => 'Promotion',
        ]);

        ServiceRecord::create([
            'id'                => tap(Setting::where('Keyname', 'AUTONUMBER')->first())->increment('Keyvalue', 1)->Keyvalue,
            'employee_id'       => $data['promotion']->employee_id,
            'service_from_date' => $data['promotion']->promotion_date,
            'PosCode'           => $data['promotion']->new_plantilla_position->PosCode,
            'status'            => $data['upcoming']->status,
            'salary'            => $data['upcoming']->salary_amount,
            'office_code'       => $data['upcoming']->office_code,
            'leave_without_pay' => null,
            'separation_date'   => null,
            'separation_cause'  => 'Promotion',
        ]);

        // Saving the current plantilla of employee before the promotion this plantilla is now vacant
        $data['current']->save();

        // Saving the new plantilla position of the employee
        $data['upcoming']->save();
    }

}
