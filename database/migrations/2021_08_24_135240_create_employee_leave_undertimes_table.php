<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLeaveUndertimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_leave_undertimes', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id'); 
            $table->integer('hoursLate'); 
            $table->integer('minsLate'); 
            $table->integer('hoursUndertime'); 
            $table->integer('minsUndertime');
            $table->decimal('equivalent', 5, 3);
            $table->date('month_year');
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
        Schema::dropIfExists('employee_leave_undertimes');
    }
}
