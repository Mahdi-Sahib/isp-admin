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
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('type')->nullable();
            $table->string('title','20')->nullable();
            $table->unsignedTinyInteger('adaptor_typ')->nullable();
            $table->unsignedTinyInteger('accommodate')->nullable();
            $table->unsignedTinyInteger('brand')->nullable();
            $table->unsignedTinyInteger('model')->nullable();
            $table->unsignedTinyInteger('splitting_level')->nullable();
            $table->unsignedTinyInteger('splitting_ratio')->nullable();
            $table->unsignedTinyInteger('max_splitting_ratio')->nullable();
            $table->unsignedTinyInteger('pon_count')->nullable();
            $table->string('title','25')->nullable();
            $table->string('location','30')->nullable();
            $table->unsignedTinyInteger('created_by')->nullable();
            $table->unsignedTinyInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('delete_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('splitters', function($table) {
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
        Schema::dropIfExists('splitters');
    }
}
