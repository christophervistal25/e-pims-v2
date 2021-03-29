<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_records', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->date('service_from_date');
            $table->date('service_to_date');
            $table->bigInteger('position_id');
            $table->string('status');
            $table->string('salary');
            $table->string('office_name');
            $table->string('office_address');
            $table->string('leave_without_pay');
            $table->string('separation_date');
            $table->string('separation_cause');
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
        Schema::dropIfExists('service_records');
    }
}
