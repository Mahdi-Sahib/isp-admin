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
            $table->integer('tower_id');
            $table->integer('device_id');
            $table->string('number_sign')->nullable();
            $table->string('name')->nullable();
            $table->string('ssid');
            $table->ipAddress('ip');
            $table->macAddress('mac')->nullable();
            $table->string('channal')->nullable();
            $table->string('channal_width');
            $table->string('direction')->nullable();
            $table->string('broadcasts_info')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
