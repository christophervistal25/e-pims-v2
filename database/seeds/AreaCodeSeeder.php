<?php

use Illuminate\Database\Seeder;
use App\AreaCode;
class AreaCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['','Region 1','Region 2','Region 3','Region 4','Region 5','Region 6','Region 7','Region 8','Region 9','Region 10','Region 11','Region 12','NCR','CAR','CARAGA','ARMM'];
        for($i = 1; $i <= 16; $i++){
            AreaCode::create([
                'area_code_code' => $i,
                'area_code_name' => $array[$i],
                'area_code_active' => 'active',
            ]);
        }
    }
}
