<?php

namespace Database\Seeders;

use App\Barangay;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class BarangaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection('E_PIMS_CONNECTION')->table('barangays')->truncate();

        $data = glob(public_path().DIRECTORY_SEPARATOR.'data-need'.DIRECTORY_SEPARATOR.'barangays'.DIRECTORY_SEPARATOR.'barangay.csv');
        $data = file_get_contents($data[0]);
        $data = array_filter(explode("\n", $data));

        foreach ($data as $index => $barangay) {
            [$province_code, $municipal_code, $code, $name, $type, $income_clssification, $ruralOrUrban, $population] = explode('|', $barangay);
            Barangay::create([
                'province_code' => (string) $province_code,
                'city_code' => (string) $municipal_code,
                'barangay_code' => (string) $code,
                'name' => Str::upper(str_replace('?', 'ñ', utf8_decode($name))),
                'type' => $ruralOrUrban === 'U' ? 'Urban' : 'Rural',
                'population' => str_replace("\r", '', $population),
            ]);
        }
    }
}
