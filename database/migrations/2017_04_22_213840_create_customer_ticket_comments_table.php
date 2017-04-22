<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTicketCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_ticket_comments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_ticket_id')->unsigned();
            $table->foreign('customer_ticket_id')->references('id')->on('customer_tickets')->onDelete('cascade');
            $table->text('comment');
            $table->integer('created_by');
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
        Schema::dropIfExists('customer_ticket_comments');
    }
}
