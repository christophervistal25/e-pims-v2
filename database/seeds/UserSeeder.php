<?php

namespace Database\Seeders;

use App\User;
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
            'Employee_id' => '4994',
            'username' => 'user',
            'password' => bcrypt('user'),
        ]);
    }
}
