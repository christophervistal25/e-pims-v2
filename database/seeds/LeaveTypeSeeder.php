<?php

use App\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'SICK LEAVE',
                'code' => 'SL',
                'description' => 'granted on account of sicknes or disability of the employees or any member of their family.',
                'days_period' => 15,
                'applicable_gender' => 'female/male',
                'convertible_to_cash' => 'yes',
                'required_rendered_service' => 0,
                'editable' => 'yes',
            ],
            [
                'name' => 'VACATION LEAVE',
                'code' => 'VL',
                'description' => 'granted to employee for personal reasons, the approval of which is contingent upon the necessities of the service.',
                'days_period' => 15,
                'applicable_gender' => 'female/male',
                'convertible_to_cash' => 'yes',
                'required_rendered_service' => 0,
                'editable' => 'yes',
            ],
            [
                'name' => 'MANDATORY LEAVE',
                'code' => 'FL',
                'description' => 'employees with ten (10) days or more vacation leave shall be required to go on vacation leave whether continuous or intermittent for a minimum of five (5) working days annually',
                'days_period' => 5,
                'applicable_gender' => 'female/male',
                'convertible_to_cash' => 'no',
                'required_rendered_service' => 0,
                'editable' => 'no',
            ],
            [
                'name' => 'MATERNITY LEAVE',
                'code' => 'ML',
                'description' => 'Every woman in the government service who has rendered an aggregate of two (2) or more years of service shall in addition to the vacation and sick leave granted her, be entitled to maternity leave of sixty (60) calendar days with full pay',
                'days_period' => 60,
                'applicable_gender' => 'female',
                'convertible_to_cash' => 'no',
                'required_rendered_service' => 730,
                'editable' => 'no',
            ],
            [
                'name' => 'PATERNITY LEAVE',
                'code' => 'PL',
                'description' => 'Every married male employee is entitled to paternity leave of seven (7) working days for each of the first four (4) deliveries of his legitimate spouse',
                'days_period' => 7,
                'applicable_gender' => 'male',
                'convertible_to_cash' => 'no',
                'required_rendered_service' => 0,
                'category' => 'others',
                'editable' => 'no',
            ],
            [
                'name' => 'PARENTAL LEAVE',
                'code' => 'SOLO PARENT ACT',
                'description' => 'Days leave of absence granted to a parent who has the sole custody and responsibility of the child and who has rendered at least one (1) year of service regardless of employment status.',
                'days_period' => 7,
                'applicable_gender' => 'female/male',
                'convertible_to_cash' => 'no',
                'required_rendered_service' => 365,
                'category' => 'others',
                'editable' => 'no',
            ],
            [
                'name' => 'REHABILITATION LEAVE',
                'code' => 'RL',
                'description' => 'granted to employees for disability on account of injuries sustained while in the performance of duty. disability on account of injuries sustained while in the performance of duty',
                'days_period' => 183,
                'applicable_gender' => 'female/male',
                'convertible_to_cash' => 'no',
                'required_rendered_service' => 0,
                'editable' => 'no',
            ],
            [
                'name' => 'CHILDREN ACT OF 2004',
                'code' => 'CA 2004',
                'description' => strtolower('ANY WOMAN EMPLOYEE IN THE GOVERNMENT SERVICE, REGARDLESS OF EMPLOYMENT STATUS AND/OR WHOSE CHILD IS A VICTIM OF VIOLENCE AND WHOSE AGE IS BELOW EIGHTEEN OR ABOVE EIGHTEEN, BUT UNABLE TO CARE OF ONESELF, IS ENTITLED TO AVAIL OF THE TEN DAYS LEAVE.'),
                'days_period' => 10,
                'applicable_gender' => 'female',
                'convertible_to_cash' => 'no',
                'required_rendered_service' => 0,
                'editable' => 'no',
            ],
            [
                'name' => 'SPECIAL LEAVE BENEFITS FOR WOMEN',
                'code' => 'SLB',
                'description' => 'Any female employee shall be entitled to special leave of a maximum of two (2) months with full pay base on her gross monthly compensation, provided she has rendered at least six (6) months aggregate service in any or various government agencies for the last  12 months prior to undergoing surgery for gynaecological disorder',
                'days_period' => 60,
                'applicable_gender' => 'female',
                'convertible_to_cash' => 'no',
                'required_rendered_service' => 183,
                'editable' => 'no',
            ],
            [
                'name' => 'STUDY LEAVE',
                'code' => 'STL',
                'description' => 'a time-off from work not exceeding six (6) months with pay for the purpose of assistince qualified employees to prepare for their bar or board examinations to complete their master\'s degree',
                'days_period' => 183,
                'applicable_gender' => 'female/male',
                'convertible_to_cash' => 'no',
                'required_rendered_service' => 0,
                'category' => 'others',
                'editable' => 'no',
            ],
            [
                'name' => 'SPECIAL EMERGENCY LEAVE',
                'code' => 'SEL',
                'description' => '5 - day leave granted to those employees directly affected by natural calamities and disasters. (Office Order No. 2021-02)',
                'days_period' => 5,
                'applicable_gender' => 'female/male',
                'convertible_to_cash' => 'no',
                'required_rendered_service' => 0,
                'category' => 'others', 
                'editable' => 'no',
            ],
            [
                'name' => 'COVID-19 TREATMENT (LEAVE)',
                'code' => 'CTL',
                'description' => '',
                'days_period' => 14,
                'applicable_gender' => 'female/male',
                'convertible_to_cash' => 'no',
                'required_rendered_service' => 0,
                'category' => 'others',
                'editable' => 'no',
            ],
            [
                'name' => 'COVID-19 TREATMENT (QUARANTINE)',
                'code' => 'CTQ',
                'description' => '',
                'days_period' => 14,
                'applicable_gender' => 'female/male',
                'convertible_to_cash' => 'no',
                'required_rendered_service' => 0,
                'category' => 'others',
                'editable' => 'no',
            ],
        ];
        foreach($data as $index => $type) {
            
            LeaveType::create([
                'name'                      => $type['name'],
                'code'                      => $type['code'],
                'code_number'               => (10001) + ($index),
                'description'               => $type['description'],
                'days_period'               => $type['days_period'],
                'applicable_gender'         => $type['applicable_gender'],
                'convertible_to_cash'       => $type['convertible_to_cash'],
                'required_rendered_service' => $type['required_rendered_service'],
                // 'editable'                => $type['editable'],
                'editable'                => 'yes',
                'category'                => $type['category'] ?? '',
            ]);
        }
    }
}
