<?php

use App\RefNameExtension;
use Illuminate\Database\Seeder;

class RefNameExtensionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $extensions = ['JR', 'SR', 'III'];
        foreach ($extensions as $extension) {
            RefNameExtension::create(['extension' => $extension]);
        }
    }
}
