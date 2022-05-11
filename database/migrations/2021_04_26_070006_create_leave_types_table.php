<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code')->nullable();
            $table->integer('code_number')->nullable();
            $table->text('description')->nullable();
            // $table->integer('days_period');
            $table->enum('convertible_to_cash', ['yes', 'no']);
            // $table->enum('applicable_gender', ['male', 'female', 'female/male']);
            // $table->integer('required_rendered_service')->default(0);
            $table->string('category');
            // $table->enum('editable', ['yes', 'no']);
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
        Schema::dropIfExists('leave_types');
    }
}
