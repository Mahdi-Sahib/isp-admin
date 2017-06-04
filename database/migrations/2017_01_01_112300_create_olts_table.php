<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOltsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('olts', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('title','25')->nullable();
            $table->string('type','20')->nullable();
            $table->unsignedTinyInteger('device_id')->nullable();
            $table->string('number_sign','20')->nullable();
            $table->unsignedTinyInteger('adaptor_type')->nullable();
            $table->string('accommodate','20')->nullable();
            $table->unsignedTinyInteger('brand')->nullable();
            $table->unsignedTinyInteger('model')->nullable();
            $table->string('splitting_level','20')->nullable();
            $table->string('splitting_method','20')->nullable();
            $table->string('splitting_ratio_level_1','20')->nullable();
            $table->string('splitting_ratio_level_2','20')->nullable();
            $table->unsignedTinyInteger('pon_count')->nullable();
            $table->string('location','30')->nullable();
            $table->unsignedTinyInteger('created_by')->nullable();
            $table->unsignedTinyInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('delete_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('olts', function($table) {
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('set null');
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
        Schema::dropIfExists('olts');
    }
}
