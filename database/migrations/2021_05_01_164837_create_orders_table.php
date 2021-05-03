<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name',80);
            $table->string('customer_email',120);
            $table->string('customer_mobile',40);
            $table->string('customer_address',100);
            $table->string('customer_document',25);
            $table->string('customer_type_document',10);
            $table->string('session',10);
            $table->string('reference',16);
            $table->integer('product_id');
            $table->string('status',20);
            $table->string('url',255);
            $table->timestamp('expired_date');
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
        Schema::dropIfExists('orders');
    }
}
