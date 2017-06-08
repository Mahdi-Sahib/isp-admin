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
            $table->tinyIncrements('id');
            $table->unsignedTinyInteger('tower_id');
            $table->string('repeater_name','20')->nullable();
            $table->unsignedTinyInteger('connection_type_id')->nullable();
            $table->unsignedTinyInteger('connection_method')->nullable();
            $table->string('source_name','50')->nullable();
            // wireless
            $table->unsignedTinyInteger('wireless_type')->nullable();
            $table->unsignedTinyInteger('channel_width')->nullable();
            $table->string('ssid','30')->nullable();
            $table->unsignedTinyInteger('authentication_method')->nullable();
            $table->string('authentication','50')->nullable();
            $table->ipAddress('slave_ip')->nullable();
            $table->macAddress('slave_mac')->nullable();
            $table->string('slave_antenna','20')->nullable();
            $table->string('slave_brand','20')->nullable();
            $table->string('slave_username','20')->nullable();
            $table->string('slave_password','20')->nullable();
            $table->ipAddress('master_ip')->nullable();
            $table->macAddress('master_mac')->nullable();
            $table->string('master_antenna','20')->nullable();
            $table->string('master_brand','20')->nullable();
            $table->string('master_username','20')->nullable();
            $table->string('master_password','20')->nullable();
            // fiber obtic
            $table->unsignedTinyInteger('fiber_type')->nullable();
            $table->unsignedTinyInteger('fiber_core')->nullable();
            $table->unsignedTinyInteger('fiber_sfp_type')->nullable();
            $table->unsignedSmallInteger('fiber_distance')->nullable();
            $table->unsignedTinyInteger('fiber_master_port_number')->nullable();
            $table->unsignedTinyInteger('fiber_clint_port_number')->nullable();
            // other
            $table->string('link_info','100')->nullable();
            $table->unsignedTinyInteger('created_by')->nullable();
            $table->unsignedTinyInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('delete_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('tower_links', function($table) {
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
        Schema::dropIfExists('tower_links');
    }
}
