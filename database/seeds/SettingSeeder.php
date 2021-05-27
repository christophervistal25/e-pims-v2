<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array1=[' Pursuant to Local Budget Circular No. 132, date _________ , implementing Republic Act No. 11466 dated __________; your salary is hereby adjusted effective _________, as follows:'];
        $count = count($array1) - 1;
        for($i = 0; $i <= $count; $i++){
            Setting::create([
                'key_id' => $i,
                'key_value' => $array1[$i],
            ]);
        }
    }
}
