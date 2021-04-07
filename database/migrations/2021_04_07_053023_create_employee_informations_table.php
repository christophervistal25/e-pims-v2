<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_informations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('EmpIDNo');
            $table->string('old_office_code')->nullable();
            $table->integer('office_code');
            $table->string('division_code')->nullable();
            $table->decimal('item_number');
            $table->string('suffix')->nullable();
            $table->integer('pos_code');
            $table->decimal('emp_status');
            $table->date('first_day_of_service');
            $table->decimal('basic_rate');
            $table->decimal('salary_grade');
            $table->decimal('step');
            $table->string('skills')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('religion')->nullable();
            $table->string('address');
            $table->string('tel_no')->nullable();
            $table->string('photo');
            $table->string('swipe_station_no');
            $table->string('time_reference');
            $table->string('exempted_swipe');
            $table->tinyInteger('active_inactive');
            $table->string('employment_status')->nullable();
            $table->tinyInteger('new_employee');
            $table->string('PNB_account_no');
            $table->integer('zip_code')->nullable();
            $table->tinyInteger('shifting_employee');
            $table->string('PHW');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee_informations');
    }
}
