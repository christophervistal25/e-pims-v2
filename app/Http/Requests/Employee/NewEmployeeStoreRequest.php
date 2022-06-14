<?php

namespace App\Http\Requests\Employee;

use App\Rules\StoreTrapfullname;
use Illuminate\Foundation\Http\FormRequest;

class NewEmployeeStoreRequest extends FormRequest
{
      /**
       * Determine if the user is authorized to make this request.
       *
       * @return bool
       */
      public function authorize()
      {
            return true;
      }

      /**
       * Get the validation rules that apply to the request.
       *
       * @return array
       */
      public function rules()
      {
            $rules = [
                  'firstName'                    => ['required', new StoreTrapfullname()],
                  'middleName'                   => ['nullable', new StoreTrapfullname()],
                  'lastName'                     => ['required', new StoreTrapfullname()],
                  'extension'                    => ['nullable', new StoreTrapfullname()],
                  'dateOfBirth'                  => ['required', 'date', new StoreTrapfullname()],
                  'designation.position_code'    => 'required|exists:positions,position_code',
                  'officeAssignment.office_code' => 'required|exists:offices,office_code',
                  'employmentStatus'             => 'required',
                  'employmentStatus.stat_code'   => 'required_with:employmentStatus|exists:ref_statuses,stat_code',
                  'pagibigMidNo'                 => 'nullable',
                  'philhealthNo'                 => 'nullable',
                  'sssNo'                        => 'nullable|unique:employees,sss_no',
                  'tinNo'                        => 'nullable|unique:employees,tin_no',
                  'username'                     => 'required|unique:users,username',
                  'email'                        => 'required|unique:users,email',
                  'password'                     => 'required|min:6|max:16|same:retypePassword',
                  'retypePassword'               => 'required|min:6|max:16',
            ];


            return $rules;
      }

      public function attributes()
      {
            return [
                  'employmentStatus.stat_code'   => 'employment status',
                  'designation.position_code'    => 'designation',
                  'officeAssignment.office_code' => 'office',
                  'retypePassword' => 'password confirmation'
            ];
      }
}
