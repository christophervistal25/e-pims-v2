<?php

namespace App\Reports;

use App\Office;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlantillaDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'Id',
        'R_Id',
        'plantilla_id',
        'old_item_no',
        'item_no',
        'pp_id',
        'sg_no',
        'step_no',
        'salary_amount',
        'salary_amount_yearly',
        'sg_no_previous',
        'step_no_previous',
        'salary_amount_previous',
        'salary_amount_previous_yearly',
        'employee_id',
        'date_original_appointment',
        'date_last_promotion',
        'date_last_increment',
        'office_code',
        'status',
        'year',
    ];

    public $primaryKey = 'Id';

    protected $connection = 'E_PIMS_CONNECTION';

    public $table = 'EPims.dbo.Plantilla_Reports_Details';

    public function office()
    {
        return $this->hasOne(Office::class, 'office_code', 'office_code');
    }

}
