<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ziekmeldings', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('reason')->nullable();
            $table->date('date');
            $table->time('time');
            $table->date('date_end')->nullable();
            $table->time('time_end')->nullable();
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
        Schema::dropIfExists('ziekmeldings');
    }
};
