<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowerLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tower_links', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tower_id');
            $table->integer('repeater_id')->nullable();
            $table->integer('connection_types_id')->nullable();
            $table->string('channal_width')->nullable();
            $table->string('ssid')->nullable();
            $table->string('authentication')->nullable();
            $table->ipAddress('slave_ip')->nullable();
            $table->string('slave_antenna')->nullable();
            $table->string('slave_brand')->nullable();
            $table->ipAddress('master_ip')->nullable();
            $table->string('master_antenna')->nullable();
            $table->string('master_brand')->nullable();
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
        Schema::dropIfExists('tower_links');
    }
}
