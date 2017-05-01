<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_categorie_id')->unsigned()->nullable();
            $table->foreign('product_categorie_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->integer('supplier_id')->unsigned()->nullable();
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->decimal('price')->nullable();
            $table->string('description')->nullable();
            $table->string('thumb')->nullable();
            $table->string('image')->nullable();
            $table->string('code')->nullable();
            $table->string('currency')->nullable();
            $table->decimal('cost_price')->nullable();
            $table->decimal('selling_price')->nullable();
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
        Schema::dropIfExists('products');
    }
}
