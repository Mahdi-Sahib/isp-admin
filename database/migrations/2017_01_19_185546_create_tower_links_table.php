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
            $table->string('repeater_name')->nullable();
            $table->string('connection_type_id')->nullable();
            $table->string('connection_method')->nullable();
            $table->string('source_name')->nullable();
            // wireless
            $table->string('wireless_type')->nullable();
            $table->string('channel_width')->nullable();
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
            // fiber obtic
            $table->string('fiber_type')->nullable();
            $table->string('fiber_core')->nullable();
            $table->string('fiber_sfp_type')->nullable();
            $table->string('fiber_distance')->nullable();
            $table->string('fiber_master_port_number')->nullable();
            $table->string('fiber_clint_port_number')->nullable();
            // other
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
