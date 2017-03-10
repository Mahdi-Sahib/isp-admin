<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTowerTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tower_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tower_id')->unsigned();
            $table->foreign('tower_id')->references('id')->on('towers')->onDelete('cascade');
            $table->integer('broadcast_id')->unsigned()->nullable();
            $table->foreign('broadcast_id')->references('id')->on('broadcasts')->onDelete('cascade');
            $table->integer('tower_link_id')->unsigned()->nullable();
            $table->foreign('tower_link_id')->references('id')->on('tower_links')->onDelete('cascade');
            $table->integer('category')->unsigned();
            $table->integer('priority')->unsigned();
            $table->integer('status')->default(1);
            $table->string('title');
            $table->text('message');
            $table->integer('created_by');
            $table->integer('closed_by')->nullable();
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
        Schema::dropIfExists('tower_tickets');
    }
}
