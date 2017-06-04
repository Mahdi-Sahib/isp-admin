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
            $table->mediumIncrements('id');
            $table->unsignedTinyInteger('tower_id');
            $table->unsignedSmallInteger('broadcast_id')->nullable();
            $table->unsignedTinyInteger('tower_link_id')->nullable();
            $table->tinyInteger('category')->unsigned();
            $table->tinyInteger('priority')->unsigned();
            $table->boolean('status')->default(1);
            $table->string('title','50');
            $table->string('message','150');
            $table->string('close_message','150')->nullable();
            $table->unsignedTinyInteger('created_by')->nullable();
            $table->unsignedTinyInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('delete_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('tower_tickets', function($table) {
            $table->foreign('tower_link_id')->references('id')->on('tower_links')->onDelete('cascade');
            $table->foreign('broadcast_id')->references('id')->on('broadcasts')->onDelete('cascade');
            $table->foreign('tower_id')->references('id')->on('towers')->onDelete('cascade');
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
        Schema::dropIfExists('tower_tickets');
    }
}
