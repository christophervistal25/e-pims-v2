<?php

namespace Database\Seeders;

use App\PlantillaPosition;
use App\Position;
use App\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlantillaPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $padmoOfficeCode = '10004';

        Position::get()->take(50)->each(function ($position) use ($padmoOfficeCode) {
            $data = DB::table('settings')->where('Keyname', 'PP_ID')->first();
            $id = (int) $data->Keyvalue;

            PlantillaPosition::create([
                'pp_id' => $id,
                'PosCode' => $position->PosCode,
                'sg_no' => $position->sg_no,
                'office_code' => $padmoOfficeCode,
                'year' => 2022,
                'item_no' => PlantillaPosition::count() + 1,
            ]);

            Setting::find('PP_id')->increment('Keyvalue');
        });
    }
}
