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
            $table->increments('id');
            $table->tinyInteger('connection_method')->default('0');
            $table->tinyInteger('wireless_type_id')->nullable();
            $table->integer('tower_id')->nullable();
            $table->integer('broadcast_id')->nullable();
            $table->integer('switch_id')->nullable();
            $table->integer('switch_port')->nullable();
            $table->integer('olt_id')->nullable();
            $table->integer('first_splitter_id')->nullable();
            $table->integer('second_splitter_id')->nullable();
            $table->tinyInteger('device_id')->nullable();
            $table->integer('apmac_id')->nullable();
            $table->integer('customer_ticket_id')->nullable();
            $table->integer('supplier_id')->nullable();
            $table->integer('plan_id')->nullable();
            $table->integer('customer_debt_id')->nullable();
            $table->string('fullname')->unique();
            $table->string('username')->unique();
            $table->string('password')->default('0000');
            $table->string('mobile_1')->nullable();
            $table->string('mobile_2')->nullable();
            $table->integer('address_1')->nullable();
            $table->string('address_2')->nullable();
            $table->text('about')->nullable();
            $table->macAddress('mac')->nullable()->unique();
            $table->ipAddress('ip')->nullable()->unique();
            $table->integer('created_by');
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
        Schema::dropIfExists('customers');
    }
}
