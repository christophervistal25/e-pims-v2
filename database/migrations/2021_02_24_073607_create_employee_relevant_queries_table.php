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

            // $table->string('affinity_in_government');
            // $table->string('affinity_in_government_answer');
            // $table->string('afffinity_in_government_details')->nullable();

            // $table->string('filed_cases');
            // $table->string('filed_cases_answer');
            // $table->string('filed_cases_details')->nullable();

            // $table->string('conviction_violation');
            // $table->string('conviction_violation_answer');
            // $table->string('conviction_violation_details')->nullable();

            // $table->string('service_record');
            // $table->string('service_record_answer');
            // $table->string('service_record_details')->nullable();

            // $table->string('electoral_and_immigration');
            // $table->string('electoral_and_immigration_answer');
            // $table->string('electoral_and_immigration_details')->nullable();

            // $table->string('indigency_social_matters');
            // $table->string('indigency_social_matters_answer');
            // $table->string('indigency_social_matters_details')->nullable();


            $table->string('question_34_a_answer');
            $table->string('question_34_a_details')->nullable();
            $table->string('question_34_b_answer');
            $table->string('question_34_b_details')->nullable();
            $table->string('question_35_a_answer');
            $table->string('question_35_a_details')->nullable();
            $table->string('question_35_b_answer');
            $table->string('question_35_b_details')->nullable();
            $table->date('question_35_b_date_filled')->nullable();
            $table->string('question_35_b_status_of_cases')->nullable();
            $table->string('question_36_a_answer');
            $table->string('question_36_a_details')->nullable();
            $table->string('question_37_a_answer');
            $table->string('question_37_a_details')->nullable();
            $table->string('question_38_a_answer');
            $table->string('question_38_a_details')->nullable();
            $table->string('question_38_b_answer');
            $table->string('question_38_b_details')->nullable();
            $table->string('question_39_a_answer');
            $table->string('question_39_a_details')->nullable();
            $table->string('question_40_a_answer');
            $table->string('question_40_a_details')->nullable();
            $table->string('question_40_b_answer');
            $table->string('question_40_b_details')->nullable();
            $table->string('question_40_c_answer');
            $table->string('question_40_c_details')->nullable();

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
