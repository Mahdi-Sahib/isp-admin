<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefillCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refill_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('set null');
            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->integer('refill_card_id')->unsigned();
            $table->foreign('refill_card_id')->references('id')->on('refill_cards')->onDelete('cascade');
            $table->boolean('payment_status')->unsigned();
            $table->integer('card_price')->unsigned();
            $table->decimal('amount_paid')->unsigned()->default(0);
            $table->string('description')->nullable();
            $table->string('by_person')->nullable();
            $table->integer('created_by');
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('refill_customers');
    }
}
