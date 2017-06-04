<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefillCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refill_cards', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->unsignedTinyInteger('supplier_id')->nullable();
            $table->string('title','50')->nullable();
            $table->string('description','50')->nullable();
            $table->string('currency','10');
            $table->decimal('cost_price');
            $table->decimal('selling_price');
            $table->unsignedTinyInteger('created_by')->nullable();
            $table->unsignedTinyInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('delete_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('refill_cards', function($table) {
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('set null');
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
        Schema::dropIfExists('refill_cards');
    }
}
