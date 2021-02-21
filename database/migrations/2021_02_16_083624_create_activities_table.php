<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('deviceNumber');
            $table->bigInteger('userId')->unsigned();
            $table->bigInteger('activityById')->unsigned();
            $table->text("details")->nullable();
            $table->text("remarks")->nullable();
            $table->text("activityType");
            $table->string('pinNumber')->unsigned();
            $table->string('pinStatus')->default(0);
            $table->softDeletes();
            $table->timestamps();
            // $table->foreign('deviceId')->references('id')->on('devices')->onDelete('cascade');
            // $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
