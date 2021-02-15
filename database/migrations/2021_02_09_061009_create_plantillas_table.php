<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantillasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plantillas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plantilla_id');
            $table->bigInteger('old_item_no');
            $table->bigInteger('new_item_no');
            $table->string('position_title');
            $table->string('position_title_ext');
            $table->bigInteger('employee_id');
            $table->bigInteger('current_salary_grade');
            $table->string('current_step_no');
            $table->bigInteger('current_salary_amount');
            $table->bigInteger('office_code');
            $table->bigInteger('division_code');
            $table->date('date_original_appointment');
            $table->date('date_last_promotion');
            $table->string('status');
            $table->string('dbm_previous_sg_no');
            $table->string('dbm_previous_step_no');
            $table->year('dbm_previous_sg_year');
            $table->bigInteger('dbm_previous_amount');
            $table->string('dbm_current_sg_no');
            $table->string('dbm_current_step_no');
            $table->year('dbm_current_sg_year');
            $table->bigInteger('dbm_current_amount');
            $table->string('csc_previous_sg_no');
            $table->string('csc_previous_step_no');
            $table->year('csc_previous_sg_year');
            $table->bigInteger('csc_previous_amount');
            $table->string('csc_current_sg_no');
            $table->string('csc_current_step_no');
            $table->year('csc_current_sg_year');
            $table->bigInteger('csc_current_amount');
            $table->bigInteger('area_code');
            $table->bigInteger('area_type');
            $table->bigInteger('area_level');
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
        Schema::dropIfExists('plantillas');
    }
}
