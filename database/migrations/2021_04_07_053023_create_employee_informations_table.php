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
            $table->string('EmpIDNo');
            $table->string('old_office_code')->nullable();
            $table->integer('office_code');
            $table->string('division_code')->nullable();
            $table->decimal('item_number')->nullable();
            $table->integer('pos_code');
            $table->date('first_day_of_service')->nullable();
            $table->decimal('basic_rate')->nullable();
            $table->decimal('salary_grade')->nullable();
            $table->decimal('step')->nullable();
            $table->string('skills')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('religion')->nullable();
            $table->string('photo')->default('no_image.png');
            $table->string('swipe_station_no')->nullable();
            $table->string('time_reference')->nullable();
            $table->string('exempted_swipe')->nullable();
            $table->tinyInteger('active_inactive')->nullable();
            $table->tinyInteger('new_employee')->nullable();
            $table->string('PNB_account_no')->nullable();
            $table->integer('zip_code')->nullable();
            $table->tinyInteger('shifting_employee')->nullable();
            $table->string('PHW')->nullable();
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
        Schema::dropIfExists('employee_informations');
    }
}
