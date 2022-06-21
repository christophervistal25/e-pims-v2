<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
      use Notifiable;
      public $connection = 'DTR_PAYROLL_CONNECTION';
      public $table = 'EPIMS_Users';
      public $timestamps = false;
      public $primaryKey = 'Employee_id';

      /**
       * The attributes that are mass assignable.
       *
       * @var array
       */
      protected $fillable = [
            'username', 'password', 'Employee_id',
      ];

      /**
       * The attributes that should be hidden for arrays.
       *
       * @var array
       */
      protected $hidden = [
            'password', 'remember_token',
      ];


      public function employee()
      {
            return $this->hasOne(Employee::class, 'Employee_id', 'Employee_id');
      }

      public function notifications()
      {
            return $this->hasMany(Notification::class, 'employee_id', 'employee_id');
      }
}
