<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompensatoryLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compensatory_leaves', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id'); 
            $table->enum('overtime_type', ['weekdays', 'weekends/holidays'])->nullable();
            $table->decimal('hours_rendered', 5, 3)->nullable();
            $table->decimal('earned', 5, 3);
            $table->decimal('availed', 5, 3);
            $table->date('date_added');
            $table->text('remarks');
            $table->enum('forfeited', ['yes', 'no'])->default('no');
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
        Schema::dropIfExists('compensatory_leaves');
    }
}
