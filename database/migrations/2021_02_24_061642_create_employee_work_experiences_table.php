<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeWorkExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_work_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->date('from')->nullabe();
            $table->date('to')->nullable();
            $table->string('position_title')->nullable();
            $table->string('office')->nullable();
            $table->string('monthly_salary')->nullable();
            $table->string('salary_job_pay_grade')->nullable();
            $table->string('status_of_appointment')->nullable();
            $table->enum('government_service', ['Y', 'N'])->default('Y');
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
        Schema::dropIfExists('employee_work_experiences');
    }
}
