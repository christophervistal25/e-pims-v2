<?php

namespace App\Jobs;

use App\Setting;
use App\Plantilla;
use Carbon\Carbon;
use App\SalaryGrade;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class PlantillaScheduleJobs implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $currentYear;
    public $record;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($currentYear,$record)
    {
        $this->currentYear = $currentYear;
        $this->record = $record;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
            $currentData = $this->record->getAttributes();
            $currentData['plantilla_id'] = tap(Setting::where('Keyname', 'AUTONUMBER')->first())->increment('Keyvalue', 1)->Keyvalue;
            $currentData['year'] = $this->currentYear;

            $getsalaryResult = SalaryGrade::where('sg_no', $currentData['sg_no'])
                ->where('sg_year', Carbon::now()->format('Y'))
                ->first(['sg_step'.$currentData['step_no']]);

            $currentData['salary_amount_previous'] = $currentData['salary_amount'];
            $currentData['salary_amount_previous_yearly'] = $currentData['salary_amount_yearly'];

            $currentData['salary_amount'] = $getsalaryResult['sg_step'.$currentData['step_no']];
            $currentData['salary_amount_yearly'] = $getsalaryResult['sg_step'.$currentData['step_no']] * 12;

            unset($currentData['created_at']);
            unset($currentData['updated_at']);

            Plantilla::updateOrCreate([
                'year' => $currentData['year'],
                'status' => $currentData['status'],
                'office_code' => $currentData['office_code'],
                'employee_id' => $currentData['employee_id'],
                'pp_id' => $currentData['pp_id'],
            ], $currentData);
    }
}
