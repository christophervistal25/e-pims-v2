<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeVoluntaryWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_voluntary_works', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('name_and_address');
            $table->date('inclusive_date_from');
            $table->date('inclusive_date_to');
            $table->integer('no_of_hours');
            $table->string('position');
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
        Schema::dropIfExists('employee_voluntary_works');
    }
}
