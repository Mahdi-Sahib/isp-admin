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
            $table->increments('id');
            $table->string('title')->nullable();
            $table->integer('type')->nullable();
            $table->string('number_sign')->nullable();
            $table->integer('adaptor_type')->nullable();
            $table->integer('accommodate')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('splitting_level')->nullable();
            $table->string('splitting_method')->nullable();
            $table->string('splitting_ratio_level_1')->nullable();
            $table->string('splitting_ratio_level_2')->nullable();
            $table->integer('pon_count')->nullable();
            $table->string('location')->nullable();
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
        Schema::dropIfExists('olts');
    }
}
