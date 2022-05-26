<?php

namespace Database\Seeders;

use App\City;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('E_PIMS_CONNECTION')->table('cities')->truncate();

        $data = glob(public_path() . DIRECTORY_SEPARATOR . 'data-need' . DIRECTORY_SEPARATOR . 'cities' . DIRECTORY_SEPARATOR . 'municipal.csv');
        $data = file_get_contents($data[0]);
        $data = array_filter(explode("\n", $data));

        foreach ($data as $key => $city) {

            // Excluse the header
            if ($key !== 0) {
                list($province_code, $code, $name, $type, $classification, $ruralOrUrban, $population) = explode("|", $city);
                if (strlen($province_code) !== strlen($code)) {
                    echo $province_code . " => " . $code . "\n";
                }
                City::create([
                    'province_code'         => (string) $province_code,
                    'code'                  => (string) $code,
                    'name'                  => Str::upper(str_replace("?", "ñ", utf8_decode($name))),
                    'income_classification' => $classification,
                    'population'            => str_replace("\r", "", $population)
                ]);
            }
        }
    }
}
