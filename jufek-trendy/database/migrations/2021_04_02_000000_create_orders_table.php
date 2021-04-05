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

            $table->bigIncrements('id');
            $table->float('total');
            $table->date('order_date');
            $table->date('shipping_date');
            $table->text('order_state');
            $table->text('payment_type');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
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
