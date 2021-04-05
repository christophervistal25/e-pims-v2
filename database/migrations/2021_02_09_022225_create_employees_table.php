<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *git
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->string('employee_id')->primary();
            $table->string('lastname',60);
            $table->string('firstname',60);
            $table->string('middlename',60);
            $table->string('extension')->nullable();
            $table->date('date_birth');
            $table->string('place_birth');
            $table->enum('sex', ['male', 'female'])->default('male');
            $table->string('civil_status');
            $table->integer('height');
            $table->integer('weight');
            $table->string('blood_type')->nullable();
            $table->string('gsis_id_no')->nullable();
            $table->string('pag_ibig_no')->nullable();
            $table->string('philhealth_no')->nullable();
            $table->string('sss_no')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('agency_employee_no')->nullable();
            $table->string('citizenship');
            $table->string('residential_house_no')->nullable();
            $table->string('residential_street')->nullable();
            $table->string('residential_village');
            $table->string('residential_barangay');
            $table->string('residential_city');
            $table->string('residential_province');
            $table->string('residential_zip_code');
            $table->string('permanent_house_no')->nullable();
            $table->string('permanent_street')->nullable();
            $table->string('permanent_village');
            $table->string('permanent_barangay');
            $table->string('permanent_city');
            $table->string('permanent_province');
            $table->string('permanent_zip_code');
            $table->string('telephone_no')->nullable();
            $table->string('mobile_no')->unique();
            $table->string('email_address')->nullable();
            $table->string('status');
            $table->string('image')->default('no_image.png');
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
        Schema::dropIfExists('employees');
    }
}
