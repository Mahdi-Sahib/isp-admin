<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name','30');
            $table->string('phone','11')->nullable();
            $table->string('email','32')->nullable();
            $table->string('address','100')->nullable();
            $table->string('contact','100')->nullable();
            $table->string('website','100')->nullable();
            $table->string('bank_account','100')->nullable();
            $table->string('currency','10')->nullable();
            $table->string('payment_terms','100')->nullable();
            $table->string('tax_included','100')->nullable();
            $table->unsignedTinyInteger('created_by')->nullable();
            $table->unsignedTinyInteger('updated_by')->nullable();
            $table->unsignedTinyInteger('delete_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('suppliers', function($table) {
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
        Schema::dropIfExists('suppliers');
    }
}
