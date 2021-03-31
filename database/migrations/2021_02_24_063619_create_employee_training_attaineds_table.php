<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTrainingAttainedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_training_attaineds', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('title');
            $table->date('date_of_attendance_from');
            $table->date('date_of_attendance_to');
            $table->bigInteger('number_of_hours');
            $table->string('type_of_id');
            $table->string('sponsored_by');
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
        Schema::dropIfExists('employee_training_attaineds');
    }
}
