<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTAttendanceRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_attendancerecord', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->datetime('start_time');
            $table->datetime('end_time')->nullable();
            $table->unsignedInteger('location_id')->default(1);
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
        Schema::dropIfExists('t_attendancerecord');
    }
}
