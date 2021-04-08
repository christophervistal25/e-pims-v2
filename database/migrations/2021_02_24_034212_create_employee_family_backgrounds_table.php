<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeFamilyBackgroundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_family_backgrounds', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->string('spouse_firstname')->nullable();
            $table->string('spouse_lastname')->nullable();
            $table->string('spouse_middlename')->nullable();
            $table->string('spouse_extension')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_employer_business_name')->nullable();
            $table->string('spouse_business_address')->nullable();
            $table->string('spouse_telephone_number')->nullable();
            $table->string('father_firstname')->nullable();
            $table->string('father_lastname')->nullable();
            $table->string('father_middlename')->nullable();
            $table->string('father_extension')->nullable();
            $table->string('mother_maidenname')->nullable();
            $table->string('mother_lastname')->nullable();
            $table->string('mother_firstname')->nullable();
            $table->string('mother_middlename')->nullable();
            $table->string('mother_extension')->nullable();
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
        Schema::dropIfExists('employee_family_backgrounds');
    }
}
