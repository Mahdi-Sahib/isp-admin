<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBalanceRechargesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_recharges', function (Blueprint $table) {
            $table->mediumIncrements('id');
            $table->unsignedTinyInteger('supplier_id')->nullable();
            $table->string('currency','10')->nullable();
            $table->decimal('amount')->nullable();
            $table->string('description','100')->nullable();
            $table->string('by_employee','10')->nullable();
            $table->string('copy_of_invoice')->nullable();
            $table->unsignedSmallInteger('supplier_invoice_no')->nullable();
            $table->decimal('tax_included')->nullable();
            $table->unsignedTinyInteger('created_by')->nullable();
            $table->unsignedTinyInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('delete_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('balance_recharges', function($table) {
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
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
        Schema::dropIfExists('balance_recharges');
    }
}
