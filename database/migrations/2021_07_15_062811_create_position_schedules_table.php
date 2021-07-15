<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_schedules', function (Blueprint $table) {
            $table->id('pos_id');
            $table->integer('pp_id');
            $table->integer('position_id');
            $table->string('item_no');
            $table->integer('sg_no');
            $table->string('office_code');
            $table->string('old_position_name')->nullable();
            $table->year('year');
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
        Schema::dropIfExists('position_schedules');
    }
}
