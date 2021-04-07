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
            $table->string('OldOfficeCode')->nullable();
            $table->integer('OfficeCode');
            $table->string('DivisionCode')->nullable();
            $table->decimal('ItemNumber');
            $table->string('Suffix')->nullable();
            $table->integer('PosCode');
            $table->decimal('EmpStatus');
            $table->date('FirstDayOfService');
            $table->decimal('BasicRate');
            $table->decimal('SalaryGrade');
            $table->decimal('Step');
            $table->string('Skills')->nullable();
            $table->string('Hobbies')->nullable();
            $table->string('Religion')->nullable();
            $table->string('Address');
            $table->string('TelNo')->nullable();
            $table->string('Photo');
            $table->string('SwipeStationNo');
            $table->string('TimeReference');
            $table->string('ExemptedSwipe');
            $table->tinyInteger('ActiveInactive');
            $table->string('EmploymentStatus')->nullable();
            $table->tinyInteger('NewEmployee');
            $table->string('PNBAccountNo');
            $table->integer('ZipCode')->nullable();
            $table->tinyInteger('ShiftingEmployee');
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
