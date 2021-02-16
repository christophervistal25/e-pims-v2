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
            $table->bigInteger('plantilla_id');
            $table->date('date_step_increment');
            $table->date('date_latest_appointment');
            $table->integer('sg_no_from');
            $table->integer('step_no_from');
            $table->year('sg_year_from');
            //$table->decimal('salary_amount_from');
            $table->integer('sg_no_to');
            $table->integer('step_no_to');
            $table->year('sg_year_to');
            //$table->integer('salary_amount_to');
            //$table->decimal('monthly_difference',11,2);
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
