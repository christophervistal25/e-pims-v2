<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryAdjustmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_adjustments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plantilla_id');
            $table->date('date_adjustment');            
            $table->integer('sg_no_from');
            $table->integer('step_no_from');
            $table->year('sg_year_from');            
            $table->integer('sg_no_to');
            $table->integer('step_no_to');
            $table->year('sg_year_to');
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
        Schema::dropIfExists('salary_adjustments');
    }
}
