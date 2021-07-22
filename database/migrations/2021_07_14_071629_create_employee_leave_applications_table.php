<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeLeaveApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_leave_applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('employee_id');
            $table->string('recommending_approval');
            $table->string('approved_by');
            $table->unsignedInteger('leave_type_id');
            $table->string('incase_of');
            $table->unsignedInteger('no_of_days');
            $table->enum('commutation', ['REQUESTED', 'NOT REQUESTED']);
            $table->enum('approved_status', ['pending', 'reject', 'approved']);
            $table->date('date_approved')->nullable();
            $table->date('date_applied');
            $table->date('date_from');
            $table->date('date_to');
            $table->softDeletes();
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
        Schema::dropIfExists('employee_leave_applications');
    }
}
