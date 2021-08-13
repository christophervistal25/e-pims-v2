<?php
namespace App\Http\Repositories;

use App\LeaveType;
use Illuminate\Database\Eloquent\Collection;

class LeaveTypeRepository
{
    public const SICK_LEAVE = 10001;
    public const VACATION_LEAVE = 10002;

    public const GOOD_FOR_BOTH_GENDER = 'female/male';

    public function getLeaveTypesApplicableToGender(string $gender = 'male') : Collection
    {
        return LeaveType::where('applicable_gender', $gender)
                            ->orWhere('applicable_gender', self::GOOD_FOR_BOTH_GENDER)
                            ->get(['id', 'name', 'code', 'code_number', 'description', 'days_period', 'required_rendered_service', 'applicable_gender', 'category']);
    }
}