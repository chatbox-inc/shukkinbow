<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_user', function (Blueprint $table) {
            $table->increments('id');
            $table->string('torken');
            $table->string('refreshtoken')->nullable();
            $table->unsignedInteger('expiresin');
            $table->string('google_id');
            $table->string('nickname')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('avatar');
            $table->string('company_id');
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
        Schema::dropIfExists('t_user');
    }
}
