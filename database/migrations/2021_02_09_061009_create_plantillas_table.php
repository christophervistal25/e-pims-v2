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
            $table->id('plantilla_id');
            $table->integer('old_item_no');
            $table->integer('new_item_no');
            $table->string('position_title');
            $table->string('position_title_ext');
            $table->string('employee_id'); 
            $table->string('current_salary_grade');
            $table->string('current_step_no');    
            $table->string('current_salary_amount');    
            $table->string('office_code');
            $table->bigInteger('division_code');
            $table->date('date_original_appointment');
            $table->date('date_last_promotion');
            $table->string('status');
            $table->integer('dbm_previous_sg_no');
            $table->integer('dbm_previous_step_no');
            $table->year('dbm_previous_sg_year');            
            $table->integer('dbm_previous_amount');            
            $table->integer('dbm_current_sg_no');
            $table->integer('dbm_current_step_no');
            $table->year('dbm_current_sg_year');            
            $table->integer('dbm_current_amount');            
            $table->integer('csc_previous_sg_no');
            $table->integer('csc_previous_step_no');
            $table->year('csc_previous_sg_year');            
            $table->integer('csc_previous_amount');            
            $table->integer('csc_current_sg_no');
            $table->integer('csc_current_step_no');
            $table->year('csc_current_sg_year');            
            $table->integer('csc_current_amount');            
            $table->string('area_code');
            $table->string('area_type');
            $table->string('area_level');
            // $table->foreign('employee_id')
            // ->references('id')
            // ->on('employees');
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
