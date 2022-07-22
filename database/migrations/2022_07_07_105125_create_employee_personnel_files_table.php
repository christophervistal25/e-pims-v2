<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Employee_Personnel_Files', function (Blueprint $table) {
            $table->id();
            $table->string('Employee_id', 11)->references('Employee_id')->on('Employees')->onDelete('cascade');
            $table->foreignId('file_id')->references('id')->on('Personnel_Files')->onDelete('cascade');
            $table->date('date');
            $table->string('file');
            $table->string('file_size');
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
        Schema::dropIfExists('Employee_Personnel_Files');
    }
};
