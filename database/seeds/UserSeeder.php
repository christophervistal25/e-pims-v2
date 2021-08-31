<?php

use App\User;
use App\Employee;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'user',
            'email' => 'user@yahoo.com',
            'password' => bcrypt('user'),
            'employee_id' => Employee::get()[1]->employee_id,
        ]);
    }
}
