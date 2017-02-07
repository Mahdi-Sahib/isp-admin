<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowerIpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tower_ips', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tower_id')->unsigned();
            $table->foreign('tower_id')->references('id')->on('towers')->onDelete('cascade');
            $table->ipAddress('tower_ip');
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
        Schema::dropIfExists('tower_ips');
    }
}
