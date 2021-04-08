<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeEducationalBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_educational_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');

            $table->string('elementary_name')->nullable();
            $table->string('elementary_education')->nullable();
            $table->string('elementary_period_from')->nullable();
            $table->string('elementary_period_to')->nullable();
            $table->string('elementary_highest_level_units_earned')->nullabe();
            $table->string('elementary_year_graduated')->nullable();
            $table->string('elementary_scholarship')->nullable();

            $table->string('secondary_name')->nullable();
            $table->string('secondary_education')->nullabe();
            $table->string('secondary_period_from')->nullable();
            $table->string('secondary_period_to')->nullable();
            $table->string('secondary_highest_level_units_earned')->nullable();
            $table->string('secondary_year_graduated')->nullable();
            $table->string('secondary_scholarship')->nullable();

            $table->string('vocational_trade_course_name')->nullable();
            $table->string('vocational_education')->nullable();
            $table->string('vocational_trade_course_period_from')->nullable();
            $table->string('vocational_trade_course_period_to')->nullable();
            $table->string('vocational_trade_course_highest_level_units_earned')->nullable();
            $table->string('vocational_trade_course_year_graduated')->nullable();
            $table->string('vocational_trade_course_scholarship')->nullable();

            $table->string('college_name')->nullable();
            $table->string('college_education')->nullable();
            $table->string('college_period_from')->nullable();
            $table->string('college_period_to')->nullable();
            $table->string('college_highest_level_units_earned')->nullable();
            $table->string('college_year_graduated')->nullable();
            $table->string('college_scholarship')->nullable();


            $table->string('graduate_studies_name')->nullable();
            $table->string('graduate_studies_education')->nullable();
            $table->string('graduate_studies_period_from')->nullable();
            $table->string('graduate_studies_period_to')->nullable();
            $table->string('graduate_studies_highest_level_units_earned')->nullable();
            $table->string('graduate_studies_year_graduated')->nullable();
            $table->string('graduate_studies_scholarship')->nullable();

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
        Schema::dropIfExists('employee_educational_backgrounds');
    }
}
