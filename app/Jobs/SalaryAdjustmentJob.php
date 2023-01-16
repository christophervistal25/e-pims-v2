<?php

namespace App\Jobs;

use App\Setting;
use App\Plantilla;
use Carbon\Carbon;
use App\SalaryGrade;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SalaryAdjustmentJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $newAdjustments;
    public $remark;
    public $dateAdjustment;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($newAdjustments,$remark,$dateAdjustment)
    {
        $this->newAdjustments = $newAdjustments;
        $this->remark = $remark;
        $this->dateAdjustment = $dateAdjustment;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $salaryDiff = $this->newAdjustments['salary_amount'] - $this->newAdjustments['salary_amount_previous'];
        $dateCheck = $this->remark;
        if ($dateCheck == '') {
            $remarks = 'Salary Adjustment';
        } else {
            $remarks = $this->remark;
        }
        DB::table('EPims.dbo.salary_adjustments')->insert(
            [
                'id' => tap(Setting::where('Keyname', 'AUTONUMBER')->first())->increment('Keyvalue', 1)->Keyvalue,
                'employee_id' => $this->newAdjustments['employee_id'],
                'office_code' => $this->newAdjustments['office_code'],
                'item_no' => $this->newAdjustments['item_no'],
                'pp_id' => $this->newAdjustments['pp_id'],
                'date_adjustment' => $this->dateAdjustment,
                'sg_no' => $this->newAdjustments['sg_no'],
                'step_no' => $this->newAdjustments['step_no'],
                'old_sg_no' => $this->newAdjustments['sg_no'],
                'old_step_no' => $this->newAdjustments['step_no'],
                'salary_previous' => $this->newAdjustments['salary_amount_previous'],
                'salary_new' => $this->newAdjustments['salary_amount'],
                'salary_diff' => $salaryDiff,
                'remarks' => $remarks,
                'created_at' => Carbon::now(),
                'deleted_at' => null,
            ]
        );

        /* Updating the current service record of the employee soon to be previous record. */
        $serviceToDate = Carbon::parse($this->dateAdjustment)->subDays(1);
        DB::table('EPims.dbo.service_records')->select('employee_id', 'service_from_date', 'service_to_date')->where('employee_id', $this->newAdjustments['employee_id'])->where('service_to_date', null)->latest('service_from_date')
        ->update(['service_to_date' => $serviceToDate]);

        DB::table('EPims.dbo.service_records')->insert(
            [
                'id' => tap(Setting::where('Keyname', 'AUTONUMBER')->first())->increment('Keyvalue', 1)->Keyvalue,
                'employee_id' => $this->newAdjustments['employee']['Employee_id'],
                'service_from_date' => $this->dateAdjustment,
                'PosCode' => $this->newAdjustments['plantilla_positions']['PosCode'],
                'status' => $this->newAdjustments['status'],
                'salary' => $this->newAdjustments['salary_amount'],
                'office_code' => $this->newAdjustments['office_code'],
                'separation_cause' => $remarks,
                'created_at' => Carbon::now(),
            ]
        );
    }
}
