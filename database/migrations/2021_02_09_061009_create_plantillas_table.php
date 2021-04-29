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
            $table->integer('item_no');
            $table->bigInteger('position_id');
            $table->string('position_ext')->nullable();
            $table->integer('sg_no');
            $table->integer('step_no');
            $table->decimal('salary_amount',11,2);


            $table->string('employee_id'); 
            $table->string('area_code');
            $table->string('area_type');
            $table->string('area_level');

            $table->date('date_original_appointment');
            $table->date('date_last_promotion');
            $table->date('date_last_increment')->nullable();
            $table->string('office_code');
            $table->bigInteger('division_id');            

            $table->string('status');            
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
