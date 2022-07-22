<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatillaCscSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platilla_csc_schedules', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('plantilla_id');
            $table->integer('old_item_no');
            $table->integer('item_no');
            $table->bigInteger('position_id');
            $table->string('position_ext');
            $table->integer('sg_no');
            $table->integer('step_no');
            $table->decimal('salary_amount', 11, 2);

            $table->string('employee_id');
            $table->string('area_code');
            $table->string('area_type');
            $table->string('area_level');

            $table->date('date_original_appointment');
            $table->date('date_last_promotion');
            $table->string('office_code');
            $table->bigInteger('division_id');

            $table->string('status');
            $table->year('covered_year');
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
        Schema::dropIfExists('platilla_csc_schedules');
    }
}
