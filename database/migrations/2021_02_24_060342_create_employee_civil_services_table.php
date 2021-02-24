<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeCivilServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_civil_services', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('career_service');
            $table->decimal('rating', 11, 2);
            $table->date('date_of_examination');
            $table->text('place_of_examination');
            $table->string('license_number');
            $table->date('date_of_validitiy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_civil_services');
    }
}
