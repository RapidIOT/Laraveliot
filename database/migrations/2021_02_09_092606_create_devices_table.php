<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('deviceNumber');
            $table->integer('pinsInDevice')->unsigned();
            $table->text("name");
            $table->longText('details');
            $table->boolean('is_active')->default(0);
            $table->boolean('deviceAddedByID')->default(0);
            $table->boolean('deviceModifiedByID')->default(0);
            $table->softDeletes();
            $table->timestamps();
            // $table->bigInteger('userId')->unsigned();
            // $table->text("powerPins");
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
        Schema::dropIfExists('devices');
    }
}
