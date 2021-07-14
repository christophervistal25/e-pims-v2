<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLeaveRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_leave_records', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id'); 
            $table->unsignedInteger('leave_balance_id');
            $table->decimal('earned', 5, 3);
            $table->text('particular');
            $table->decimal('absences_under_time_with_pay_balance', 5, 3);
            $table->decimal('absences_under_time_without_pay_balance', 5, 3);
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
        Schema::dropIfExists('employee_leave_records');
    }
}
