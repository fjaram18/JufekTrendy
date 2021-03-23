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
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('customization_id')->references('id')->on('customizations')->onDelete('cascade');
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