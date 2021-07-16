<?php
namespace App\Http\Repositories;

use App\LeaveType;
use Illuminate\Database\Eloquent\Collection;

class LeaveTypeRepository
{

    public function getLeaveTypesApplicableToGender(string $gender = 'male') : Collection
    {
        return LeaveType::where('applicable_gender', $gender)
                            ->orWhere('applicable_gender', 'female/male')
                            ->get(['id', 'name', 'code', 'description', 'days_period', 'required_rendered_service', 'applicable_gender', 'category']);
    }
}