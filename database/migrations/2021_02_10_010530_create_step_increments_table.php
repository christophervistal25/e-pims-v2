<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepIncrementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_increments', function (Blueprint $table) {
            $table->id();
            $table->string('plantilla_id');
            $table->date('date_step_increment');
            $table->date('date_latest_appointment');
            $table->decimal('sg_no_from');
            $table->decimal('step_no_from');
            $table->decimal('sg_year_from');
            $table->decimal('salary_amount_from');
            $table->decimal('sg_no_to');
            $table->decimal('step_no_to');
            $table->decimal('sg_year_to');
            $table->decimal('salary_amount_to');
            $table->decimal('monthly_difference');
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
        Schema::dropIfExists('step_increments');
    }
}
