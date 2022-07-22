<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepIncrementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step_increments', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->integer('item_no');
            $table->bigInteger('position_id');
            $table->date('date_step_increment');
            $table->date('date_latest_appointment');
            $table->integer('sg_no_from');
            $table->integer('step_no_from');
            $table->decimal('salary_amount_from', 11, 2);
            $table->integer('sg_no_to');
            $table->integer('step_no_to');
            $table->decimal('salary_amount_to', 11, 2);
            $table->decimal('salary_diff', 11, 2);
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
        Schema::dropIfExists('step_increments');
        // $table->dropSoftDeletes();
    }
}
