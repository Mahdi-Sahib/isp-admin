<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressHelpersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_helpers', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('place_1','20');
            $table->unsignedTinyInteger('created_by')->nullable();
            $table->unsignedTinyInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('delete_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('address_helpers', function($table) {
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
        Schema::dropIfExists('address_helpers');
    }
}
