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
            $table->string('employee_id',25);
            $table->date('service_from_date');
            $table->date('service_to_date');
            $table->string('designation');
            $table->string('status',20);
            $table->string('salary',20);
            $table->string('leave_without_pay',20);
            $table->string('separation_date',25);
            $table->string('separation_cause',30);
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
