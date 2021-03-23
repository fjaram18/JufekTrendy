<?php
//Autor: Juan Camilo Echeverri
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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

            $table->bigIncrements('id');
            $table->text('name');
            $table->text('size');
            $table->integer('stock');
            $table->float('price');
            $table->text('image')->nullable();
            $table->text('description')->nullable();
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
