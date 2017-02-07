<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiberBoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiber_boxes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fiber_nodes_rx')->nullable();
            $table->string('cor_type')->nullable();
            $table->string('box_type')->nullable();
            $table->string('box_brand')->nullable();
            $table->string('box_borts')->nullable();
            $table->string('google_location')->nullable();
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
        Schema::dropIfExists('fiber_boxes');
    }
}
