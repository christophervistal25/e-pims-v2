<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_grades', function (Blueprint $table) {
            $table->id();
            $table->decimal('salary_grade_step1', 11,2);
            $table->decimal('salary_grade_step2', 11,2);
            $table->decimal('salary_grade_step3', 11,2);
            $table->decimal('salary_grade_step4', 11,2);
            $table->decimal('salary_grade_step5', 11,2);
            $table->decimal('salary_grade_step6', 11,2);
            $table->decimal('salary_grade_step7', 11,2);
            $table->decimal('salary_grade_step8', 11,2);
            $table->string('salary_grade_year');
            // $table->string('salary_grade_active');
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
        Schema::dropIfExists('salary_grades');
    }
}
