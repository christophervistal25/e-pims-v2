<?php

use App\Office;
use App\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = Office::get();
        foreach($offices as $index => $office) {
            Office::get()->each(function ($office) use($index) {
                Division::create([
                    'division_name' => 'Division ' . $index,
                    'office_code' => $office->office_code
                ]);
            });
        }
        
    }
}
