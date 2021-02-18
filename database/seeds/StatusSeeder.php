<?php

use Illuminate\Database\Seeder;
use App\Status;
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array1 = ['','Casual','Contractual','Coterminous','Coterminous-Temporary','Permanent','Provisional','Regular Permanent','Substitute','Temporary','Elected'];
        for($i = 1; $i <= 10; $i++){
            Status::create([
                'statuse_name' => $array1[$i],
                'statuse_active' => 'active',
            ]);
        }
    }
}
