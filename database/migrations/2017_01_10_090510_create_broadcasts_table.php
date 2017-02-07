<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBroadcastsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broadcasts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tower_id')->unsigned();
            $table->foreign('tower_id')->references('id')->on('towers')->onDelete('cascade');
            $table->integer('device_id')->unsigned()->nullable();
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('set null');
            $table->string('number_sign')->nullable();
            $table->string('name')->nullable();
            $table->string('ssid');
            $table->ipAddress('ip');
            $table->macAddress('mac')->nullable();
            $table->string('channal')->nullable();
            $table->string('channal_width');
            $table->string('direction')->nullable();
            $table->string('broadcasts_info')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->integer('delete_by')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('broadcasts');
    }
}
