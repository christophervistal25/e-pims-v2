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
            $table->string('title')->nullable();
            $table->date('date_of_attendance_from')->nullable();
            $table->date('date_of_attendance_to')->nullable();
            $table->bigInteger('number_of_hours')->nullable();
            $table->string('type_of_id')->nullable();
            $table->string('sponsored_by')->nullable();
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
