<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFiberNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fiber_nodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fiber_nodes_rx')->nullable();
            $table->string('cor_type')->nullable();
            $table->string('box_type')->nullable();
            $table->string('box_brand')->nullable();
            $table->string('box_borts')->nullable();
            $table->string('google_location')->nullable();
            $table->integer('created_by')->nullable();
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
        Schema::dropIfExists('fiber_nodes');
    }
}
