<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSplittersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('splitters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('type')->nullable();
            $table->integer('number')->nullable();
            $table->integer('adaptor_typ')->nullable();
            $table->integer('accommodate')->nullable();
            $table->integer('brand')->nullable();
            $table->integer('model')->nullable();
            $table->integer('splitting_level')->nullable();
            $table->integer('splitting_ratio')->nullable();
            $table->integer('max_splitting_ratio')->nullable();
            $table->integer('pon_count')->nullable();
            $table->string('title')->nullable();
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
        Schema::dropIfExists('splitters');
    }
}
