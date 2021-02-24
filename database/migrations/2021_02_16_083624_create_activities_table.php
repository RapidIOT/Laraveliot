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
            $table->text("activityType");
            $table->bigInteger('activityById')->unsigned();
            // $table->bigInteger('userId')->unsigned();
            $table->string('deviceNumber');
            $table->string('deviceStatus');
            $table->string('pinId');
            $table->string('pinStatus')->default(0);
            $table->text("details")->nullable();
            $table->bigInteger('sharedControlWith')->unsigned();
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
