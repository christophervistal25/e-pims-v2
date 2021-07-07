<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalaryAdjustmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_adjustments', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id');
            $table->integer('item_no');
            $table->bigInteger('pp_id');
            $table->date('date_adjustment');
            $table->integer('sg_no');
            $table->integer('step_no');
            $table->decimal('salary_previous',11,2);
            $table->decimal('salary_new',11,2);
            $table->decimal('salary_diff',11,2);
            $table->timestamps();
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_adjustments');
    }
}
