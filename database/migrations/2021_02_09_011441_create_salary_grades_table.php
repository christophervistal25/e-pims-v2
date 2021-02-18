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
            $table->integer('sg_no');
            $table->decimal('sg_step1', 11,2);
            $table->decimal('sg_step2', 11,2);
            $table->decimal('sg_step3', 11,2);
            $table->decimal('sg_step4', 11,2);
            $table->decimal('sg_step5', 11,2);
            $table->decimal('sg_step6', 11,2);
            $table->decimal('sg_step7', 11,2);
            $table->decimal('sg_step8', 11,2);
            $table->year('sg_year');            
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
