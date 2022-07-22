<?php

namespace App\Http\Repositories;

use App\LeaveType;
use Illuminate\Database\Eloquent\Collection;

class LeaveTypeRepository
{
    public const GOOD_FOR_BOTH_GENDER = 'female/male';

    public function getLeaveTypesApplicableToGender(): Collection
    {
        return LeaveType::whereNot('category', null)->orderBy('category', 'ASC')->get(['leave_type_id', 'description', 'description2', 'applicable_gender', 'category']);
    }
}
