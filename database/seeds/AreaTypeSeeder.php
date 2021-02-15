<?php

use Illuminate\Database\Seeder;
use App\AreaType;
class AreaTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array1 = ['','R','P','D','M','F'];
        $array2 = ['','Region','Province','District','Municipality','Foreign Post'];
        for($i = 1; $i <= 5; $i++){
            AreaType::create([
                'area_type_code' => $array1[$i],
                'area_type_name' => $array2[$i],
                'area_type_active' => 'active',
            ]);
        }
    }
}
