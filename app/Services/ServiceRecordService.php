<?php

namespace App\Services;

use App\service_record as ServiceRecord;
use App\Setting;

class ServiceRecordService
{
    /**
     * It returns the first record in the database where the employee_id is equal to the employeeID
     * parameter and the service_to_date is null
     *
     * @param string employeeID The employee's ID
     * @return ServiceRecord A ServiceRecord object
     */
    public function getCurrentServiceRecord(string $employeeID): ?ServiceRecord
    {
        return ServiceRecord::where([
            'employee_id' => $employeeID,
        ])->whereNull('service_to_date')->first();
    }

    public function addNewRecord(array $data = []): ServiceRecord
    {
        return ServiceRecord::create([
            'id' => tap(Setting::where('Keyname', 'AUTONUMBER2')->first())->increment('Keyvalue', 1)->Keyvalue,
            'employee_id' => $data['employee_id'],
            'service_from_date' => $data['service_from_date'],
            'PosCode' => $data['PosCode'],
            'status' => $data['status'],
            'salary' => $data['salary'],
            'office_code' => $data['office_code'],
        ]);
    }
}
