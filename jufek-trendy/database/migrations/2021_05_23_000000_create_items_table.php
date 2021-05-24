<?php
//Autor: Juan Camilo Echeverri

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    
/**
 * Run the migrations.
 *
 * @return void
 */

    public function up()
    {

        Schema::create('items', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->text('amount');
            $table->text('subtotal');
            $table->bigInteger('product_id')->unsigned();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->bigInteger('customization_id')->unsigned()->nullable();
            $table->foreign('customization_id')->references('id')->on('customizations')->onDelete('cascade')->nullable();
            $table->bigInteger('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');;
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
        Schema::dropIfExists('items');
    }

}