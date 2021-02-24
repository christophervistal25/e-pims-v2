<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeRelevantQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_relevant_queries', function (Blueprint $table) {
            $table->id();

            $table->string('employee_id');

            $table->string('affinity_in_government');
            $table->string('affinity_in_government_answer');
            $table->string('afffinity_in_government_details');

            $table->string('filed_cases');
            $table->string('filed_cases_answer');
            $table->string('filed_cases_details');

            $table->string('conviction_violation');
            $table->string('conviction_violation_answer');
            $table->string('conviction_violation_details');

            $table->string('service_record');
            $table->string('service_record_answer');
            $table->string('service_record_details');

            $table->string('electoral_and_immigration');
            $table->string('electoral_and_immigration_answer');
            $table->string('electoral_and_immigration_details');

            $table->string('indigency_social_matters');
            $table->string('indigency_social_matters_answer');
            $table->string('indigency_social_matters_details');

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
        Schema::dropIfExists('employee_relevant_queries');
    }
}
