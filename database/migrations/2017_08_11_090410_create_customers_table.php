<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('connection_method')->default('0');
            $table->unsignedTinyInteger('wireless_type_id')->nullable();
            $table->unsignedTinyInteger('tower_id')->nullable();
            $table->unsignedSmallInteger('broadcast_id')->nullable();
            $table->unsignedTinyInteger('hub_id')->nullable();
            $table->unsignedTinyInteger('olt_id')->nullable();
            $table->unsignedTinyInteger('device_id')->nullable();
            $table->unsignedSmallInteger('apmac_id')->nullable();
            $table->unsignedSmallInteger('splitter_id')->nullable();
            $table->tinyInteger('switch_port')->nullable();
            $table->string('fullname','30')->unique()->index();
            $table->string('username','30')->unique()->index();
            $table->string('password','10')->default('0000');
            $table->string('mobile_1','11')->nullable();
            $table->string('mobile_2','11')->nullable();
            $table->unsignedTinyInteger('address_1')->nullable();
            $table->string('address_2','50')->nullable();
            $table->string('about','50')->nullable();
            $table->macAddress('mac')->nullable()->unique();
            $table->ipAddress('ip')->nullable()->unique();
            $table->unsignedTinyInteger('created_by')->nullable();
            $table->unsignedTinyInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('delete_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('customers', function($table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('delete_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('tower_id')->references('id')->on('towers')->onDelete('set null');
            $table->foreign('broadcast_id')->references('id')->on('broadcasts')->onDelete('set null');
            $table->foreign('hub_id')->references('id')->on('hubs')->onDelete('set null');
            $table->foreign('olt_id')->references('id')->on('olts')->onDelete('set null');
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('set null');
            $table->foreign('apmac_id')->references('id')->on('broadcasts')->onDelete('set null');
            $table->foreign('splitter_id')->references('id')->on('splitters')->onDelete('set null');
            $table->foreign('address_1')->references('id')->on('address_helpers')->onDelete('set null');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
