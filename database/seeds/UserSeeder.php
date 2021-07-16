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
            'username' => 'tooshort01',
            'email' => 'testing@yahoo.com',
            'password' => bcrypt('christopher'),
            'employee_id' => Employee::first()->employee_id,
        ]);
    }
}
