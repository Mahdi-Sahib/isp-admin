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
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('tower_id');
            $table->unsignedTinyInteger('device_id')->nullable();
            $table->string('number_sign','10')->nullable();
            $table->string('name','20')->nullable();
            $table->string('ssid','30');
            $table->ipAddress('ip');
            $table->macAddress('mac')->nullable();
            $table->string('antenna','20')->nullable();
            $table->unsignedSmallInteger('degree')->nullable();
            $table->unsignedTinyInteger('gin')->nullable();
            $table->string('channal')->nullable();
            $table->unsignedTinyInteger('channal_width');
            $table->string('direction','100')->index()->nullable();
            $table->string('broadcasts_info')->nullable();
            $table->unsignedTinyInteger('created_by')->nullable();
            $table->unsignedTinyInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('delete_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('broadcasts', function($table) {
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('set null');
            $table->foreign('tower_id')->references('id')->on('towers')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('delete_by')->references('id')->on('users')->onDelete('set null');
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
