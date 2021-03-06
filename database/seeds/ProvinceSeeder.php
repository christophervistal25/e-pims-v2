<?php

use App\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = glob(public_path().DIRECTORY_SEPARATOR.'data-need'.DIRECTORY_SEPARATOR.'province'.DIRECTORY_SEPARATOR.'province.csv');
        $provinces = file_get_contents($provinces[0]);
        $provinces = array_filter(explode("\n", $provinces));

        // generate for sqlite database.
        foreach ($provinces as $province) {
            [$code, $name, $inter_level, $classification, $urban_or_rural, $population] = explode('|', $province);
            Province::create([
                'code' => (string) $code,
                'name' => $name,
                'income_classification' => $classification,
                'population' => str_replace("\r", '', $population),
            ]);
        }
    }
}
