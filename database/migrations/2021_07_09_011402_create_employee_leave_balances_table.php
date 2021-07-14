<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLeaveBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_leave_balances', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('leave_type_id');
            $table->unsignedInteger('remaining');
            $table->unsignedInteger('used');
            $table->unsignedInteger('employee_id');
            $table->date('fb_as_of');
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
        Schema::dropIfExists('employee_leave_balances');
    }
}
