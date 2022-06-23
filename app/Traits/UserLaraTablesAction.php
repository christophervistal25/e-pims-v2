<?php

namespace App\Traits;

use Hashids\Hashids;

trait UserLaraTablesAction
{
    public static function laratablesCustomAction($user)
    {
        $employee_id = $user->Employee_id;
        $encodedID = (new HashIds)->encode($employee_id);
        return view('maintenance.user.actions', compact('encodedID', 'employee_id'))->render();
    }
}
