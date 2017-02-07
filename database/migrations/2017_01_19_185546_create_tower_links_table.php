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
            $table->integer('tower_id')->unsigned();
            $table->foreign('tower_id')->references('id')->on('towers')->onDelete('cascade');
            $table->integer('repeater_id')->nullable();
            $table->integer('connection_type_id')->nullable();
            $table->string('channal_width')->nullable();
            $table->string('ssid')->nullable();
            $table->string('authentication_method')->nullable();
            $table->string('authentication')->nullable();
            $table->ipAddress('slave_ip')->nullable();
            $table->macAddress('slave_mac')->nullable();
            $table->string('slave_antenna')->nullable();
            $table->string('slave_brand')->nullable();
            $table->string('slave_username')->nullable();
            $table->string('slave_password')->nullable();
            $table->ipAddress('master_ip')->nullable();
            $table->macAddress('master_mac')->nullable();
            $table->string('master_antenna')->nullable();
            $table->string('master_brand')->nullable();
            $table->string('master_username')->nullable();
            $table->string('master_password')->nullable();
            $table->string('link_info')->nullable();
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
        Schema::dropIfExists('tower_links');
    }
}
