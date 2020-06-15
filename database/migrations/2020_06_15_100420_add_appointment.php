<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAppointment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table){
            $table->increments('id');
            $table->integer('from_id')->unsigned();
            $table->integer('to_id')->unsigned();
            $table->foreign('from_id', 'from_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('to_id', 'to_user')->references('id')->on('users')->onDelete('cascade');
            $table->text('context');
            $table->text('place');
            $table->dateTime('date');
            $table->dateTime('hour');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
