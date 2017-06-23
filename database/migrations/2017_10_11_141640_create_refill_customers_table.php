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
            $table->mediumIncrements('id');
            $table->unsignedTinyInteger('supplier_id')->nullable();
            $table->unsignedSmallInteger('customer_id');
            $table->unsignedSmallInteger('refill_card_id');
            $table->boolean('payment_status')->unsigned();
            $table->decimal('card_price')->unsigned();
            $table->decimal('amount_paid')->default(0);
            $table->decimal('first_piad')->default(0);
            $table->decimal('second_paid')->default(0);
            $table->string('description','60')->nullable();
            $table->string('by_person','20')->nullable();
            $table->unsignedTinyInteger('created_by')->nullable();
            $table->unsignedTinyInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('delete_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('refill_customers', function($table) {
            $table->foreign('refill_card_id')->references('id')->on('refill_cards')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
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
        Schema::dropIfExists('refill_customers');
    }
}
