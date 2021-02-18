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
            $table->integer('old_item_no');
            $table->integer('new_item_no');
            $table->string('position_title');
            $table->string('position_title_ext');
            $table->string('employee_id',25);            
            $table->string('office_code',25);
            $table->bigInteger('division_code');
            $table->date('date_original_appointment');
            $table->date('date_last_promotion');
            $table->string('status');
            $table->integer('dbm_previous_sg_no');
            $table->integer('dbm_previous_step_no');
            $table->year('dbm_previous_sg_year');            
            $table->integer('dbm_current_sg_no');
            $table->integer('dbm_current_step_no');
            $table->year('dbm_current_sg_year');            
            $table->integer('csc_previous_sg_no');
            $table->integer('csc_previous_step_no');
            $table->year('csc_previous_sg_year');            
            $table->integer('csc_current_sg_no');
            $table->integer('csc_current_step_no');
            $table->year('csc_current_sg_year');            
            $table->string('area_code',25);
            $table->string('area_type',25);
            $table->string('area_level',25);
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
