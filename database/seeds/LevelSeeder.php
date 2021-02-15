<?php

use Illuminate\Database\Seeder;
use App\Level;
class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array1 = ['','K','T','S','A'];
        $array2 = ['','Key positions refer to executive, managerial, and chief of division chief or equivalent position','Technical position refer to those directly performing the substantive and/or frontline services or functions of the agency as prescribed in its mandate','Support to technical positions refer to those which provide staff or technical support functions to key and technical positions but not perform frontline services/functions','Administrative positions refer to those performing general services, clerical, human resource management, financial management, records management, custodial and other related functions'];
        for($i = 1; $i <= 4; $i++){
            Level::create([
                'level_code' => $array1[$i],
                'level_name' => $array2[$i],
                'level_active' => 'active',
            ]);
        }
    }
}
